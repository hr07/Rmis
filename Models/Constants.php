<?php
// define("DBCONSTANTS",array("host"=>"localhost", "dbname"=>"rmis"))
define("DBCONSTANTS", array(
    "host" => "127.0.0.1",
    "username" => "root",
    "password" => "",
    "name" => "rmis",
    "options" => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
));