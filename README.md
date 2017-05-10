# Phalcon-Microsoft-SQL-Connect
Connect Phalcon Framework with MSSQL

=======================================================================

Files works on 

+ Phalcon version 3.X 
+ PHP 7.0 
+ UBUNTU 16.4

=======================================================================

For more Join : http://www.phoenixpeth.com/

# Installation Before uploading files to server
# STEP 1

sudo su
curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
curl https://packages.microsoft.com/config/ubuntu/16.04/mssql-server.list > /etc/apt/sources.list.d/mssql-server.list
exit

=======================================================================
# STEP 2

sudo apt-get update
sudo apt-get install mssql-server

=======================================================================
# STEP 3

sudo /opt/mssql/bin/mssql-conf setup

=======================================================================
# STEP 4

sudo su
curl https://packages.microsoft.com/config/ubuntu/16.04/prod.list > /etc/apt/sources.list.d/mssql-tools.list
exit
sudo apt-get update
sudo ACCEPT_EULA=Y apt-get install mssql-tools
sudo apt-get install unixodbc-dev
echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile
echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
source ~/.bashrc

=======================================================================
# STEP 5 - Checking 

sqlcmd -S localhost -U sa -P yourpassword -Q "SELECT @@VERSION"

=======================================================================
# STEP 6 - Install ODBC driver 

sudo su
curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
curl https://packages.microsoft.com/config/ubuntu/16.04/prod.list > /etc/apt/sources.list.d/mssql-release.list
exit
sudo apt-get update
sudo ACCEPT_EULA=Y apt-get install msodbcsql
sudo apt-get install unixodbc-dev gcc g++ build-essential
sudo pecl install sqlsrv pdo_sqlsrv
sudo echo "extension= pdo_sqlsrv.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`
sudo echo "extension= sqlsrv.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`


+++++++ Update PHP.ini file if not loaded extention ++++++++ 

Add below lines in extension

extension= pdo_sqlsrv.so
extension= sqlsrv.so

=======================================================================
# STEP 7 - DATABASE Making

sqlcmd -S localhost -U sa -P your_password -Q "CREATE DATABASE phalcon_test;"
OR

sqlcmd -S localhost -U sa -P your_password -Q "USE phalcon_test;
CREATE TABLE [personas](id int IDENTITY(1,1) PRIMARY KEY,[nombre] varchar(255) NOT NULL,[estado] varchar(255));"

sqlcmd -S localhost -U sa -P your_password -Q "USE phalcon_test;create table users(id int IDENTITY(1,1) PRIMARY KEY,name varchar(200), email varchar(200));"


=======================================================================

# PHP file code -For checking sqlsrv PDOtype

php-connect.php

<?php
    $serverName = "localhost";
    $connectionOptions = array(
        "Database" => "SampleDB",
        "Uid" => "sa",
        "PWD" => "your_password"
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn)
        echo "Connected!"
?>

=======================================================================

For more Join : http://www.phoenixpeth.com/