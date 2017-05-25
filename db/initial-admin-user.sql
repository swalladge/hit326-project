

-- inserts an example admin user with password set to `password`
insert into users (email, password, name, role, phone) values
    ('admin@example.com','$2y$10$gpVtI03JInU/nAMPgnNpxOwm00b2VeyXZPyVJY.vmYrCVlSgxXoJe','Admin User','admin','999');
