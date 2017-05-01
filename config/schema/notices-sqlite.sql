-- table for storing system notices

create table notices (
    id integer primary key,
    display_from int, -- use datetime format in mysql later - int can be used as a timestamp for now
    display_to int,
    title text not null,
    content text
);

