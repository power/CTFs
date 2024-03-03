<?php

if (isset($_COOKIE["hint"]) && $_COOKIE["hint"] == 1) {
?>

<?php 
$ip = isset($_POST['ip'])?$_POST['ip']:die(); // if the IP is sent, set it as the cmd variable

if(!preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/i',$ip)){ // if the IP is any IP address
    die("Invalid IP!"); // stop
}

echo strlen($ip); // check the length of the IP variable

if(strlen($ip)<7||strlen($ip)>21){ // if it's less then 7 or more then 21 characters
    die("Too long/short!"); // stop
}

$cmd = shell_exec( 'ping  -c 1 ' .$ip ); // run the command
echo  "<pre>{$cmd}</pre>"; // show it to the user
?>

<?php

}

else {
?>
<html>
    <head><b>Three conditions</b></head><br>
    
    <head>1. Send an IP</head><br>
    <head>2. Make sure it isn't just an IP</head><br>
    <head>3. Make sure it's within the character limit</head><br>
    <head>Easy enough, right?</head><br>
</html>
<?php
	setcookie("hint", "1", time() + (85400 * 30), "/");

    $ip = isset($_POST['ip'])?$_POST['ip']:die(); // if the IP is sent, set it as the cmd variable

    if(!preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/i',$ip)){ // if the IP is any IP address
        die("Invalid IP!"); // stop
    }

    echo strlen($ip); // check the length of the IP variable

    if(strlen($ip)<7||strlen($ip)>21){ // if it's less then 7 or more then 21 characters
        die("Too long/short!"); // stop
    }

    $cmd = shell_exec( 'ping  -c 1 ' .$ip ); // run the command
    echo  "<pre>{$cmd}</pre>"; // show it to the user

}
?>