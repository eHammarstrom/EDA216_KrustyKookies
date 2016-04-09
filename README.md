The program is written in HTML, CSS, JavaScript and PHP which demands that you can run your own PHP server on your computer to test the program. We want the users to feel safe and protect the company's production, thus your PHP server must have both the pdo\_mysql.so and mcrypt.so extensions available when starting the server for everything to function.

1. Go into the given directory, "EDA216\_KrustyKookies".
Copy the address of the directory.
Make sure you have configured the php/connect\_data.php properly, it should contain data in the following form
```php
<?php
$\_host = "puccini.cs.lth.se";

$\_username = "databaseUsername";
        
$\_password = "databasePassword";
        
$\_database = "databaseName";

?>
```
Also make sure to have executed the sql script sql/create\_tables.sql on the designated MySQL server using the same credentials as you entered in the php file mentioned above.

2. Open the command prompt.

3. Change the current directory (cd) to the copied directory address.

4. Use the command "php -S 127.0.0.1:8080" to start the server.

5. Launch a web browser of your preference.

6. Enter the address "http://localhost:8080/" and you will be directed to the starting page of the program.
