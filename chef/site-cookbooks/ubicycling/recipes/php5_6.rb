#
# Cookbook Name:: ubicycling
# Recipe:: php5_6
#
# Copyright 2015, Ubiprism Lda.
#
# All rights reserved - Do Not Redistribute
#

# Updates apt repository for PHP

if platform?(%w{debian ubuntu})

  apt_repository "ondrej-php5-5.6" do
    uri "http://ppa.launchpad.net/ondrej/php5-5.6/ubuntu "
    distribution node['lsb']['codename']
    components ["main"]
    deb_src true
    keyserver "hkp://keyserver.ubuntu.com:80"
    key "14AA40EC0831756756D7F66C4F4EA0AAE5267A6C"
    not_if {::File.exists?("/etc/apt/sources.list.d/ondrej-php5-5.6.list")}
  end

end
