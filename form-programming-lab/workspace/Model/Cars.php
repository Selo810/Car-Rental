<?php 
    include 'db.php';
    
    class Car{
        
        function getCars(){
            global $dbh;
            $query = 'SELECT * FROM Cars ORDER BY model_id';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        
        function addCar($model_id, $car_name, $miles, $car_image){
            global $dbh;
                   $query = 'INSERT INTO Cars(model_id, car_name, miles, image) VALUES';
                   $query .= "('$model_id', '$car_name', '$miles', '$car_image')";
                   $dbh->exec($query);
        }
        
        
        
         function getOneCar($id){
            global $dbh;
            $query = "SELECT * FROM Cars WHERE car_id = ".intval($id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
        function returnCar($car_id, $end_miles){
            global $dbh;
            $query = "UPDATE Cars 
                    SET miles = '$end_miles' 
                    WHERE car_id = '$car_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
       
        
    }
    
?>