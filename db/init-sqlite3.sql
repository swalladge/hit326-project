-- init the database tables - sqlite version

-- drop all the tables!
drop table notices;
drop table bookings;
drop table closed_days;
drop table timeslots;
drop table equipment;
drop table users;



create table users (
    id integer primary key,
    first_name text,
    last_name text not null,
    role integer,
    email text
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


-- tables for storing timeslot info
create table timeslots (
    id integer primary key,
    weekday int not null,    -- or a better type? if int, then it should be 1-7
    start_time int not null, -- datetime (with only the hh:mm set)
    duration int not null    -- duration in minutes
);

create table closed_days (
    id integer primary key,
    date int not null,       -- datetime with only yyyy-mm-dd set
    reason text              -- optional notes about why this is closed
);



create table bookings (
    id integer primary key,
    userid integer references users(id) on delete cascade,
    equipment_id integer references equipment(id) on delete cascade,
    date integer not null,
    start_time integer not null,
    duration integer not null
);


-- table for storing system notices to display on the homepage
create table notices (
    id integer primary key,
    display_from integer, -- date
    display_to integer,   -- date
    title text,
    content text
);

