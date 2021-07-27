drop database if exists cquLabManager;
create database cquLabManager;
grant SELECT, INSERT, UPDATE, DELETE ON cqulabmanager.* TO 'webauth'@'localhost';
use cqulabmanager;
-- figure this out relevant to the environment

create table labEquipment
(equip_id int unsigned not null auto_increment primary key,
  equip_name varchar(25) not null,
  equip_campus varchar(50) not null,
  equip_lab varchar(25) not null,
  equip_discipline varchar(25) null,
  equip_details varchar(25) null,
  equip_media ******(?) null, -- figure this out
  equip_whs ******(?) null -- figure this out, then fix the insert script
);

insert into labEquipment values
	(1, 'Automatic Level', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null); -- validate this with the above line 14-15

create table labBooking
(book_id int unsigned not null auto_increment primary key,
  equip_id int(10) not null foreign key, -- check foreign keys
  equip_campus varchar(50) not null,
  staff_id int(10) not null foreign key, -- check foreign keys
  student_id int(10) null foreign key, -- check foreign keys
  date_ DATETIME(?) null, -- check this
 book_status boolean(?) not null -- check this
);

insert into labBooking values
	(1, 1, 'Cairns', 2575, 12097012, ?, true); -- check/fix/validate this

create table staff
(staff_id int(10) not null primary key, -- check how primary keys work and auto increment
  staff_name varchar(50) not null,
  staff_campus varchar(50) not null,
  staff_contact varchar(30) not null
);

insert into staff values
	(2575, Jamie Shield, 'Cairns', 'j.shield@cqu.edu.au'); -- check/fix/validate this

create table student
(student_id int(10) not null primary key, -- check/fix/validate this
  student_name varchar(50) not null,
  student_contact varchar(30) not null
);

insert into student values
	(12097012, John Doe, 'john.doe@cqumail.com'); -- check/fix/validate this

create table authorized_users
(username varchar(20) not null primary key,
  password varchar(40)
);

insert into authorized_users values  -- validate these users actually have permissions
  ('admin', sha1('password'))
  ('Jack', sha1('password'))
  ('Nick', sha1('password'))
  ('Reese', sha1('password'))
  ('Pierce', sha1('password'))
  ('Myles', sha1('password'));
