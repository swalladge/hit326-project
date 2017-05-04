-- init the database tables - sqlite version

-- drop all the tables!
drop table if exists notices;
drop table if exists bookings;
drop table if exists closed_days;
drop table if exists timeslots;
drop table if exists equipment;
drop table if exists users;



create table users (
    id integer primary key,
    email text not null unique,
    password text not null,
    firstName text not null,
    lastName text not null,
    role text not null, -- set as text for readability
    phone text not null -- can also be set to int, currently text would allow a free text field
);


create table equipment(
    id integer primary key,
    name text not null,
    description text,
    location text, -- TODO: make this reference location table
    is_portable boolean not null,
    quantity integer default 1,
    is_active integer default 1
);

 -- Currently Not Implemented, will be added with equipment table
create table location(
  locationID int IDENTITY(1,1) PRIMARY KEY,
  location varchar (255),
  description varchar (255)
);


-- tables for storing timeslot info
create table timeslots (
    id integer primary key,
    weekday int not null,    -- or a better type? if int, then it should be 1-7
    start_DateTime datetime not null, -- datetime (with only the hh:mm set)
    end_DateTime datetime not null, -- Store date time as: YYYY-MM-DD HH:MM or : YYYY-MM-DDTHH:MM
);

create table closed_days (
    id integer primary key,
    date int not null,       -- datetime with only yyyy-mm-dd set
    reason text              -- optional notes about why this is closed
);



create table bookings (
    id integer primary key,
    user_id integer references users(id) on delete cascade,
    equipment_id integer references equipment(id) on delete cascade,
    state text not null default 'pending',
    user_notes text not null default '',
    startDateTime datetime not null,
    endDateTime datetime not null
);
--removed Duration


-- table for storing system notices to display on the homepage
create table notices (
    id integer primary key,
    display_from text not null, -- date
    display_to text not null,   -- date
    title text,
    content text
);
