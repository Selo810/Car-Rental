<?php   
    $username = 'root';
    $pword = '';
    $server = 'localhost';


    
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=car_rental', $username, $pword);
    } catch (PDOException $e) {
        print_r($e);
    }




?>