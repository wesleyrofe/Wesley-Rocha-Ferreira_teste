create table rs_motoristas(
	mot_cpf varchar(11) not null primary key,
    mot_nome varchar(45) not null,
    mot_dtNasc date not null,
    mot_modCarro varchar(45) not null,
    mot_sexo varchar(25) not null,
    mot_status varchar(10) not null
);

create table rs_passageiros(
	pas_cpf varchar(11) not null primary key,
	pas_nome varchar(45) not null,
  pas_dtNasc date not null,
	pas_sexo varchar(25) not null
);

create table rs_corridas(
	mot_cpf varchar(11) not null,
  pas_cpf varchar(11) not null,
  cor_valor double(8,2) not null
);

ALTER TABLE rs_corridas ADD CONSTRAINT fk_mot_cpf FOREIGN KEY ( mot_cpf )
REFERENCES rs_motoristas ( mot_cpf ) ;

ALTER TABLE rs_corridas ADD CONSTRAINT fk_pas_cpf FOREIGN KEY ( pas_cpf )
REFERENCES rs_passageiros ( pas_cpf ) ;
