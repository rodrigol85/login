CREATE DATABASE IF NOT EXISTS db_proof;
USE db_proof;
CREATE TABLE IF NOT EXISTS clienti(
	id 		int not null auto_increment,
	email 		varchar(100) not null,
	password 	varchar(256) not null,
	role		varchar(15) not null,
	primary key (id)
);