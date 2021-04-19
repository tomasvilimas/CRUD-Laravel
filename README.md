Download Zip<br />
Place folder into your www folder<br />
Open with VSC or other program<br />
Run:  php composer.phar require laravel/ui <br />
Run: npm install && npm run dev<br />
Rename file .env.example to .env<br />

.env file info:<br />
DB_CONNECTION=mysql<br />
DB_HOST=127.0.0.1<br />
DB_PORT=3306<br />
DB_DATABASE=sprint5<br />
DB_USERNAME=root<br />
DB_PASSWORD=mysql<br />

Create schema in MySQL Workbench named: sprint5<br />
Run php artisan migrate( one error will be shown- thats ok)<br />
Then run: php artisan db:seed<br />
Then run again: php artisan migrate<br />
Run: php artisan key:generate<br />
Run php artisan serve<br />
Open in your browser  http://127.0.0.1:8000/<br />
Login info:<br />
Name: Admin	<br />
Password: Neatspejamas<br />




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


