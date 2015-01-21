#
# Cookbook Name:: sf2-demo
# Recipe:: virtualhost
#
# Copyright 2015, Ubiprism Lda.
#
# All rights reserved - Do Not Redistribute
#

# Enables the appropriate apache virtual host

apache_site "000-default" do
  enable false
end

web_app "sf2-demo" do
  template "sf2-demo.conf.erb"
  server_name node['hostname'] # we should change this to reflect the actual username
  server_aliases [node['fqdn'], "sf2-demo.lh.ubiprism.pt", "sf2-demo.local"]
  docroot node['project_base_path'] + "/current/web"
end
