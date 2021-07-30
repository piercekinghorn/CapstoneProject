drop database if exists cquLabManager;
create database cquLabManager;
grant SELECT, INSERT, UPDATE, DELETE ON cqulabmanager.* TO 'webauth'@'localhost';
use cqulabmanager;

create table labEquipment
(equip_id int unsigned not null auto_increment primary key,
  equip_name varchar(50) not null,
  equip_campus varchar(50) not null,
  equip_lab varchar(25) not null,
  equip_discipline varchar(25) null,
  equip_details varchar(25) null,
  equip_media varchar(50) null, 
  equip_whs varchar(200) null 
);

insert into labEquipment values
	(1, 'Automatic Level', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null),
  (2, 'Automatic Level tripod', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null),
  (3, 'Leica Total Station (S06 plus)', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (4, 'Leica Total Station (S06)', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (5, 'leica total Station tripod', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (6, 'GNSS Leica Receiver (GS14)', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (7, '2 Tonne Bridge Crane', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null),
  (8, 'Flash Forge Creator 3 (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.flashforge.com/product-detail/1'),
  (9, 'Funmat HT 3D Printer (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.intamsys.com/funmat-ht-3d-printer/'),
  (10, 'Formbot Trex 3 (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.formbot3d.com/vivedino-t-rex-30-multi-function-big-size-3d-printer-p0062.html'),
  (11, 'Formlabs 2 (SLA)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://formlabs.com/3d-printers/form-2/'),
  (12, 'Tenma Programmable Power Supply 0-30V 10Amps', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null,'http://www.farnell.com/datasheets/2805374.pdf'),
  (13, 'FESTO / LabVolt 8006 Power & Machines Trainers (qty 3)', 'Melbourne', '6.25', 'Electrical', 'ENEX20001', null,'https://www.labvolt.com/solutions/6_electricity_and_new_energy/59-8006-10_computer_assisted_0_2_kw_electromechanical_training_system');

create table labBooking
(book_id int unsigned not null auto_increment primary key,
  equip_ID int not null references labEquipment(equip_id),
  staff_ID int not null references staff(staff_id),
  student_ID int null references student(student_id),
  date_ DATE not null default current_timestamp, 
 book_status boolean default false not null
);

insert into labBooking values
  (1, 1, 0099, 12097012, current_timestamp, true),
  (2, 2, 0099, 12097012, current_timestamp, true),
  (3, 7, 0100, 12087651, current_timestamp, true),
  (4, 9, 0100, 12087651, current_timestamp, true),
  (5, 11, 0101, 12009874, current_timestamp, true),
  (6, 13, 0101, 12097543, current_timestamp, true);

create table staff
(staff_id int(10) not null primary key,
  staff_name varchar(50) not null,
  staff_campus varchar(50) not null,
  staff_contact varchar(30) not null
);

insert into staff values
	(0099, 'Jamie Shield', 'Cairns', 'j.shield@cqu.edu.au'),
  (0100, 'Travis Frame', 'Cairns', 't.frame@cqu.edu.au'),
  (0101, 'Michael', 'Melbourne', 'michael@cqu.edu.au'); 

create table student
(student_id int(10) not null primary key,
  student_name varchar(50) not null,
  student_contact varchar(30) not null
);

insert into student values
	(12097012, 'John Doe', 'john.doe@cqumail.com'),
  (12877011, 'Jack Reed', 'jack.reed@cqumail.com'),
  (13254610, 'Grace Peay', 'grace.peay@cqumail.com'),
  (12087651, 'Jed Pena', 'jed.pena@cqumail.com'),
  (12009874, 'Maria Fox', 'maria.fox@cqumail.com'),
  (12097543, 'Stan Johnston', 'stanjohnston@cqumail.com');


create table authorized_users
(username varchar(20) not null primary key,
  password varchar(40)
);

insert into authorized_users values 
  ('lab', sha1('password')),
  ('reese', sha1('password')),
  ('pierce', sha1('password')),
  ('myles', sha1('password')),
  ('jack', sha1('password')),
  ('nick', sha1('password'));

GRANT ALL PRIVILEGES ON cqulabmanager. * TO 'lab'@'localhost';
