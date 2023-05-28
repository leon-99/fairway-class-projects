<?php

$password = "apple";
$hash = password_hash($password, PASSWORD_DEFAULT);
// PASSWORD_DEFAULT replaces with the current strongest algorithm.

$login = "Apple";


// using the password_verify function to check the password match.
if(password_verify($login, $hash)) {
    echo "Correct password";
} else {
    echo "Incorrect password";
}
