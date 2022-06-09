CREATE DATABASE teste;<br>
<br>
CREATE TABLE cargos (<br>
	codC int auto_increment not null,<br>
	cargo varchar(50),<br>
	salario double,<br>
	PRIMARY KEY (codC)<br>
);<br>
<br>
CREATE TABLE codfun (<br>
	codfun int auto_increment,<br>
	nome varchar(40) not null,<br>
	depto char(2),<br>
	codC integer (11),<br>
	foto longblob,<br>
	PRIMARY KEY (codfun),<br>
	FOREIGN KEY (codC) REFERENCES cargos(codC)<br>
);