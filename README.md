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
- `/admin/opening-hours` GET - table of opening hours
- `/admin/opening-hours/new` GET, POST - create new opening hours
- `/admin/opening-hours/:id` GET - view an opening hours entry
- `/admin/opening-hours/:id/edit` GET, POST - edit an opening hours entry
- `/admin/opening-hours/:id/delete` DELETE, POST - delete an opening hours entry
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

## Ajax

- `/book/:id/available/:date` GET - retrieve json data for times equipment (:id) is available on a day (:date)


## Deploying

### set up the database

To init the cdunit_HIT326_DB1 database:

```
mysql -h spinetail.cdu.edu.au -u cdunit -p'PASSWORD' cdunit_HIT326_DB1 <
db/init-mysql.sql
```

### create a production config file

```
cp config/app.default.php config/app.production.php
```

then edit app.production.php to your liking (disable debug mode, add db passwords, etc.


### run the deploy script

```
./deploy.sh
```

Note that this has only been tested on linux, and requires `lftp`, `rsync`, and `composer` to be installed.
Also, you will need to run `composer install` afterwards to continue
development, since this removes the require-dev php dependencies (required for
debug mode and testing).


## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.


## License


        Room and Equipment Booking Web Application
        Copyright (C) 2017 Mrinalini Padmanabhan, Jarrod O'Callaghan, Samuel Walladge

        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU Affero General Public License as
        published by the Free Software Foundation, either version 3 of the
        License, or (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU Affero General Public License for more details.

        You should have received a copy of the GNU Affero General Public License
        along with this program.  If not, see <http://www.gnu.org/licenses/>.


[1]: https://book.cakephp.org/3.0/en/installation.html
