<?php

try
{
    $link = new PDO('mysql:host=localhost;dbname=posts', 'root', '',[
       PDO::ATTR_EMULATE_PREPARES => false,
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
     ]);

}
catch (PDOException $e)
{
    print "Error!: " . $e->getMessage() . "<br/>";
    http_response_code(500);
    die();
}
?>
