root_dir = File.dirname(File.expand_path(__FILE__))
Vagrant.configure('2') do |config|
  config.vm.box = 'beubi/trusty64'
  config.vm.synced_folder '.', '/vagrant', disabled: true
  config.ssh.insert_key = false

  [ :up, :reload ].each do |command|
    config.trigger.before command, :stdout => false do
      run 'rm -rf chef/cookbooks'
    end
    config.trigger.before command, :stdout => false do
      info 'Executing berks vendor on the host machine...'
      run 'berks vendor chef/cookbooks'
    end
  end

  config.vm.network :forwarded_port, guest: 22, host: 2221, auto_correct: true
  config.vm.network :forwarded_port, guest: 80, host: 4567, auto_correct: true

  config.vm.provision :chef_solo do |chef|
    # Chef debug level, start vagrant like this to debug:
    # $ CHEF_LOG_LEVEL=debug vagrant <provision or up>
    chef.log_level = ENV['CHEF_LOG_LEVEL'] || 'info'
    chef.cookbooks_path = [ 'chef/cookbooks', 'chef/site-cookbooks' ]
    chef.roles_path = 'chef/roles'
    chef.json = JSON.parse(File.read(root_dir + '/chef/nodes/vagrant.json'))
  end

  config.vm.provider :virtualbox do |vb, override|
    nfs_setting = RUBY_PLATFORM =~ /darwin/ || RUBY_PLATFORM =~ /linux/
    override.vm.synced_folder '.', '/srv/ubicycling/current', :nfs => nfs_setting
    # The LXC provider doesn't support any of the Vagrant public / private network configurations
    override.vm.network :private_network, ip: '10.11.12.9'
    vb.customize ['modifyvm', :id, '--memory', 1536]
    vb.customize ['setextradata', :id, 'VBoxInternal2/SharedFoldersEnableSymlinksCreate/ubicycling', '1']
  end

  config.vm.provider :lxc do |lxc, override|
    override.vm.hostname = 'ubicycling-container'
    override.vm.synced_folder '.', '/srv/ubicycling/current'
    lxc.backingstore = 'dir'
    lxc.customize 'cgroup.memory.limit_in_bytes', '1536M'
  end
end
