<?php 
    include 'db.php';
    
    class Model{
        
        function getModels(){
            global $dbh;
            $query = 'SELECT * FROM Models';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        
        function addModel($model_name, $model_image, $rental_rate){
            global $dbh;
                   $query = 'INSERT INTO Models(model_name, image, rental_rate) VALUES';
                   $query .= "('$model_name', '$model_image', '$rental_rate')";
                   $dbh->exec($query);
        }
        
        
        function getOneModel($id){
            global $dbh;
            $query = "SELECT * FROM Models WHERE model_id = ".intval($id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
    
    }
    
?>