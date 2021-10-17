drop database if exists scolarite; 
create database scolarite; 
use scolarite; 

create table matiere (
	id_matiere int(3) not null auto_increment, 
	nom_matiere varchar(128), 
	primary key(id_matiere)
);


create table etablissement (
	id_etab int(3) not null auto_increment, 
	nom_etb varchar(128) not null,
	adr_etb varchar(128), 
	num_rue varchar(30), 
	ville_etb varchar(128),
	primary key(id_etab)
);

 create table user (
	id_user int(3) not null auto_increment, 
	nom_user varchar(128), 
    prenom_user varchar(128),
	adr_user varchar(128),
	num_rue_user varchar(30),
	ville_user varchar(128),
	tel_user varchar(128),
	primary key(id_user)
);

create table directeur(
	id_user int(3) not null,
	id_etab int(3) not null,
	primary key(id_user,id_etab),
	FOREIGN KEY (id_user) REFERENCES user(id_user),
	foreign key (id_etab) references etablissement(id_etab)
);

create table professeur(
	id_prof int(3) not null auto_increment, 
	id_user int(3) not null, 
    id_etab int(3) not null,
	id_matiere int(3) not null,
	diplome_user varchar(10),
	primary key(id_prof),
	foreign key (id_user) references user(id_user),
	foreign key (id_etab) references etablissement(id_etab),
	foreign key (id_matiere) references matiere(id_matiere)

);
 create table classe(
	code_classe varchar(8) not null,
	nom_classe varchar(128), 
	id_etab int(3) not null,
	primary key(code_classe),
	foreign key (id_etab) references etablissement(id_etab)

);
create table etudiant(
	id_etudiant int(3) not null auto_increment,
	code_classe varchar(8) not null,
	id_user int(3) not null,
	date_naissance_user date,
	primary key (id_etudiant),
	foreign key (code_classe) references classe(code_classe),
	foreign key (id_user) references user(id_user)
);
create table occuper(
	id_prof int(3) not null,
	code_classe varchar(8) not null,
	primary key (id_prof,code_classe),
	foreign key (id_prof) references professeur(id_prof),
	foreign key (code_classe) references classe(code_classe)
);
 

-- Vues

create view ViewInfoEta as(
select e.id_etab 
, e.nom_etb
, e.adr_etb
, e.num_rue 
, u.nom_user 
, u.prenom_user , count(e2.id_etudiant) as count_etudiant 
from etablissement e
inner join directeur d on d.id_etab = e.id_etab 
inner join `user` u on u.id_user = d.id_user
inner join classe c on c.id_etab = e.id_etab
inner join etudiant e2 on e2.code_classe = c.code_classe
group by e.id_etab 
, e.nom_etb
, e.adr_etb
, u.nom_user 
, u.prenom_user
);

create view ViewListProf as(
select p.id_etab 
, p.diplome_user 
, u.nom_user 
, u.prenom_user 
, m.nom_matiere 
, c.nom_classe 
, c.code_classe
from professeur p
inner join `user` u on u.id_user = p.id_user
inner join matiere m on m.id_matiere = p.id_matiere 
inner join occuper o on o.id_prof = p.id_prof 
inner join classe c on c.code_classe = o.code_classe
);
 
create view ViewListEtudiant as(
select e.id_etudiant 
, e.date_naissance_user
, c.id_etab 
, c.code_classe
, c.nom_classe 
, u.nom_user 
, u.prenom_user
, u.num_rue_user
, u.adr_user
, u.ville_user 
from etudiant e 
inner join `user` u on u.id_user = e.id_user 
inner join classe c on c.code_classe  = e.code_classe 
);








