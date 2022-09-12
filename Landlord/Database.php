<?php
define("hostname","localhost");
define("dbname","rmis");
define("username", "root");
define("password", "");
define("options", array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

try{
$conn= new PDO("mysql:host=".hostname.";dbname=".dbname, username, password, options);
} catch(PDOException $err){
    echo $err->getMessage();
}