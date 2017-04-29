# Room and Equipment Booking Web Application

Copyright © 2017 Mrinalini Padmanabhan, Jarrod O'Callaghan, Samuel Walladge


## About

This project aims to create an online room and equipment booking application. It will be targeted for use within CDU,
and will aim to replace the current, non-ideal solution.

## TODO

- need to work out how to manage timeslots
- should it be dependent on javascript? consider using ajax? - this will help
  decide whether to make it a RESTful-like api returning json data, or just flash a
  message and redirect on form submissions

- sort out the equipment vs room booking problem - can you book a room, space
  in a room, equipment, or a combination? Maybe some bookable equipment can
  be "room space"? This would work unless it's possible to book specific
  equipment in a room _as well as_ simply room space - because then we have
  dependencies between bookable items which would increase the complexity of
  the database.

- for booking, do we want ability to do something like clicking "book" on some
  equipment item in a table of equipment to open a form for booking that
  equipment (rather than selecting some equipment from a dropdown list in the
  form?

## Ideas

- no separate admin page - extra controls display when admin logged in


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


## Deploying

TODO


## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.


## License

TODO

[1]: https://book.cakephp.org/3.0/en/installation.html
