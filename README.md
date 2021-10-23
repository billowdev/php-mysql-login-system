# php-mysql-login-system

### Ubuntu
```
git clone https://github.com/lacakp/php-mysql-login-system.git; mv -v ./php-mysql-login-system/* ./ ; rm -r php-mysql-login-system;
```

### CentOS

```
git clone https://github.com/lacakp/php-mysql-login-system.git; 
mv -f ./php-mysql-login-system/* ./ ; 
  rm -f -r php-mysql-login-system;
```


reference origin : https://www.thaicreate.com/community/php-mysql-login-form-check-username-password.html

reference : connect database and query

https://www.codexworld.com/connect-access-remote-mysql-database-cpanel-php/


```
nano dbcon.php
```

## dbcon.php
```
<!-- dbcon.php -->
<?php
$dbServerName = "localhost"; // ip address (hostname -I)
	$dbUsername = "myuser"; // username
	$dbPassword = "root1234"; // db pass
	$dbName = "mydatabase"; // your database to connect

	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName) or die("Connection failed: " . $conn->connect_error);

?>
```
