name 'lamp'
description 'Common LAMP configuration for PHP development'

run_list(
  'recipe[mysql::client]',
  'recipe[mysql::server]',
  'recipe[ubicycling::php5_6]',
  'recipe[apache2]',
  'recipe[php]',
  'recipe[apache2::mod_php5]',
  'recipe[php::module_mysql]',
  'recipe[php::module_curl]',
  'recipe[php::module_gd]'
)

override_attributes(
  'php' => {
    'ext_conf_dir' => '/etc/php5/mods-available',
    'short_open_tag' => 'Off',
    'max_execution_time' => '600',
    'max_input_time' => '120',
    'memory_limit' => '1024M',
    'use_syslog' => true,
    'post_max_size' => '30M',
    'upload_max_filesize' => '30M'
  },
  'apache' => {
    'mpm' => 'prefork',
    'prefork' => {
      'startservers' => 10,
      'minspareservers' => 2,
      'maxspareservers' => 5
    },
  },
  'php_apache2' => {
    'short_open_tag' => 'Off',
    'max_execution_time' => '600',
    'max_input_time' => '120',
    'memory_limit' => '1024M',
    'use_syslog' => true,
    'post_max_size' => '30M',
    'upload_max_filesize' => '30M',
    'gc_probability' => '0'
  }
)
