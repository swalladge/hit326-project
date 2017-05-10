
insert into equipment (name, description, location, is_portable, quantity) values
    ("printer1", "", "lab1", 0, 1),
    ("printer2", "", "lab1", 0, 1),
    ("microscope", "warning: fragile!", "lab2", 0, 1),
    ("desktop computer", "windows xp - watch for viruses :(", "lab3", 0, 1),
    ("Baseball bat", "", "lab4", 1, 3),
    ("something", "", "lab2", 1, 1);


-- 2 example users (an admin and a standard user), both with passwords set to 'password'
insert into users (email, password, name, role, phone) values
    ('admin@example.com','$2y$10$kJcXaIbe2h9jw/wOskR3/u7NvEM5dIPEeEzJXMGvwwDAyZyeIXhtC','Admin User','admin','999'),
    ('test@example.com','$2y$10$Ufpiw8gs4icUVfKMx9GT6usMC.cDEmKUuQz4VYqN9RUZWsFq.qUly','Example User','user','777');


insert into notices (display_from, display_to, title, content) values
    ('2017-05-02', '', 'Example Notice', 'This is an example notice to note that notices are working.');

insert into opening_hours (weekday, start_time, end_time) values
    (1, '09:00', '17:00'),
    (2, '09:00', '17:00'),
    (3, '09:00', '17:00'),
    (4, '09:00', '17:00'),
    (5, '09:00', '17:00');
