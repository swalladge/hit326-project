# Room and Equipment Booking Web Application

Copyright © 2017 Mrinalini Padmanabhan, Jarrod O'Callaghan, Samuel Walladge


## About

This project aims to create an online room and equipment booking application. It will be targeted for use within CDU,
and will aim to replace the current, non-ideal solution.


## TODO


## Developing

1. Make sure you have php and composer installed. More information on dependencies can be found in the [cakephp docs][1].

2. Install project dependencies and run the post-install script with composer.

   ```bash
   composer install
   composer run-script post-install-cmd
   ```

3. Copy `config/app.default.php` to `config/app.php` and edit as required. Note that `config/app.php` is the live config
   and not checked into git.

4. Install frontend dependencies with [bower](https://bower.io/#install-bower). (Note: unless you are modifying what frontend js libraries are installed, this is unnecessary: all bower component files are stored in the repo.)

   ```bash
   bower install
   ```

5. Start the development server for testing while developing.

   ```bash
   bin/cake server -p 8765
   ```

   Then visit `http://localhost:8765`.

6. Run any tests with:

   ```bash
   composer run-script check
   ```

## Database

WIP - sqlite database being used for testing atm - some instructions:

```
# note: run from the project directory
# initiate the database (warning: drops tables before creating)
sqlite3 db.sqlite3 < db/init-sqlite3.sql

# load some test data
sqlite3 db.sqlite3 < db/test/example-data.sql
```


## Routes

- `/` GET - homepage (public access)
- `/login` GET, POST - handles user login (public access)
- `/register` GET, POST - handles registering users (public access)
- `/logout` POST - logs the user out if logged in (redirects to homepage)
- `/account` GET - view your account details
<!-- - `/book` GET - new booking form, select equipment to book -->
- `/equipment` GET - view the list of available equipment
- `/equipment/:id` GET - view an item of equipment to book
- `/book/:id` GET, POST - new booking form, equipment chosen, choose details and submit
- `/bookings` GET - display all user's bookings
- `/bookings/:id` GET - view a booking
- `/bookings/:id/edit` GET, POST - edit a booking
- `/bookings/:id/delete` POST, DELETE - delete a booking

### admins

- `/admin` GET - general admin dashboard page
- `/admin/bookings` GET - display all user's bookings
- `/admin/bookings/:id` GET - view a booking
- `/admin/bookings/:id/edit` GET, POST - edit a booking
- `/admin/bookings/:id/delete` POST, DELETE - delete a booking
- `/admin/equipment` GET, POST - (admins only) view list of equipment, post to create new equipment
- `/admin/equipment/:id` GET, PUT, DELETE - (admins only) read, update, delete equipment available to book
- `/admin/equipment/new` GET - (admins only) display add new equipment form
- `/admin/notices` GET - table of notices
- `/admin/notices/new` GET, POST - create new notice
- `/admin/notices/:id` GET - view a notice
- `/admin/notices/:id/edit` GET, POST - edit a notice
- `/admin/notices/:id/delete` DELETE, POST - delete a notice
- `/admin/timeslots` GET - table of timeslots
- `/admin/timeslots/new` GET, POST - create new notice
- `/admin/timeslots/:id` GET - view a notice
- `/admin/timeslots/:id/edit` GET, POST - edit a notice
- `/admin/timeslots/:id/delete` DELETE, POST - delete a notice
- `/admin/closed-days` GET - table of closed days
- `/admin/closed-days/new` GET, POST - create new closed day
- `/admin/closed-days/:id` GET - view a closed day
- `/admin/closed-days/:id/edit` GET, POST - edit a closed day
- `/admin/closed-days/:id/delete` DELETE, POST - delete a closed day
- `/admin/users` GET - table of users
- `/admin/users/new` GET, POST - create new user
- `/admin/users/:id` GET - view a closed day
- `/admin/users/:id/edit` GET, POST - edit a user
- `/admin/users/:id/delete` DELETE, POST - delete a user


## Deploying

TODO


## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.


## License

TODO

[1]: https://book.cakephp.org/3.0/en/installation.html
