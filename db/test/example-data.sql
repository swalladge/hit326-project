
insert into equipment (name, description, location, is_portable, quantity) values
    ("printer1", "", "lab1", 0, 1),
    ("printer2", "", "lab1", 0, 1),
    ("microscope", "warning: fragile!", "lab2", 0, 1),
    ("desktop computer", "windows xp - watch for viruses :(", "lab3", 0, 1),
    ("Baseball bat", "", "lab4", 1, 3),
    ("something", "", "lab2", 1, 1);


-- 2 example users (an admin and a standard user), both with passwords set to 'password'
insert into users (email, password, role, phone) values
    ('admin@example.com','$2y$10$kJcXaIbe2h9jw/wOskR3/u7NvEM5dIPEeEzJXMGvwwDAyZyeIXhtC','admin','999'),
    ('test@example.com','$2y$10$Ufpiw8gs4icUVfKMx9GT6usMC.cDEmKUuQz4VYqN9RUZWsFq.qUly','user','777');


insert into notices (display_from, display_to, title, content) values
    ('2017-05-02', '', 'Example Notice', 'This is an example notice to note that notices are working.');
