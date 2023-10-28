create database cloudy;
use cloudy;

create table usuario(nick_user varchar(60) not null,
					id_user int(4) AUTO_INCREMENT primary key not null,
					liberado varchar(3) null,
                    pontos int(3),
					senha_user varchar(16)  not null);

create table adm(nome_adm varchar(60) not null,
				id_adm int(4) auto_increment primary key not null,
				senha_adm varchar(16) not null);
                
select * from usuario;

insert into usuario values('nick', 1, 'SIM', 20, 'senha');
insert into adm values('adm', 1, 'senha');

create table jokenpo (	FKuser_id int,
						foreign key  (FKuser_id) references usuario (id_user),
                        vitoria int,
                        derrota int,
                        empate int);  


create table parimpar (	FKuser_id int,
						foreign key (FKuser_id) references usuario (id_user),
						vitoria int,
						derrota int);


create table adivinhar ( FKuser_id int,
						foreign key (FKuser_id) references usuario (id_user),
						acerto int,
						erro int);


create table forca (FKuser_id int,
					foreign key (FKuser_id) references usuario (id_user),
					acerto int,
					erro int);
