drop database if exists cquLabManager;
create database cquLabManager;
grant SELECT, INSERT, UPDATE, DELETE ON cqulabmanager.* TO 'webauth'@'localhost';
use cqulabmanager;

create table labEquipment
(equip_id int unsigned not null auto_increment primary key,
  equip_name varchar(25) not null,
  equip_campus varchar(50) not null,
  equip_lab varchar(25) not null,
  equip_discipline varchar(25) null,
  equip_details varchar(25) null,
  equip_media varchar(50) null, 
  equip_whs varchar(200) null 
);

insert into labEquipment values
	(1, 'Automatic Level', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null);

create table labBooking
(book_id int unsigned not null auto_increment primary key,
  equip_ID int not null references labEquipment(equip_id),
  equip_campus varchar(50) not null,
  staff_ID int not null references staff(staff_id),
  student_ID int null references student(student_id),
  date_ DATE not null default current_timestamp, 
 book_status boolean default false not null
);

insert into labBooking values
  (1, 1, 'Cairns', 2575, 12097012, current_timestamp, true);
create table staff
(staff_id int(10) not null primary key,
  staff_name varchar(50) not null,
  staff_campus varchar(50) not null,
  staff_contact varchar(30) not null
);

insert into staff values
	(2575, 'Jamie Shield', 'Cairns', 'j.shield@cqu.edu.au'); 

create table student
(student_id int(10) not null primary key,
  student_name varchar(50) not null,
  student_contact varchar(30) not null
);

insert into student values
	(12097012, 'John Doe', 'john.doe@cqumail.com');

create table authorized_users
(username varchar(20) not null primary key,
  password varchar(40)
);

insert into authorized_users values 
  ('admin', sha1('password')
 );

