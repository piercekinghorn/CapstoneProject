drop database if exists cquLabManager;
create database cquLabManager;
CREATE USER 'webauth'@'localhost' IDENTIFIED BY 'PASSWORD';
GRANT ALL PRIVILEGES ON cqulabmanager.* TO 'webauth'@'localhost' WITH GRANT OPTION;
use cquLabManager;

create table equipment_items
(
  equipment_id int unsigned not null auto_increment primary key,
  equipment_name varchar(50) not null,
  equipment_campus varchar(50) not null,
  equipment_lab varchar(25) not null,
  equipment_discipline varchar(25) null,
  equipment_details varchar(25) null,
  equipment_media varchar(50) null, 
  equipment_whs varchar(200) null,
  equipment_status int(1) not null
);

insert into equipment_items values
  (1, 'Automatic Level', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null, 1),
  (2, 'Automatic Level tripod', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null, 1),
  (3, 'Leica Total Station (S06 plus)', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null, 1),
  (4, 'Leica Total Station (S06)', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null, 1),
  (5, 'leica total Station tripod', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null, 1),
  (6, 'GNSS Leica Receiver (GS14)', 'Cairns', 'ROK 28/LG.04', 'Civil', 'Research and consulting', null, null, 1),
  (7, '2 Tonne Bridge Crane', 'Cairns', 'ROK 28/LG.01', 'Civil', 'Research and consulting', null, null, 1),
  (8, 'Flash Forge Creator 3 (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.flashforge.com/product-detail/1', 1),
  (9, 'Funmat HT 3D Printer (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.intamsys.com/funmat-ht-3d-printer/', 1),
  (10, 'Formbot Trex 3 (FDM)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://www.formbot3d.com/vivedino-t-rex-30-multi-function-big-size-3d-printer-p0062.html', 1),
  (11, 'Formlabs 2 (SLA)', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null, 'https://formlabs.com/3d-printers/form-2/', 1),
  (12, 'Tenma Programmable Power Supply 0-30V 10Amps', 'Melbourne', '6.25', 'Multi Purpose', 'ENEX20001', null,'http://www.farnell.com/datasheets/2805374.pdf', 1),
  (13, 'FESTO / LabVolt 8006 Power & Machines Trainers (qty 3)', 'Melbourne', '6.25', 'Electrical', 'ENEX20001', null,'https://www.labvolt.com/solutions/6_electricity_and_new_energy/59-8006-10_computer_assisted_0_2_kw_electromechanical_training_system', 1),
  (14, 'Oscilloscopes', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction', 1),
  (15, 'Oscillators', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction', 1),
  (16, 'Multimeters', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction', 1),
  (17, 'Power Supplies', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', 'ENAE12013', null, 'Standard lab induction', 1),
  (18, 'Sinterit Lisa Pro 3D Printer', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', 'ENEE14006, ENEX20001', null, 'Standard lab induction', 1),
  (19, 'Funmat HT 3D Printer', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', 'ENEE14006, ENEX20001', null, 'Standard lab induction', 1),
  (20, 'Metal 3D Printer x 2', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', '', null, 'https://www.sinterit.com/sinterit-lisa-pro/', 1),
  (21, 'Wash and Sinter II', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', '', null, 'https://markforged.com/3d-printers/metal-x', 1),
  (22, 'GoPro Hero 5 Black', 'Rockhampton', 'ROK 28/2.16', 'Multi Purpose', '', null, 'Standard lab induction', 1),
  (23, 'Sony RX100 Camera', 'Rockhampton', 'ROK 28/2.13', 'Multi Purpose', '', null, 'https://www.sony.com.au/electronics/cyber-shot-compact-cameras/dsc-rx100', 1),
  (24, 'Desiccant Wheel', 'Bundaberg', 'G.15', 'Mechanical', 'Rams Project', null, null, 1),
  (25, 'Lab Volt MV Test equipment', 'Bundaberg', 'G.15', 'Electrical', '', null, null, 1),
  (26, 'ETS7000 electronics breadboard and PS', 'Bundaberg', 'G.15', '', '', null, null, 1),
  (27, 'Power Supplies', 'Bundaberg', 'G.15', 'Electrical', 'ENAE12013', null, null, 1),
  (28, 'Oscilloscopes', 'Bundaberg', 'G.15', 'Electrical', 'ENAE12013', null, null, 1),
  (29, 'Oscillators', 'Bundaberg', 'G.15', 'Civil', 'ENAE12013', null, null, 1),
  (30, 'Multimeters', 'Bundaberg', 'G.15', 'Civil', 'ENAE12013', null, null, 1),
  (31, 'Basic hydraulic test Bench', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null, 1),
  (32, 'Up box 3D printer', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null, 1),
  (33, 'UP box 3D printer mini', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null, 1),
  (34, 'Mitre saw', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null, 1),
  (35, 'portable lader', 'Melbourne', 'Room 3.22', 'Mechanical', '', null, null, 1)
  ;

create table lab_bookings
(
  booking_id int unsigned not null auto_increment primary key,
  equipment_id int not null references equipment_items(equipment_id),
  staff_id int not null references staff(staff_id),
  student_id int null references student(student_id),
  booking_date TIMESTAMP not null default current_timestamp,
  booking_status boolean default false not null
);

insert into lab_bookings values
  (1, 1, 0099, 12097012, current_timestamp, true),
  (2, 2, 0099, 12097012, current_timestamp, true),
  (3, 7, 0100, 12087651, current_timestamp, true),
  (4, 9, 0100, 12087651, current_timestamp, true),
  (5, 11, 0101, 12009874, current_timestamp, true),
  (6, 13, 0101, 12097543, current_timestamp, true);

create table staff
(
  staff_id int(10) not null primary key,
  staff_name varchar(50) not null,
  staff_campus varchar(50) not null,
  staff_contact varchar(30) not null
);

insert into staff values
  (0099, 'Jamie Shield', 'Cairns', 'j.shield@cqu.edu.au'),
  (0100, 'Travis Frame', 'Cairns', 't.frame@cqu.edu.au'),
  (0101, 'Michael', 'Melbourne', 'michael@cqu.edu.au'); 

create table students
(
  student_id int(10) not null primary key,
  student_name varchar(50) not null,
  student_contact varchar(30) not null
);

insert into students values
  (12097012, 'John Doe', 'john.doe@cqumail.com'),
  (12877011, 'Jack Reed', 'jack.reed@cqumail.com'),
  (13254610, 'Grace Peay', 'grace.peay@cqumail.com'),
  (12087651, 'Jed Pena', 'jed.pena@cqumail.com'),
  (12009874, 'Maria Fox', 'maria.fox@cqumail.com'),
  (12097543, 'Stan Johnston', 'stanjohnston@cqumail.com');

  create table msds
  (
    doc_id int unsigned not null auto_increment primary key,
    doc_name varchar(50) not null,
    doc_url varchar(100) not null
  );

  insert into msds values
    (1, 'Material Safety Data Sheets', 'https://www-msds-com-au.ezproxy.cqu.edu.au/DefaultMSDS.aspx?ReturnUrl=%2f'),
    (2, 'First Aid', 'https://www.healthdirect.gov.au/first-aid'),
    (3, 'Health Information Partners', 'https://www.healthdirect.gov.au/information-partners'),
    (4, 'Emergency Services', 'https://info.australia.gov.au/information-and-services/public-safety-and-law/emergency-services'),
    (5, 'Fire Safety', 'https://www.studyinaustralia.gov.au/english/live-in-australia/health-and-safety/fire')
    ;


create table users
(
  user_id int(10) unsigned not null auto_increment primary key,
  username varchar(20) not null,
  password varchar(255),
  is_staff boolean default false not null
);

insert into users values 
  (NULL, 'jack', 'test', false);