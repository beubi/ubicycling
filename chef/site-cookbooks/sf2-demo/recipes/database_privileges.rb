# Cookbook Name:: sf2-demo
# Recipe:: database_privileges
#
# Copyright 2015, Ubiprism Lda.
#
# All rights reserved - Do Not Redistribute
#

# Makes sure that the databases and respective users exist

include_recipe "database::mysql" # gem install mysql
include_recipe "mysql::client" # we need to include mysql::client prior to the gem install

connection_info = {:host => "localhost", :username => 'root', :password => node['mysql']['server_root_password']}

mysql_database node['mysql']['database_name'] do
  connection connection_info
  action :create
end

mysql_database_user node['mysql']['database_user'] do
  connection connection_info
  password node['mysql']['database_password']
  database_name node['mysql']['database_name']
  action :grant
end
