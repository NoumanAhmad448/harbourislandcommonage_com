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

## Local Setup (Development)
1. install xampp (Required PHP version -> 8.1) [Download Link](https://downloadsapachefriends.global.ssl.fastly.net/7.4.30/xampp-windows-x64-7.4.30-1-VC15-installer.exe?from_af=true)
2. download node 16.18.0
2. Go to .env file and change the DB connection
3. Create a database
```
thesunr8_harbourislandcommonage_com
```
4. You need to follow of either mentioned path
    1. One
        1. run
           1. usmansaleem234_lyskills_new.sql
           2.  <b>user_ann_models.sql</b>
        file locally. These files are avaiable in the source code, path /
        3. Add primary key manually in every table or create a alter query and try changing table name and primary key column
    2. Second
        1. php artisan migrate
        2. Get dump from someone else and upload
5. composer install
6. npm install
7. php artisan serve --port=8081

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
mysql -h 127.0.0.1 -P 3306 -u usmansaleem234_lyskills_root5 -p
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


### SSH access
Read the public key from ```git bash```
```
cat ~/.ssh/id_rsa.pub
```
Create a ```config``` file in ```.ssh``` folder and add the following lines
```
Host 162.241.216.239
   HostName 162.241.216.239
   PreferredAuthentications publickey
   IdentityFile ~/.ssh/id_rsa.pub
```
ssh access command
```
ssh thesunr8@162.241.216.239
```

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


## Plan
1. create a property table on the home page
[title,description,location, size,city,country]
1. create a user
2. check for user details
2. add property details
3. property images
4. property extra files
5. add Google captcha
6. send email to the user provided address

3. list the property data on the home page
4. create an admin panel
5. let admin login
6. Admin can approve/reject the land
7. on approve send an email with the password
8. on reject allow the agent to add any comment and let the commonager to login and update the information
9. commonager can login & check the land information
10. Update his profile information
11. Create Blog information from Admin Panel