## Development
1. Turn on xampp
2. PHP server
```
php artisan serve --port=8080
```
3. Turn on npm server
```
npm run watch
```

## Development Guildlines
1. Add all global setting constants in ```custom_lib .blade.php```
2. custom javascript functions in ```common_functions.js```
3. show loader on user request ```profile.js``` and search for ```hide loader``` & ```show loader```
4. server logs ```server_logs``` function in ```helper.php```
5. server configuration ```php_config``` function in ```helper.php```
6. css/js/images folders are meant to be in the root/main folder with sample file names only for local
8. Checkout storage on server
```
df -hi
```
9. global css file ```app.css```
10. sample or generic file ```sample_body.blade.php```
11. use sample view|css|js file to create fresh new view|css|js and update everything accordingly.Copy css|js
files in the root folder of laravel. Don't forget to update ```webpack.mix.js```
12. use ```popup_message``` function for popup
13. use ```SampleRequest.php``` function for Request Validation
14. use ```data_tables.blade.php``` file to work with ```datatables``` e.g. ```admin_lands.blade.php```
15. sample migration file ```2024_06_19_160520_create_land_comments_table```
16. define javascript/js constants in  ```vars.js```
17. checkout local php syntax
config file
```
pint.json
```
for normal usuage
```
./vendor/bin/pint
```
for not letting change the file
```
./vendor/bin/pint --test
```

18. deploy with one key
```
composer deploy
```
or
```
composer deploy_without
```
19. js config change
```
npx eslint -c configs/eslint.config.mjs
```
20. prettier syntax
```
npx prettier configs/pint.json --write --config configs/.prettierrc.json
```
```
npx prettier . --write --config configs/.prettierrc.json
```
21. create storage folder link
```
php artisan strge:ln
```

## Local Setup (Development)
1. set repo limit
```
git config --global http.postBuffer 1048576000
```
2. cloning the repo
```
git clone https://github.com/NoumanAhmad448/harbourislandcommonage_com
```
3. install xampp (Required PHP version -> 8.2) [Download Link](https://www.apachefriends.org/)
4. download node 18.18.0
5. Go to .env file and change the DB connection
6. Create a database
```
thesunr8_harbourislandcommonage_com
```
7. Visit this file database\migrations/2024_06_13_113402_add_super_admin.php and replace your
```your_email_here.com``` and
```your_password_here``` for super admin login

7. [Visit this file](/database/seeders/DatabaseSeeder.php) and uncomment everything inside ```run``` method
8. Get dump from someone else and upload
9. Visit ```bootstrap/cache``` and delete every file
10. visit ```storage/framework``` and create following folders
1. ```sessions```
2. ```views```
3. ```cache```
11. Run [this file](/local_development.sh)
12. Finally 😍😍😍😍😍😍😍 run your project using
```
php artisan serve --port=8080
```
### Super Admin Login
1. yourwebsite.com/admin/login
2. your_email_here.com
3. your_password_here


## Troubleshooting
mysql configuration file finder
```
which mysqld
```
```
/usr/sbin/mysqld --verbose --help | grep -A 1 "Default options"
```

mysql config
```
/etc/my.cnf
```

```
nano /var/lib/mysql/server1.nctest.net.err
```

mysql connection
```
mysql -h 127.0.0.1 -P 3306 -u user_name -p
```
clear user table for local development
```
DELETE from users;
```

mysql configuration
```
systemctl status mysql
```
or

```
journalctl -xe
```
```
systemctl start mysql
```

```
nano /etc/my.cnf
```

```

mysql -h 203.161.43.113 -P 3306 -u usmansaleem234_lyskills_root5 -p
```
Laravel cache clear routes
```
cd ~/public_html/website_7171ee6c &&
php artisan config:clear
```
```
php artisan config:clear
```
```
cd ~/public_html/website_7171ee6c &&
php artisan config:cache
```

```
php artisan config:cache
```

```
cd ~/public_html/website_7171ee6c &&
php artisan route:list
```
create model with migrations
```
php artisan make:model name --migration
```


storage logs
```
cd ~/public_html/website_7171ee6c/storage/logs/
```
make/create controller
```
php artisan make:controller
```


### Change s3 bucket
1. https://laravel-news.com/using-aws-s3-for-laravel-storage
POV: To find the URL, upload something in bucket and open it in new tab

How to fix 'The file failed to upload.' error using any validation for image upload - Laravel 5.7 
1. Login to WHM > search ``` PHP INI editor``` > Choose php81 > update the setting according to cpanel ``` INI editor```




### apache server
1. apache status
```
 systemctl status httpd
```
apache configuration file validation command
```
apachectl configtest
```
```
nano conf/httpd.conf
```

apache configration command
```
apachectl -V | grep SERVER_CONFIG_FILE
```

php configration file location for apache server
```
php --ini
```

```
nano /opt/cpanel/ea-php80/root/etc/php.ini
```

## Change PHP version in xampp
1. download ```thread safe``` php version from ```php.net```
2. make sure php folder has following files
```C:/xampp/php/php8apache2_4.dll``` <br/>
```C:/xampp/php/php8ts.dll``` <br/>
3. replace ```php.ini-development``` to ```php.ini```
4. Open ```php.ini``` file and enable all possible extensions using previous ```php.ini``` files
5. Replace following line ```curl.cainfo="C:\xampp\apache\bin\curl-ca-bundle.crt"```
6. Add ```extension_dir = "ext"```
7. restart apache server and make sure all settings are updated in ```http://localhost/dashboard/phpinfo.php```
8. Update php version in ```composer.json```
9. Delete composer.lock and run ```composer install``` otherwise following may help ```composer update --lock``` and then atleast once try ```composer install``` otherwise Run ```composer update```
10. restart ```artisan serve```


## Fresh Laravel Project
```Back Up on the server```
1. Fetch SSH connections
2. Verify PHP version, composer version && node JS (can be skipped for shared hosting)
3. Verify apache/nginx version
4. Verify mysql connection
5. Create FTP access
6. Local setup Laravel
7. Change .htaccess/php.ini/user.ini configuration in the main folder of laravel
8. Setup PHP configuration from PHP INI editor on the server
9. Setup Git & Github repo
10. Update ```script``` in
```
deployment.yml
```
