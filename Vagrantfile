# Dockerの稼働環境構築に必要なコマンド
# コンテナへのリンク、など
$setup = <<SCRIPT
# 既存コンテナの停止と削除
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)

# Dockerfilesからコンテナを作成
docker build -t unglevan/mysql /docker-container/mysql
docker build -t apache /docker-container/apache-php

# コンテナの実行とリンク
# database link not work yet
docker run --name db -p 3306:3306 -e MYSQL_ROOT_PASSWORD=mypass -d unglevan/mysql
docker run -d -p 80:80 -v /vagrant-app:/app --link db:db --name apache apache
SCRIPT

# VM再起動時に正しいDockerコンテナを開始するために必要なコマンド
$start = <<SCRIPT
docker start mysql
docker start apache
SCRIPT

VAGRANTFILE_API_VERSION = "2"


Vagrant.configure("2") do |config|
  # support for synced_folder
  config.vm.box = "yungsang/boot2docker"

  config.vm.provider "virtualbox" do |v|
    # On VirtualBox, we don't have guest additions or a functional vboxsf
    # in TinyCore Linux, so tell Vagrant that so it can be smarter.
    v.check_guest_additions = false
    v.functional_vboxsf     = false

    v.name = 'docker-host'

    # customize
    v.memory = 1024
    v.cpus = 1
  end

  ["vmware_fusion", "vmware_workstation"].each do |vmware|
    config.vm.provider vmware do |v|
      if v.respond_to?(:functional_hgfs=)
        v.functional_hgfs = false
      end
    end
  end

  # sync folder
  config.vm.synced_folder "./app", "/vagrant-app", type: "nfs"
  config.vm.synced_folder "./log", "/vagrant-log", type: "nfs"
  config.vm.synced_folder "./data", "/vagrant-data", type: "nfs"
  config.vm.synced_folder "./docker-container", "/docker-container", type: "nfs"
  config.vm.network "private_network", ip: "192.168.36.10"
  #connect mysql by command
  #mysql -uadmin -h 192.168.36.10 -p"mypass"

  # b2d doesn't support NFS
  #config.nfs.functional = false

  # forwarded port
  # config.vm.network :forwarded_port, guest: 6379, host: 16379
  config.vm.network :forwarded_port, guest: 3306, host: 13306
  config.vm.network :forwarded_port, guest: 80,   host: 10080

  # VM初回作成時にコンテナを設定する
  config.vm.provision "shell", inline: $setup

  # VM起動時に常に正しいコンテナが実行されるように
  config.vm.provision "shell", run: "always", inline: $start
end
