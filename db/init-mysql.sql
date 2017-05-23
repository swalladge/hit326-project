-- init the database tables - sqlite version


-- drop all the tables!
drop table if exists notices;
drop table if exists bookings;
drop table if exists closed_times;
drop table if exists opening_hours;
drop table if exists timeslots;
drop table if exists equipment;
drop table if exists users;
drop table if exists location;


-- NOTE: all dates generally in the following format: YYYY-MM-DD HH:mm

create table users (
    id int auto_increment primary key,
    email varchar(150) not null unique,
    password varchar(250) not null,
    name varchar(250) not null,
    role varchar(250) not null, -- set as text for readability
    phone varchar(250) not null -- can also be set to int, currently text would allow a free text field
) ENGINE=InnoDB;


create table equipment (
    id int auto_increment primary key,
    name varchar(250) not null,
    description varchar(10000) not null default '',
    location varchar(250) not null default '', -- TODO: make this reference location table
    is_portable boolean not null default 0,
    quantity int not null default 1,
    is_active boolean not null default 1
) ENGINE=InnoDB;

 -- Currently not implemented, will be added with equipment table
create table location (
  id int auto_increment primary key,
  location varchar(1000) not null default '',
  description varchar(10000) not null default ''
) ENGINE=InnoDB;


-- recurring weekly opening hours
create table opening_hours (
    id int auto_increment primary key,
    weekday int not null,
    start_time varchar(250) not null,
    end_time varchar(250) not null
) ENGINE=InnoDB;

-- once-off closed times/dates
create table closed_times (
    id int auto_increment primary key,
    start_time varchar(250) not null,
    end_time varchar(250) not null,
    reason varchar(10000) not null default '',
    equipment_id int references equipment(id) on delete cascade
) ENGINE=InnoDB;


create table bookings (
    id int auto_increment primary key,
    user_id int references users(id) on delete cascade,
    equipment_id int references equipment(id) on delete cascade,
    state varchar(100) not null default 'pending',
    user_notes varchar(10000) not null default '',
    start_date varchar(250) not null, -- store as date string
    end_date varchar(250) not null -- store as date string
) ENGINE=InnoDB;
--removed Duration


-- table for storing system notices to display on the homepage
create table notices (
    id int auto_increment primary key,
    display_from varchar(250) not null, -- date
    display_to varchar(250) not null,   -- date
    title varchar(250) not null default '',
    content varchar(10000) not null default ''
) ENGINE=InnoDB;
