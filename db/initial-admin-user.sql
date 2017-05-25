

-- inserts an example admin user with password set to `password`
insert into users (email, password, name, role, phone) values
    ('admin@example.com','$2y$10$kJcXaIbe2h9jw/wOskR3/u7NvEM5dIPEeEzJXMGvwwDAyZyeIXhtC','Admin User','admin','999');
