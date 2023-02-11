drop database gestionvie;
create database gestionvie ; 
use gestionvie; 

drop table if exists departements ;
  create table departements (
  departement_id int(10) unsigned not null auto_increment ,
  departement_name varchar(45) not null,
primary key (departement_id)
  );
 insert into departements (departement_id , departement_name) values
   (1,'GI'),
    (2,'autres');
  
   drop table if exists role; 
   create table role(
    role_id int(10) unsigned not null auto_increment , 
       role_name varchar(45) not null ,
       primary key (role_id)
  );
  Insert into role (role_id,role_name) values (1,'admin'),(2,'enseignant'),
  (3,'etudient');
  
  
 
  
  drop table if exists annees ;
  create table annees (
    annee_id int (10) unsigned not null auto_increment , 
    annee varchar(50) NOT NULL ,
      PRIMARY KEY (annee_id)
  );
 insert into annees (annee_id , annee) values
  (1,'2018/2019'),
 (2,'2019/2020'),
  (3,'2020/2021');
  

 
  drop table if exists semestre ; 
 create table semestre
  (
      semestre_id int (10) unsigned NOT NULL auto_increment , 
     semestre_name varchar(50) not null ,
      primary key (semestre_id)
);
  insert into semestre (semestre_id , semestre_name) values
  (1,'s1'),
  (2,'s2'),
  (3,'s3'),
  (4,'s4'),
  (5,'s5'),
  (6,'s6');

drop table if exists modules;
create table modules (
module_id int(10) unsigned not null auto_increment , 
module_name varchar(50) not null ,
departement_id int(10) unsigned not null , 
semestre_id int(10) unsigned not null, 
primary key (module_id),
foreign key (departement_id) references departements (departement_id),
foreign key (semestre_id) references semestre(semestre_id)

);


insert into modules (module_id,module_name,departement_id , semestre_id ) values 
(1,'mathematiques generales',1,1),
(2,"algorithmique et bases de programmation c",1,1),
(3,"langages et technique d'expression et de communication",1,1),
(4,"architecture des ordinateurs",1,1),


(5,"system d'information et bases de donnees",1,2),
 (6,"algorithmique et structures des donnes",1,2),
 (7,"systeme d'exploitation & reseaux",1,2),
 (8,"environnement economique et juridique de l'entreprise",1,2),

 (9,"interconnexion des reseaux",1,3),
(10,"base de donnnes avancees",1,3),
(11,"programmation orientees object java",1,3),
(12,"outils d'aide a la decision",1,3),


(13,"atelier genie logiciel",1,4),
(14,"claud computing securite",1,4),
(15,"administration services reseau",1,4),
(16,"projet de fin d'etude",1,4),
(17,"STAGE",1,4);


/*
drop table if exists elements ;
create table elements(
element_id int (10) not null auto_increment , 
element_name varchar(50) not null ,
departement_id int (10) not null ,
module_id int(10) not null 

);
*/

drop table if exists etudiantusers;
create table etudiantusers (
etudiantuser_id int(11) unsigned not null auto_increment ,
id_unique varchar(11) not null unique, /*code massar pour les etudiant*/
annee_id int (10) unsigned not null ,
departement_id int (10) unsigned not null ,
gender varchar(45) not null ,
name varchar(45) not null , 
email varchar(90) not null unique, 
passwordgenerer varchar(70) not null ,
password varchar(70) not null ,
role_id int (10) unsigned not null ,
first_name varchar(70) not null ,
last_name varchar(70) not null,
telephone int(10) unsigned not null, 
address varchar (200) not null,
semestre_id int(10) unsigned not null ,
section char(2) not null default "A",
parsing int(10) unsigned not null default 3,
profile_image char(60) not null default "http://10.0.0.1/gestionvie/profile_image/etudiant.png",
primary key (etudiantuser_id) , 

foreign key (role_id) references role (role_id),
foreign key (departement_id) references departements (departement_id),
foreign key (annee_id) references annees (annee_id),
foreign key (semestre_id) references semestre (semestre_id)
);

insert into etudiantusers (etudiantuser_id , id_unique,annee_id,departement_id,gender,name,email,password,role_id,first_name,last_name,telephone,address,semestre_id) values
(1,'M134460831',1,1,'male',"saad benabbi","saad@gmail.com",MD5("gestionviescolaire"),3,'SAAD',"BENABBI","0624857541","meknes",4),
 (2,'M133393033',1,1,'male',"omar elouardy","omar@gmail.com",MD5("gestionvie"),3,'OMAR',"ELOUARDY","0633949333","meknes",4),
(3,'M134330022',1,1,'male',"abderahim","abderahim@gmail.com",MD5("gestion"),3,'abedarahim',"AKARID","0600334943","meknes",4);



drop table if exists enseignantusers ;
create table enseignantusers (
  enseignantuser_id int(11) unsigned not null auto_increment ,
  id_unique varchar(11) not null unique, 
  gender varchar(45) not null ,
  name varchar(45) not null ,
  email varchar(90) not null unique,
  passwordgenerer varchar(70) not null,
  password varchar(70) not null ,
  role_id int(10) unsigned not null ,
  first_name varchar(70) not null ,
  last_name varchar(70) not null,
  telephone int(10) unsigned not null,
  address varchar (200) not null,
    join_date date not null ,
    parsing int(10) unsigned not null default 2,
profile_image char(60) not null default "http://10.0.0.1/gestionvie/profile_image/etudiant.png",
primary key (enseignantuser_id),
foreign key (role_id) references role (role_id));
 insert into enseignantusers (enseignantuser_id , id_unique,gender,name,email,password,role_id,first_name,last_name,telephone,address,join_date) values
 (1,'111111111','male',"prof1","prof1@gmail.com",MD5("gestionvie1"),2,'prof',"proff","062333333","meknes",str_to_date('11,01,2013','%d,%m,%y')),
(2,'222222222','male',"prof2","prof2@gmail.com",MD5("gestionvie2"),2,'prof2',"proff2","0600999993","meknes",str_to_date('12,02,2019','%d,%m,%y')),
(3,'3333333333','male',"prof3","prof3@gmail.com",MD5("gestionvie3"),2,'prof',"proff","062333333","meknes",str_to_date('12,02,2019','%d,%m,%y'));


create table module_enseignant (
    moduleenseignant_id int(10) not null auto_increment , 
  enseignantuser_id int(11) unsigned not null ,
    module_id  int(10) unsigned  not null,
    foreign key (enseignantuser_id) references enseignantusers(enseignantuser_id),
foreign key (module_id) references modules (module_id),
primary key (moduleenseignant_id)
);
insert into module_enseignant (enseignantuser_id, module_id) values
(1,3),
(1,4),
(2,5),
(2,8),
(3,6),
(3,7),
(3,8);


 drop table if exists adminusers ;
  create table adminusers (
    adminuser_id int(11) unsigned not null auto_increment ,
admin_name varchar(45) not null , 
email varchar(90) not null unique , 
password varchar(90) not null ,
first_name varchar(50) not null, 
last_name varchar(50) not null,
role_id int (10) unsigned not null default 1 ,
profile_image char(60) not null default "http://10.0.0.1/gestionvie/profile_image/etudiant.png",
parsing int(10) unsigned not null default 1,

primary key (adminuser_id),
foreign key (role_id) references role(role_id)
  );

insert into adminusers (adminuser_id,admin_name,email,password,first_name, last_name,role_id) 
 values (1,"rattoy", "rattoy@gmail.com",MD5("gestionvie"),"rattoy","rattoyy",1);

drop table if exists resultas;
create table resultas (
    resultas_id int(10) unsigned not null auto_increment , 
    semestre_id int(10) unsigned not null ,
    etudiantuser_id int(11) unsigned not null ,
    module_id int(10) unsigned not null ,
    notes decimal(4,2) not null,
    unique (etudiantuser_id,module_id),
    primary key (resultas_id),
    foreign key (semestre_id) references semestre (semestre_id),
    foreign key (module_id) references modules (module_id),
    foreign key (etudiantuser_id) references etudiantusers (etudiantuser_id)
);

insert into resultas (resultas_id, semestre_id,etudiantuser_id,module_id,notes) values (1,1,1,1,13.5),
(3,1,2,2,12.3),
 (4,1,2,3,15.3),
 (5,1,2,4,14.3); 



drop table if exists noticification;
create table noticification (
     notic_id int (10) unsigned not null auto_increment,
    notic_titre varchar(250) not null,
    notic_description varchar(500) not null , 
    publish_date TIMESTAMP not null ,
    departement_id int(10) unsigned not null ,
    parsing int(10) unsigned not null default 5,
    primary key (notic_id),
    foreign key (departement_id) references  departements (departement_id)
);
insert into noticification (notic_id , notic_titre , notic_description , publish_date,departement_id) values
(1,"annonce1","pour les etudiant tsi on ",current_timestamp,1),
(2,"annonce2","pour les etudiant gi on ",current_timestamp,1),
(3,"annonce3","pour les etudt ge on ",current_timestamp,1),
(4,"annonce4","pour les etudiant gim on ",current_timestamp,1),
(5,"annonce5","pour les etudiant isr on ",current_timestamp,1);



 drop table if exists noticification_enseignant;
 create table noticification_enseignant (
    notic_id int (10) unsigned not null auto_increment,
     notic_titre varchar(250) not null,
     notic_description varchar(500) not null ,
     publish_date TIMESTAMP not null ,
     departement_id int(10) unsigned not null,
    module_id int (10) unsigned not null,
    enseignantuser_id int (11) unsigned not null , 
enseignant_name varchar(50) not null ,
     primary key (notic_id),
    foreign key (module_id) references modules (module_id),
     foreign key (departement_id) references  departements (departement_id),
    foreign key (enseignantuser_id) references enseignantusers (enseignantuser_id)

 );
 insert into noticification_enseignant (notic_id , notic_titre , notic_description , publish_date,departement_id,module_id,enseignantuser_id,enseignant_name) values
 (1,"annonce1","module 1 ",current_timestamp,1,1,1,"prof1"),
 (2,"annonce2","module 2 ",current_timestamp,1,2,2,"prof2"),
 (3,"annonce3","module 3",current_timestamp,1,3,1,"prof1"),
 (4,"annonce4","module 4",current_timestamp,1,4,1,"prof1"),
 (5,"annonce5","module 5 ",current_timestamp,1,5,2,"prof2");


drop table if exists absences;
create table absences(
 absence_id int(10) unsigned not null auto_increment ,
absence_date TIMESTAMP default current_timestamp , 
etudiantuser_id int(10) unsigned not null ,
module_id int(10) unsigned not null ,
heur int(10) unsigned not null ,
status varchar(45) not null default 'p',
primary key (absence_id),
foreign key (etudiantuser_id) references etudiantusers (etudiantuser_id),
foreign key (module_id) references modules(module_id)
);

insert into absences (absence_id,etudiantuser_id,module_id) values
(1,1,1),
(2,2,1);

drop table if exists documents; 
create table documents(

  
    document_id int(10) unsigned auto_increment ,
    name varchar(100) not null ,
    module_id int (10) unsigned  not null ,
    pdfurl varchar(200) not null ,
    pdfurlicon varchar(200) not null ,
    enseignant_name varchar(20) not null ,
    enseignantuser_id int(11) unsigned not null ,
    primary key (document_id),
    foreign key (module_id) references modules(module_id),
    foreign key (enseignantuser_id) references enseignantusers(enseignantuser_id)
);
insert into documents (name , module_id , pdfurl , pdfurlicon , enseignantuser_id ) 
values 
("cours 1" , 1 , "http://10.0.0.1/gestionvie/testupload/saad.pdf","hereiconurl",1),
("cours 2" , 2 , "http://10.0.0.1/gestionvie/testupload/2.pdf","hereiconurl",1);



drop table if exists sections;
create table sections (
section_id int(10) not null auto_increment , 
section_name varchar(1) not null,
primary key (section_id)
);
insert into sections(section_id, section_name) values (1,'A'),(2,'B');

drop table if exists emploi;
create table emploi (
emploi_id int(10) unsigned not null auto_increment, 
title varchar(45) not null,
semestre_id int(10) unsigned NOT NULL ,
departement_id int (10) unsigned NOT NULL,
section_id int (10) not null,
imageurl varchar (100) not null ,
primary key (emploi_id),
foreign key (semestre_id) references semestre(semestre_id),
foreign key (departement_id) references departements(departement_id),
foreign key (section_id) references sections (section_id)
);


INSERT INTO `emploi`( `title`, `semestre_id`, `departement_id`, `section_id`, `imageurl`) VALUES 
('empgis1a',1,1,1,'1.jpg'),
('empgis1b',1,1,2,'2.jpg'),
('empgis2a',2,1,1,'3.jpg'),
('empgis2b',2,1,2,'4.jpg'),
('empgis3a',3,1,1,'5.jpg'),
('empgis3b',3,1,2,'6.jpg'),
('empgis4isr',4,1,1,'7.jpg'),
('empgis4gl',4,1,2,'8.jpg'),
('empgis5',5,1,1,'9.jpg'),
('empgis6',6,1,1,'10.jpg');

