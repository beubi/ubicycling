#
# Cookbook Name:: ubicycling
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

web_app "ubicycling" do
  template "ubicycling.conf.erb"
  server_name node['hostname'] # we should change this to reflect the actual username
  server_aliases [node['fqdn'], "ubicycling.lh.ubiprism.pt", "ubicycling.ubiprism.pt"]
  docroot node['project_base_path'] + "/current/web"
end
