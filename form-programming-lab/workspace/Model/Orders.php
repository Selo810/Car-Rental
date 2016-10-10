<?php 
    include 'db.php';
    
    class Order{
        
        function getOrder(){
            global $dbh;
            $query = 'SELECT * FROM Cars';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        
        function addOrder($car_id, $total_days, $mileage_start, $mileage_end){
            global $dbh;
                
            $Customer_id = $dbh->query('SELECT MAX(customer_id) FROM Customers')->fetch()['MAX(customer_id)'];
                   
            $query = 'INSERT INTO Orders(customer_id, car_id, total_days, Start_miles, end_miles) VALUES';
            $query .= "($Customer_id, '$car_id', '$total_days', '$mileage_start', '$mileage_end')";
            $dbh->exec($query);
        }
        
      function getOneOrder($id){
            global $dbh;
            $query = "SELECT * FROM Orders WHERE order_id = ".intval($id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
     function getOrderByCus($id){
            global $dbh;
            $query = "SELECT * FROM Orders WHERE customer_id = ".intval($id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
    function getOrderID(){
        global $dbh;
        
        $o_id = $dbh->query('SELECT MAX(order_id) FROM Orders')->fetch()['MAX(order_id)'];
   
    }
    
    
   function returnCar($order_id, $end_miles){
        global $dbh;
        $query = "UPDATE Orders 
                SET end_miles = '$end_miles'
                WHERE order_id = '$order_id'";
        $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
    }
        
        
      
   
    }
    
?>