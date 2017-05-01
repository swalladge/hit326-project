-- tables for storing timeslot info

create table timeslots (
    id integer primary key,
    weekday int not null,    -- or a better type? if int, then it should be 1-7
    start_time int not null, -- datetime (with only the HH:MM set)
    duration int not null    -- duration in minutes
);

create table closed_days (
    id integer primary key,
    date int not null,       -- datetime with only YYYY-MM-DD set
    reason text              -- optional notes about why this is closed
);

