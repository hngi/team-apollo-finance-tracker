### team-apollo-finance-tracker.
Finance tracker app by team apollo for HNGi6 stage 3.

# Contributing

# Using the simple query helper
## Non Selecting Operation(Insert,Delete,Drop ,etc)
...

```php
<?php
//require the database.php file
//create a new object 
//and use the query() method for non selecting sql operation
//for selecting use the select() method 
//remember to call the close() method in either case
//check example below

require 'Database.php';

$db = new Database();
//any other query apart from select
if($db->query("INSERT INTO users (fullname,  email,password,time)
VALUES ('John Peter', 'john@example.com','password',1455667788);")){
	echo "Worked";
}else{
	echo "Not Working";
}
$db->close();
    ...

```
## Selecting example

...

```php
<?php
//require the database.php file
//create a new object 
//and use the query() method for non selecting sql operation
//for selecting use the select() method 
//remember to call the close() method in either case
//check example below

require 'Database.php';

$db = new Database();

//selecting from db
$result = $db->select("SELECT * FROM users WHERE time=1455667788;");
if ($result ==0) {
	echo "No Records";
}else{
	var_dump($result);
	//this return the multi array containing array of each row
}

$db->close();
    ...

```

## Returning Data format

We are using json to returns data to frontend 
check example below

...

```javascript
{
error:0,
successMessage: "User added ...",
action : " register"
} 
//on error
{
error:1,
errorMessage:"the error message",
action :"register"
}

/*
report:
-registered
-loggedIn
-passEmailSent
-accountNotExists
-incorrectLoginDetails
*/
 ...
 ```
