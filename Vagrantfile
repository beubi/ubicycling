Vagrant.configure('2') do |config|
  config.vm.box = "beubi/trusty64"
  config.vm.synced_folder ".", "/vagrant", disabled: true

  [ :up, :reload ].each do |command|
    config.trigger.before command, :stdout => false do
      run "rm -rf chef/cookbooks"
    end
    config.trigger.before command, :stdout => false do
      info "Executing berks vendor on the host machine..."
      run "berks vendor chef/cookbooks"
    end
  end
  config.ssh.insert_key = false

  config.vm.network :forwarded_port, guest: 22, host: 2221, auto_correct: true
  config.vm.network :forwarded_port, guest: 80, host: 4567, auto_correct: true
  config.vm.network :forwarded_port, guest: 443, host: 4343, auto_correct: true

  config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"
  config.vm.provision :shell, :inline => 'apt-get update'
  config.vm.provision "shell", inline: 'if [ "$(which chef-solo)" == "" ]; then sudo apt-get install -y curl && curl -L https://www.opscode.com/chef/install.sh | sudo bash ; fi'

  config.vm.provision :chef_solo do |chef|
    # Chef debug level, start vagrant like this to debug:
    # $ CHEF_LOG_LEVEL=debug vagrant <provision or up>
    chef.log_level = ENV['CHEF_LOG_LEVEL'] || 'info'

    chef.cookbooks_path = [ 'chef/cookbooks', 'chef/site-cookbooks' ]
    chef.roles_path = 'chef/roles'
    chef.json = {
      'project_base_path' => '/srv/sf2-demo',
      'project_user' => 'ubuntu',
      'instance_role' => 'vagrant'
    }
    chef.run_list = [
      'role[base]',
      'role[lamp]',
      'recipe[symfony2]',
      'recipe[composer]',
      'recipe[sf2-demo::virtualhost]',
      'recipe[chef-php-extra::xdebug]',
    ]
  end

  config.vm.provider :virtualbox do |vb, override|
    nfs_setting = RUBY_PLATFORM =~ /darwin/ || RUBY_PLATFORM =~ /linux/
    override.vm.synced_folder '.', '/srv/sf2-demo/current', :nfs => nfs_setting
    # The LXC provider doesn't support any of the Vagrant public / private network configurations
    override.vm.network :private_network, ip: '10.11.12.9'
    vb.customize ['modifyvm', :id, '--memory', 1536]
    vb.customize ['setextradata', :id, 'VBoxInternal2/SharedFoldersEnableSymlinksCreate/sf2-demo', '1']
  end

  config.vm.provider :lxc do |lxc, override|
    override.vm.hostname = 'sf2-demo-container'
    override.vm.synced_folder '.', '/srv/sf2-demo/current'
    lxc.customize 'cgroup.memory.limit_in_bytes', '1536M'
  end
end
