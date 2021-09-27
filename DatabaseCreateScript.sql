CREATE USER webauth WITH superuser PASSWORD 'PASSWORD';

create table equipment_items
(
  equipment_id SERIAL primary key,
  equipment_name varchar not null,
  equipment_campus varchar not null,
  equipment_lab varchar not null,
  equipment_location varchar not null,
  equipment_discipline varchar null,
  equipment_details varchar null,
  equipment_media varchar null,
  equipment_whs varchar null,
  equipment_status int not null
);

create table staff
(
  staff_id int not null primary key,
  staff_name varchar not null,
  staff_campus varchar not null,
  staff_contact varchar not null
);

create table students
(
  student_id int not null primary key,
  student_name varchar not null,
  student_contact varchar not null
);

create table msds
(
  doc_id SERIAL primary key,
  doc_name varchar not null,
  doc_url varchar not null
);

create table users
(
  user_id SERIAL primary key,
  username varchar not null,
  password varchar not null,
  student_id int null default null,
  staff_id int null default null,
  name varchar not null,
  contact varchar not null,
  campus varchar not null,
  is_staff boolean default false not null,
  is_admin boolean default false not null
);

create table lab_bookings
(
  booking_id SERIAL primary key,
  equipment_id int not null references equipment_items(equipment_id),
  staff_id int not null,
  student_id int not null,
  booking_date TIMESTAMP not null,
  return_date TIMESTAMP not null,
  booking_status boolean default false not null
);

insert into equipment_items (equipment_name, equipment_campus, equipment_lab, equipment_location, equipment_discipline,
equipment_details, equipment_media, equipment_whs, equipment_status)
values
  ('Automatic Level', 'Cairns', 'ROK 28/LG.01', 'Cab1-S4', 'Civil', 'leveling', null, null, 1),
  ('Automatic Level tripod', 'Cairns', 'ROK 28/LG.01', 'Cab1-S2', 'Civil', 'leveling', null, null, 1),
  ('Leica Total Station (S06 plus)', 'Cairns', 'ROK 28/LG.04', 'Cab1-S3', 'Civil', 'surveying, measurements', null, null, 1),
  ('Leica Total Station (S06)', 'Cairns', 'ROK 28/LG.04', 'Cab1-S4', 'Civil', 'surveying, measurements', null, null, 1),
  ('leica total Station tripod', 'Cairns', 'ROK 28/LG.04', 'Cab2-S1', 'Civil', 'surveying, measurements', null, null, 1),
  ('GNSS Leica Receiver (GS14)', 'Cairns', 'ROK 28/LG.04', 'Cab2-S3', 'Civil', 'communications', null, null, 1),
  ('2 Tonne Bridge Crane', 'Cairns', 'ROK 28/LG.01', 'Cab3-S6', 'Civil', 'lifting', null, null, 1),
  ('Flash Forge Creator 3 (FDM)', 'Melbourne', '6.25','Cab3-S3', 'Multi Purpose', '3D printing', null, 'https://www.flashforge.com/product-detail/1', 1),
  ('Funmat HT 3D Printer (FDM)', 'Melbourne', '6.25','Cab1-S4', 'Multi Purpose', '3D printing', null, 'https://www.intamsys.com/funmat-ht-3d-printer/', 1),
  ('Formbot Trex 3 (FDM)', 'Melbourne', '6.25','Cab4-S3', 'Multi Purpose', '3D printing', null, 'https://www.formbot3d.com/vivedino-t-rex-30-multi-function-big-size-3d-printer-p0062.html', 1),
  ('Formlabs 2 (SLA)', 'Melbourne', '6.25','Cab1-S2', 'Multi Purpose', 'measurements', null, 'https://formlabs.com/3d-printers/form-2/', 1),
  ('Tenma Programmable Power Supply 0-30V 10Amps', 'Melbourne', '6.25','Cab2-S4', '','remote control, power', null,'http://www.farnell.com/datasheets/2805374.pdf', 1),
  ('FESTO / LabVolt 8006 Power & Machines Trainers (qty 3)', 'Melbourne', '6.25','Cab3-S5', 'Electrical', 'power', null,'https://www.labvolt.com/solutions/6_electricity_and_new_energy/59-8006-10_computer_assisted_0_2_kw_electromechanical_training_system', 1),
  ('Oscilloscopes', 'Rockhampton', 'ROK 28/2.13','Cab1-S2', 'Multi Purpose', 'GUI, electrical signal', null, 'Standard lab induction', 1),
  ('Oscillators', 'Rockhampton', 'ROK 28/2.13','Cab2-S1', 'Multi Purpose', 'power, current conversion', null, 'Standard lab induction', 1),
  ('Multimeters', 'Rockhampton', 'ROK 28/2.13','Cab5-S4', 'Multi Purpose', 'power, measurements', null, 'Standard lab induction', 1),
  ('Power Supplies', 'Rockhampton', 'ROK 28/2.13','Cab6-S3', 'Multi Purpose', 'power, conversion', null, 'Standard lab induction', 1),
  ('Sinterit Lisa Pro 3D Printer', 'Rockhampton','ROK 28/2.16', 'Cab1-S4', 'Multi Purpose', '3D printing', null, 'Standard lab induction', 1),
  ('Funmat HT 3D Printer', 'Rockhampton', 'ROK 28/2.16','Cab2-S2', 'Multi Purpose', 'FFF, 3D printing', null, 'Standard lab induction', 1),
  ('Metal 3D Printer x 2', 'Rockhampton', 'ROK 28/2.16','Cab3-S5', 'Multi Purpose', 'metal, 3D printing', null, 'https://www.sinterit.com/sinterit-lisa-pro/', 1),
  ('Wash and Sinter II', 'Rockhampton', 'ROK 28/2.16','Cab5-S2', 'Multi Purpose', 'metal', null, 'https://markforged.com/3d-printers/metal-x', 1),
  ('GoPro Hero 5 Black', 'Rockhampton', 'ROK 28/2.16','Cab1-S1', 'Multi Purpose', 'video', null, 'Standard lab induction', 1),
  ('Sony RX100 Camera', 'Rockhampton', 'ROK 28/2.13','Cab6-S5', 'Multi Purpose', 'photography, video', null, 'https://www.sony.com.au/electronics/cyber-shot-compact-cameras/dsc-rx100', 1),
  ('Desiccant Wheel', 'Bundaberg', 'G.15','Cab1-S4', 'Mechanical', 'rams project', null, null, 1),
  ('Lab Volt MV Test equipment', 'Bundaberg', 'G.15','Cab2-S2', '', 'power', null, null, 1),
  ('ETS7000 electronics breadboard and PS', 'Bundaberg', 'G.15','Cab3-S1', '', 'power', null, null, 1),
  ('Power Supplies', 'Bundaberg', 'G.15','Cab2-S5', 'Electrical', 'power, conversion', null, null, 1),
  ('Oscilloscopes', 'Bundaberg', 'G.15','Cab5-S2', 'Electrical', 'GUI, electrical signal', null, null, 1),
  ('Oscillators', 'Bundaberg', 'G.15','Cab6-S3', 'Civil', 'power, current conversion', null, null, 1),
  ('Multimeters', 'Bundaberg', 'G.15','Cab1-S5', 'Civil', 'power, measurements', null, null, 1),
  ('Basic hydraulic test Bench', 'Melbourne', 'Room 3.22','Cab2-S4', 'Mechanical', 'hydraulics', null, null, 1),
  ('Up box 3D printer', 'Melbourne', 'Room 3.22','Cab2-S6', 'Mechanical', '3D printing', null, null, 1),
  ('UP box 3D printer mini', 'Melbourne', 'Room 3.22','Cab3-S1', 'Mechanical', '3D printing', null, null, 1),
  ('Mitre saw', 'Melbourne', 'Room 3.22','Cab3-S4', 'Mechanical', 'sawing, angles', null, null, 1),
  ('portable ladder', 'Melbourne', 'Room 3.22','Cab2-S8', 'Mechanical', 'accessibility', null, null, 1)
;

insert into staff values
  (0099, 'Jamie Shield', 'Cairns', 'j.shield@cqu.edu.au'),
  (0100, 'Travis Frame', 'Cairns', 't.frame@cqu.edu.au'),
  (0101, 'Michael', 'Melbourne', 'michael@cqu.edu.au')
;

insert into students values
  (12097012, 'John Doe', 'john.doe@cqumail.com'),
  (12877011, 'Jack Reed', 'jack.reed@cqumail.com'),
  (13254610, 'Grace Peay', 'grace.peay@cqumail.com'),
  (12087651, 'Jed Pena', 'jed.pena@cqumail.com'),
  (12009874, 'Maria Fox', 'maria.fox@cqumail.com'),
  (12097543, 'Stan Johnston', 'stanjohnston@cqumail.com')
;

insert into msds (doc_name, doc_url)
values
  ('Material Safety Data Sheets', 'https://www-msds-com-au.ezproxy.cqu.edu.au/DefaultMSDS.aspx?ReturnUrl=%2f'),
  ('First Aid', 'https://www.healthdirect.gov.au/first-aid'),
  ('Health Information Partners', 'https://www.healthdirect.gov.au/information-partners'),
  ('Emergency Services', 'https://info.australia.gov.au/information-and-services/public-safety-and-law/emergency-services'),
  ('Fire Safety', 'https://www.studyinaustralia.gov.au/english/live-in-australia/health-and-safety/fire')
;

INSERT INTO users(username, password, is_staff, name, contact, campus)
VALUES ('jack', 'test', false, 'jack', 'jack@gmail.com', 'Rockhampton')
;

insert into lab_bookings (equipment_id, staff_id, student_id, booking_date, return_date, booking_status)
values
  (1, 0099, 12097012, current_timestamp, current_timestamp, true),
  (2, 0099, 12097012, current_timestamp, current_timestamp, true),
  (7, 0100, 12087651, current_timestamp, current_timestamp, true),
  (9, 0100, 12087651, current_timestamp, current_timestamp, true),
  (11, 0101, 12009874, current_timestamp, current_timestamp, true),
  (13, 0101, 12097543, current_timestamp, current_timestamp, true)
;
