/* Criando o banco de Dados teste_basico */
create database teste_basico;

/* Selecioando os BD teste_basico */
use teste_basico;

/* Criando a tabela clinte */
create table clientes(
	id_cliente INT auto_increment,
    nome_cliente varchar(255),
    email_cliente varchar(225),
    telefone_cliente varchar(13),
    senha_cliente varchar(255),
    data_nasc_cliente date,
    primary key (id_cliente)
);

/* Inserindo os daods do primeiro clinte */
insert into `clientes` (`nome_cliente`, `email_cliente`, `telefone_cliente`, `senha_cliente`,`data_nasc_cliente`) 
	values ('Teste', 'teste@dominio.com', '3199887-7665','123456', '2020-12-11');
