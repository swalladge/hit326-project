
insert into equipment (name, description, location, is_portable, quantity) values
    ("General Equipments", "", "Science and Environmental Lab 1", 0, 1),
    ("General Equipments", "", "Science and Environmental Lab 2", 0, 1),
    ("General Equipments", "", "Science and Environmental Lab 3", 0, 1),
    ("General Equipments", "", "Science and Environmental Lab 4", 0, 1),
    ("Gas Chromatography (GC)", "", "lab1", 0, 1),
    ("High Performance Liquid Chromatography (HPLC)", "", "Instruments Room", 0, 1),
    ("Nuclear Magnetic Resonance (NMR)", "", "Instruments Room", 0, 1),
    ("Fourier transform infrared spectroscopy (FTIR)", "", "Instruments Room", 0, 1),
    ("Atomic Absorption (AA)", "", "Instruments Room", 0, 1),
    (" Ultra Violet Visible (UV-VIS) spectrometers", "", "Instruments Room", 0, 1),
    ("Optical microscopes", "", "Microscopy Room", 0, 30),
    ("Fluorescence microscopes", "", "Microscopy Room", 0, 10),
    ("Microtome", "", "Microscopy Room", 0, 1),
    ("Centrifuge", "", "Microscopy Room", 0, 1),
    ("SEM (Scanning Electron Microscopy) ", "", "SEM (Scanning Electron Microscopy) Room", 0, 1),
    ("TEM (Transmission Electron Microscopy) ", "", "TEM (Transmission Electron Microscopy) Room", 0, 1),
    ("Satellite Phones", "", "Tech Services Store", 1, 3),
    ("EPIRB", "", "Tech Services Store", 1, 3),
    ("Differential GPS ", "", "Tech Services Store", 1, 3),
    ("Remote First Aid Boxes", "", "Tech Services Store", 1, 3);


-- 2 example users (an admin and a standard user), both with passwords set to 'password'
insert into users (email, password, name, role, phone) values
    ('test@example.com','$2y$10$luaSlfiPvLbxpjHYaqwg7eSi8M6vh6EeUP/M37Mx2195IIzYb188K','Example User','user','777'),
    ('test2@example.com','$2y$10$.uT6UWiRPZ93gwS3ADAn.O9qTx/6UopJK/AgdUaGQ6lLufSoBdmFK','Another User','user','123');


insert into notices (display_from, display_to, title, content) values
    ('2017-05-02', '', 'Example Notice', 'This is an example notice to note that notices are working.'),
    ('2017-07-02', '', 'Public Holiday Equipments Notice', 'We are very happy to inform you that selected equipments are available for use during public holidays.Please make a booking in 2 weeks advance.');

insert into opening_hours (weekday, start_time, end_time) values
    (1, '09:00', '17:00'),
    (2, '09:00', '17:00'),
    (3, '09:00', '17:00'),
    (4, '09:00', '17:00'),
    (5, '09:00', '17:00');
