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

- `/` GET - homepage (only this and the login page should be public?)
- `/book` GET - new booking form, select equipment to book
- `/book/:id` GET - new booking form, equipment chosen, choose details and submit
- `/bookings` GET, POST - display bookings (admins can see all bookings),
  post handles creating new bookings
- `/bookings/:id` GET, PUT, DELETE - read, update, delete on individual
  bookings
- `/account` GET - view your account details
- `/admin` GET - general admin dashboard page
- `/register` GET, POST - handles registering users
- `/login` GET, POST - handles user login
- `/logout` POST - handles user logout
- `/equipment` GET, POST - (admins only) view list of equipment, post to create
  new equipment
- `/equipment/:id` GET, PUT, DELETE - (admins only) read, update, delete
  equipment available to book
- `/equipment/new` GET - (admins only) display add new equipment form
- `/notices` GET - table of notices
- `/notices/new` GET, POST - create new notice
- `/notices/:id` GET - view a notice
- `/notices/:id/edit` GET, POST - edit a notice
- `/notices/:id/delete` DELETE, POST - delete a notice
- `/timeslots` GET - table of timeslots
- `/timeslots/new` GET, POST - create new notice
- `/timeslots/:id` GET - view a notice
- `/timeslots/:id/edit` GET, POST - edit a notice
- `/timeslots/:id/delete` DELETE, POST - delete a notice
- `/closed-days` GET - table of closed days
- `/closed-days/new` GET, POST - create new closed day
- `/closed-days/:id` GET - view a closed day
- `/closed-days/:id/edit` GET, POST - edit a closed day
- `/closed-days/:id/delete` DELETE, POST - delete a closed day


## Deploying

TODO


## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.


## License

TODO

[1]: https://book.cakephp.org/3.0/en/installation.html
