VAGRANTFILE_API_VERSION = "2"

$script = <<SCRIPT

# Fix Time
apt-get -y install ntpdate
ntpdate pool.ntp.org

# Install Database
mysql -uroot -p'vagrant' -e "DROP DATABASE IF EXISTS GeekGearGovenor"
mysqladmin -u root -p'vagrant' create GeekGearGovenor
mysql -u root -p'vagrant' GeekGearGovenor < /vagrant/extra/database.sql

# Install Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
composer global require "laravel/installer=~1.1"
cd /vagrant
composer install

# Install ElasticSearch
apt-get -y install openjdk-7-jre
cd /tmp
wget https://download.elastic.co/elasticsearch/elasticsearch/elasticsearch-1.7.0.deb
dpkg -i elasticsearch-1.7.0.deb
rm elasticsearch-1.7.0.deb
/bin/systemctl daemon-reload
/bin/systemctl enable elasticsearch.service

# Identify Environment
touch /vagrant/VagrantDev.txt
date > /etc/vagrant_provisioned_at
SCRIPT


Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
   config.vm.box = "debian-8.1.0_puppet"
   config.vm.box_url = "http://mirror.netbydesign.biz/vagrant/debian-8.1.0_puppet.box"

   config.vm.network "forwarded_port", guest: 80, host: 8080

   config.vm.provision "shell", inline: $script

   config.vm.provider "virtualbox" do |v|
     v.memory = 1024
     v.cpus = 2
   end

end
