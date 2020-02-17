Project Prerequisites:

PHP: ^7.1;<br>
Symfony/process: ^3.4|^4.1;<br>
Ghostscript: https://packagist.org/packages/gravitymedia/ghostscript;<br>
Imagick: https://packagist.org/packages/calcinai/php-imagick;

**Project setup:**

**1. Clone GitHub repo for this project locally**

**Note:** Make sure you have git installed locally on your computer first.
In your terminal go to folder, where you wish to clone this project,
then enter command 'git clone https://github.com/underch3/pdf.thumbnails.git'

**2. in terminal cd into pdf.thumbnails**

**3. Install Composer Dependencies**

With command 'composer install'

**4. Install NPM Dependencies**

With command 'npm install'

**5. Create a copy of your .env file**

With command 'cp .env.example .env'

**6. Generate an app encryption key**

php artisan key:generate

If you check the .env file again, you will see that it now has a long random string of characters
in the APP_KEY field. We now have a valid app encryption key.

**7. Create an empty database for our application**

Create an empty database for your project using the database tools you prefer (MySql was used in this project).
Just create an empty database here, the exact steps will
depend on your system setup.

**8. In the .env file, add database information to allow Laravel to connect to the database**

Add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match
the credentials of the database you just created.

**9. Migrate the database**

Once your credentials are in the .env file, now you can migrate your database.

php artisan migrate

It’s not a bad idea to check your database to make sure everything migrated the way you expected.

**10. Create following directories.**

Directory 'uploads' in 'storage/app/public/' for PDF files;
Directory 'thumbnails' in 'storage/app/public/uploads' for thumbnails (.jpg files);

That is all you need to get started on a project.
