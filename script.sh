echo "drop database CS143" | mysql; 
echo "create database CS143;" | mysql;
mysql CS143 < create.sql; 
mysql CS143 < load.sql; 
