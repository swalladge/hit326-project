-- init the database tables - sqlite version

-- drop all the tables!
drop table if exists notices;
drop table if exists bookings;
drop table if exists closed_days;
drop table if exists timeslots;
drop table if exists equipment;
drop table if exists users;
drop table if exists location;



create table users (
    id integer primary key,
    email text not null unique,
    password text not null,
    name text not null,
    role text not null, -- set as text for readability
    phone text not null -- can also be set to int, currently text would allow a free text field
);


create table equipment (
    id integer primary key,
    name text not null,
    description text not null default '',
    location text not null default '', -- TODO: make this reference location table
    is_portable boolean not null,
    quantity integer not null default 1,
    is_active integer not null default 1
);

 -- Currently not implemented, will be added with equipment table
create table location (
  id integer primary key,
  location text not null default '',
  description text not null default ''
);


-- recurring weekly closed times/dates - night time, weekends, etc.
create table weekly_closed_times (
    id integer primary key,
    weekday integer not null,
    start_time text not null,
    end_time text not null,
    entire_day integer not null default 0,
    reason text not null default '',
    equipment_id integer references equipment(id) on delete cascade -- optionally reference equipment to have specific equipment unavailable at times
);

-- once-off closed times/dates
create table closed_times (
    id integer primary key,
    start_time text not null,
    end_time text not null,
    reason text not null default '',
    equipment_id integer references equipment(id) on delete cascade
);


create table bookings (
    id integer primary key,
    user_id integer references users(id) on delete cascade,
    equipment_id integer references equipment(id) on delete cascade,
    state text not null default 'pending',
    user_notes text not null default '',
    start_date text not null, -- store as date string
    end_date text not null -- store as date string
);
--removed Duration


-- table for storing system notices to display on the homepage
create table notices (
    id integer primary key,
    display_from text not null, -- date
    display_to text not null,   -- date
    title text not null default '',
    content text not null default ''
);
