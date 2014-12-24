VAGRANTFILE_API_VERSION = "2"

## デフォルトProvider変更
ENV["VAGRANT_DEFAULT_PROVIDER"] = "docker"
ENV["MYSQL_PASS"] = "mypass"

Vagrant.configure("2") do |config|

  # apache conainer
  config.vm.define "apache" do |v|
    v.vm.provider "docker" do |d|
      #d.name = "apache"
      d.build_dir = "./docker-container/apache-php/"
      d.volumes = ["/vagrant-app:/app", "/vagrant-log:/var/log/apache2"]
      d.ports = ["80:80"]
      d.vagrant_vagrantfile = "./vagrant-docker.proxy"
      d.remains_running = false
      d.link "db:db"
    end
  end
  
  # db conainer
  config.vm.define "db" do |v|
    v.vm.provider "docker" do |d|
      d.name = "db"
      d.build_dir = "./docker-container/mysql/"
      # d.volumes = ["/vagrant-data:/var/lib/mysql", "/vagrant-log/mysql:/var/log/mysql"]
      d.ports = ["3306:3306"]
      d.vagrant_vagrantfile = "./vagrant-docker.proxy"
      # d.env = ["MYSQL_PASS:mypass"]
      # d.run = "/usr/bin/mysql_install_db"
      # d.remains_running = false
      # d.link "redis:redis"
    end
  end
end
