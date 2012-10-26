<?php

$usernamesalt = '';
$usernamehash = '';
$passwordsalt = '';
$passwordhash = '';

$userid = $_GET["UserID"];
$password = $_GET["Password"];

$testusernamehash = hash('sha512', $usernamesalt.$userid);
$testpasswordhash = hash('sha512', $passwordsalt.$password);

if (($testusernamehash == $usernamehash) && ($testpasswordhash == $passwordhash))
{
    echo "AUTHORIZED";
}
else
{
    echo "UN-AUTHORIZED";
}

?>
