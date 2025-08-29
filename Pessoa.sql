Create database Pessoa;
use Pessoa;

create table Pessoa(
id_pessoa int primary key auto_increment not null,
nome_pessoa varchar(200),
cpf_pessoa varchar(11) unique,
telefone_pessoa varchar(15)
);

drop table Pessoa;
insert into Pessoa(nome_pessoa, cpf_pessoa, telefone_pessoa) values
('Emerson', '12345679890', '11123456789');

select * from Pessoa;
