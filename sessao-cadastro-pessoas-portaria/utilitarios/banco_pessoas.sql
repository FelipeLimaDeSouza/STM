drop database if exists bd_pessoas;
create database bd_pessoas;
use bd_pessoas;

create table tb_usuarios(

	usuario_id							int						not null			auto_increment,
    usuario_nome						varchar(50)				not null,
    usuario_login						varchar(50)				not null,
    usuario_senha						varchar(50)				not null,
    usuario_nivel						int						not null,
    primary key(usuario_id),
    unique key(usuario_login)

);

create table tb_setores(

	setor_id						int						not null			auto_increment,
    setor_nome						varchar(100)			not null,
    primary key(setor_id),
    unique key(setor_nome)

);

create table tb_funcionarios(

	funcionario_id					int						not null			auto_increment,
    funcionario_nome				varchar(50)				not null,
    setor_id_funcionario			int						not null,
    primary key(funcionario_id),
    constraint						fk_set_fun				foreign key(setor_id_funcionario)
    references						tb_setores(setor_id)

);

create table tb_empresas(

	empresa_id						int						not null			auto_increment,
    empresa_nome					varchar(100)			not null,
    empresa_cnpj					varchar(20)				not null,
    primary key(empresa_id),
    unique key(empresa_cnpj)

);

create table tb_veiculos(

	veiculo_id						int						not null			auto_increment,
    veiculo_placa					varchar(10)				not null,
	primary key(veiculo_id),
    unique key(veiculo_placa)

);

create table tb_pessoas(

	pessoa_id						int						not null			auto_increment,
    pessoa_nome						varchar(50)				not null,
    pessoa_rg						varchar(15)				null,
    pessoa_cpf						varchar(15)				null,
    primary key(pessoa_id),
    unique key(pessoa_cpf)
    
);

create table tb_veiculos_pessoas(

	veiculo_id_pessoa				int						not null,
    pessoa_id_veiculo				int						not null,
    primary key(veiculo_id_pessoa, pessoa_id_veiculo),
    constraint						fk_vei_pes				foreign key(veiculo_id_pessoa)
    references						tb_veiculos(veiculo_id),
    constraint						fk_pes_vei				foreign key(pessoa_id_veiculo)
    references						tb_pessoas(pessoa_id)

);

create table tb_pessoas_empresas(

	pessoa_id_empresa				int						not null,
    empresa_id_pessoa				int						not null,
    primary key(pessoa_id_empresa, empresa_id_pessoa),
    constraint						fk_pes_emp				foreign key(pessoa_id_empresa)
    references						tb_pessoas(pessoa_id),
    constraint						fk_emp_pes				foreign key(empresa_id_pessoa)
    references						tb_empresas(empresa_id)

);

create table tb_entradas(

	entrada_id						int						not null			auto_increment,
    entrada_data_entrada			date					not null,
    entrada_data_saida				date					null,
    entrada_hora_entrada			time					not null,
    entrada_hora_saida				time					null,
    entrada_status					int						not null			default 1,
    usuario_id_entrada				int						not null,
    funcionario_id_entrada			int						not null,
    pessoa_id_entrada				int						not null,
    primary key(entrada_id),
    constraint						fk_usu_ent				foreign key(usuario_id_entrada)
    references						tb_usuarios(usuario_id),
    constraint						fk_fun_ent				foreign key(funcionario_id_entrada)
    references						tb_funcionarios(funcionario_id),
    constraint						fk_pes_ent				foreign key(pessoa_id_entrada)
    references						tb_pessoas(pessoa_id)

);

create table tb_notas(

	nota_id							bigint					not null			auto_increment,
    nota_data						date					not null,
    nota_hora						time					not null,
    nota_numero						varchar(20)				null,
    nota_vale						varchar(50)				null,
    usuario_id_nota					int						not null,
    pessoa_id_nota					int						not null,
    empresa_id_nota					int						not null,
    primary key(nota_id),
    unique key(nota_numero),
    constraint						fk_usu_not				foreign key(usuario_id_nota)
    references						tb_usuarios(usuario_id),
    constraint						fk_pes_not				foreign key(pessoa_id_nota)
    references						tb_pessoas(pessoa_id),
    constraint						fk_emp_not				foreign key(empresa_id_nota)
    references						tb_empresas(empresa_id)

);