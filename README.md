Project can be updated/deleted only by user which created it.<br />
Anyone can update and delete employees<br />



Download Zip<br />
Place folder into your www folder<br />
Open with VSC or other program<br />
Run:  <b> php composer.phar require laravel/ui <br /> </b>
Run: <b> npm install && npm run dev<br /> </b>
Rename file .env.example to .env<br />

.env file info:<br />
DB_CONNECTION=mysql<br />
DB_HOST=127.0.0.1<br />
DB_PORT=3306<br />
DB_DATABASE=sprint5<br />
DB_USERNAME=root<br />
DB_PASSWORD=mysql<br />

Create schema in MySQL Workbench named: sprint5<br />
Run:<b> php artisan migrate</b>( one error will be shown- thats ok)<br />
Then run:<b> php artisan db:seed<br /></b>
Then run again:<b> php artisan migrate<br /></b>
Run: <b>php artisan key:generate<br /></b>
Run: <b>php artisan serve<br /></b>
Open in your browser  http://127.0.0.1:8000/<br />
Login info:<br />
Name: Admin	<br />
Password: Neatspejamas<br />




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


