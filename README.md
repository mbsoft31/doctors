how to run the app

// clone the code inside doctors folder

git clone https://github.com/mbsoft31/doctors.git doctors

// or you can download the code as zip and extract it to a folder named doctors

// cd into doctors folder 

cd doctors 

composer install

npm install

// create a database called doctors using eg: phpmyadmin

// create the database tables 

php artisan migrate:fresh --seed 

// run the server

php artisan serve 

a server will start on http://127.0.0.1:8000
