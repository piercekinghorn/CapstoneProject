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
	(1, 'Automatic Level', 'Rockhampton', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null),
  (2, 'Automatic Level tripod', 'Rockhampton', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null),
  (3, 'Leica Total Station (S06 plus)', 'Rockhampton', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (4, 'Leica Total Station (S06)', 'Rockhampton', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (5, 'Leica total Station tripod', 'Rockhampton', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (6, 'GNSS Leica Receiver (GS14)', 'Rockhampton', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null),
  (7, '2 Tonne Bridge Crane', 'Rockhampton', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null),
  (8, 'Flash Forge Creator 3 (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.flashforge.com/product-detail/1'),
  (9, 'Funmat HT 3D Printer (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.intamsys.com/funmat-ht-3d-printer/'),
  (10, 'Formbot Trex 3 (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.formbot3d.com/vivedino-t-rex-30-multi-function-big-size-3d-printer-p0062.html'),
  (11, 'Formlabs 2 (SLA)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://formlabs.com/3d-printers/form-2/'),
  (12, 'Tenma Programmable Power Supply 0-30V 10Amps', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null,'http://www.farnell.com/datasheets/2805374.pdf'),
  (13, 'FESTO / LabVolt 8006 Power & Machines Trainers (qty 3)', 'Melbourne', '6.25', 'Electrical', 'ENEX20001', null,'https://www.labvolt.com/solutions/6_electricity_and_new_energy/59-8006-10_computer_assisted_0_2_kw_electromechanical_training_system'),
  (14, 'Oscilloscopes', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction'),
  (15, 'Oscillators', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction'),
  (16, 'Multimeters', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction'),
  (17, 'Power Supplies', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction'),
  (18, 'Sinterit Lisa Pro 3D Printer', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', 'ENEE14006, ENEX20001', null, 'Standard lab induction'),
  (19, 'Funmat HT 3D Printer', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', 'ENEE14006, ENEX20001', null, 'Standard lab induction'),
  (20, 'Metal 3D Printer x 2', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', '', null, 'https://www.sinterit.com/sinterit-lisa-pro/'),
  (21, 'Wash and Sinter II', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', '', null, 'https://markforged.com/3d-printers/metal-x'),
  (22, 'GoPro Hero 5 Black', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', '', null, 'Standard lab induction'),
  (23, 'Sony RX100 Camera', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', '', null, 'https://www.sony.com.au/electronics/cyber-shot-compact-cameras/dsc-rx100'),
  (24, 'Desiccant Wheel', 'Bundaberg', 'G.15', 'Mechanical', 'Rams Project', null, null),
  (25, 'Lab Volt MV Test equipment', 'Bundaberg', 'G.15', 'Electrical', '', null, null),
  (26, 'ETS7000 electronics breadboard and PS', 'Bundaberg', 'G.15', '', '', null, null),
  (27, 'Power Supplies', 'Bundaberg', 'G.15', 'Electrical', 'ENAE12013', null, null),
  (28, 'Oscilloscopes', 'Bundaberg', 'G.15', 'Electrical', 'ENAE12013', null, null),
  (29, 'Oscillators', 'Bundaberg', 'G.15', 'Civil', 'ENAE12013', null, null),
  (30, 'Multimeters', 'Bundaberg', 'G.15', 'Civil', 'ENAE12013', null, null),
  (31, 'Basic hydraulic test Bench', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null),
  (32, 'Up box 3D printer', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null),
  (33, 'UP box 3D printer mini', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null),
  (34, 'Mitre saw', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null),
  (35, 'portable lader', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null)
  ;

create table labBooking
(book_id int unsigned not null auto_increment primary key,
  equip_ID int not null references labEquipment(equip_id),
  staff_ID int not null references staff(staff_id),
  student_ID int null references student(student_id),
  date_book DATE not null default current_timestamp, 
  date_return DATE not null default current_timestamp, 
 book_status boolean default false not null
);

insert into labBooking values
  (1, 1, 0099, 12097012, current_timestamp, current_timestamp, true),
  (2, 2, 0099, 12097012, current_timestamp, current_timestamp, true),
  (3, 7, 0100, 12087651, current_timestamp, current_timestamp, true),
  (4, 9, 0100, 12087651, current_timestamp, current_timestamp, true),
  (5, 11, 0101, 12009874, current_timestamp, current_timestamp, true),
  (6, 13, 0101, 12097543, current_timestamp, current_timestamp, true);

create table staff
(staff_id int(10) not null primary key,
  staff_name varchar(50) not null,
  staff_campus varchar(50) not null,
  staff_contact varchar(30) not null
);

insert into staff values
	(0099, 'Jamie Shield', 'Cairns', 'j.shield@cqu.edu.au'),
  (0100, 'Travis Frame', 'Rockhampton', 't.frame@cqu.edu.au'),
  (0101, 'Troy Simpson', 'Rockhampton', 't.simpson@cqu.edu.au'),
  (0102, 'Naveen Murugan', 'Melbourne', 'n.murugan@cqu.edu.au'),
  (0103, 'Andrew West', 'Cairns', 'a.west@cqu.edu.au'),
  (0104, 'Paula Frame', 'Rockhampton', 'p.frame@cqu.edu.au'); 

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
