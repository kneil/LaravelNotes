Install
-------

The env has been setup to use mysql on 127.0.0.1, port 3306
and is expecting a database called 'laravel' to exist'.
You'll need a .env file to get everything working.

To create the DB:

<pre>
echo "create database if not exists laravel" | mysql -uroot
</pre>

To install the vendor packages run:

<pre>
composer install
</pre>

To initialise the database run:

<pre>
php artisan migrate
</pre>


If you need to rebuild assets:

</pre>

npm install --save

</pre>

And then to rebuild the assets:

<pre>
npm run dev
</pre>

To start the server:

php artisan serve
</pre>

or run

<pre>
bin/start
</pre>

Use of the site
---------------

The main page is at 127.0.0.1:8000

Visit the login link and create an account.

Login.

Now you can create update and delete notes using the relevant links
display on the various pages.

If you logout you will still be able to view and search but you will not 
be able to modify the create, update or delete notes.

Dev note.
--------

The app was created using a Laravel skeleton app ( laravel new notes ).    Most of the addional work has involved setting up the migations, Note Controller, and adding routes, templates a responsve menu.


