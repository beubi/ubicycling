source "https://api.berkshelf.com"

root = File.expand_path(File.dirname(__FILE__))

cookbook 'sf2-demo', path: root+"/chef/site-cookbooks/sf2-demo"

cookbook 'timezone-ii'
cookbook 'locales', git: 'https://github.com/redguide/locales.git'
cookbook 'vim', '1.1.2'
cookbook 'unattended-upgrades', git: 'https://github.com/beubi/chef-unattended-upgrades.git'
cookbook 'apache2', git: 'https://github.com/arturmelo/apache2.git'
cookbook 'php', git: 'https://github.com/beubi/cookbook-php.git'
cookbook 'symfony2', git: 'https://github.com/beubi/chef-symfony2.git'
cookbook 'chef-php-extra', git: 'https://github.com/Restless-ET/chef-php-extra.git' # change to https://github.com/inviqa/chef-php-extra.git when PRs are merged
