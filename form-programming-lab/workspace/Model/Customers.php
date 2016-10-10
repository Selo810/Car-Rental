<?php 
    include 'db.php';
    
    class Customer{
        
       
         function getCustomers(){
            global $dbh;
            $query = 'SELECT * FROM Customers';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        function addCustomer($customer_name, $customer_email, $customer_phone){
            global $dbh;
                   $query = 'INSERT INTO Customers(customer_name, email, phone) VALUES';
                   $query .= "('$customer_name', '$customer_email', '$customer_phone')";
                   $dbh->exec($query);
        }
        
        
        
         function getOneCustomer($id){
            global $dbh;
            $query = "SELECT * FROM Customers WHERE customer_id = ".intval($id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
       
        
    }
    
?>