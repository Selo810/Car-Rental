<?php 
    // Begin session
    session_start();
    require 'Model/Cars.php';
    require 'Model/Orders.php';
    require 'Model/Models.php';
    require 'Model/Customers.php';

    // Set action for incoming requests
    if ( isset($_GET['action']) ) $action = $_GET['action']; 
    else if( isset($_POST['action']) ) $action = $_POST['action'];
    include 'View/header.php';
    include 'Model/db.php';
    
    $Car = new Car();
    $Order = new Order();
    $Model = new Model();
    $Customer = new Customer();
    
    $mile_charge = 0.32;
    
    switch ($action) {
        case 'rental_car':
            $cars = $Car->getCars();
            
            if ($cars){
            include 'View/rental_cars.php';
            }else{
                $err = '<div class="tall">';
                $err .= '<h3>Sorry</h3><p>There aren\'t any car available</p>';
                $err .= '</div>';
                echo $err;
            }
            
            break;
            
        case 'add_order':
           global $dbh;
            //Car inputs variables
            $car_id = $_SESSION['car_id'];
            $car_model = $_POST['car_model'];
            $mileage_end = $_POST['end_miles'];
            $total_days = $_POST['total_days'];
            //Customer inputs variables
            $customer_id = $_GET['customer_id'];
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['email'];
            $customer_phone = $_POST['phone'];
            
            
            
            // validate inputs
        	if (empty($customer_name) || empty($customer_email) || empty($customer_phone)) {
        		$error = "Invalid. You did not fill out every field.";
        		include('errors/error.php');
        	} else {
        	    $addCus = $Customer->addCustomer($customer_name, $customer_email, $customer_phone);
            
                $c = $Car->getOneCar($car_id);
                $m = $Model->getOneModel($c['model_id']);
                //$o = $Order->getOrderByCus($customer_id);
                 
                //Calculate price
                $order_total = $total_days * $m['rental_rate'];
                $mileage_start = $c['miles'];
               
                $added = $Order->addOrder($car_id, $total_days, $mileage_start, $mileage_end, $order_total);
                
                //this is just for temprary   
                $o_id = $dbh->query('SELECT MAX(order_id) FROM Orders')->fetch()['MAX(order_id)'];
                
               
                include 'View/feed_back.php';
        	}
            
            break;
            
        //form for searching for an order 
        case 'search_form':
            include 'View/search.php';
            break;
            
        case 'search_action':
            
            $order_id = $_POST['order_id'];
            $mileage_end = $_POST['end_miles'];
            
            $o = $Order->getOneOrder($order_id);
            
            if ($o){
                $c = $Car->getOneCar($o['car_id']);
                $cus = $Customer->getOneCustomer($o['customer_id']);
                $m = $Model->getOneModel($c['model_id']);
                
                include 'View/search.php';
                include 'View/orders.php';  
            
            }else{
                include 'View/search.php';
                $err = '<div class="tall">';
                $err .= '<h3>Sorry</h3><p class="red-text">There aren\'t any order for this Order ID</p>';
                $err .= '</div>';
                echo $err;
            }
            
            break;
        
        //action for return order form  
        case 'return':
            $order_id = $_SESSION['return_order_id'];
            $mileage_end = $_POST['end_miles'];
            
            $o = $Order->getOneOrder($order_id);
            
            
             // validate inputs
        	if (empty($mileage_end)) {
        		$error = "Invalid. End Miles is required.";
        		include('errors/error.php');
        	} else {
        	   $returnCar = $Order->returnCar($order_id, $mileage_end);
                
                $c = $Car->getOneCar($o['car_id']);
                $cus = $Customer->getOneCustomer($o['customer_id']);
                $m = $Model->getOneModel($c['model_id']);
                    
                $added_miles = $mileage_end - $o['Start_miles'];
                $return_total = (($added_miles * $mile_charge) + ($o['total_days'] * $m['rental_rate'] ));
                    
                $Car->returnCar($o['car_id'], $mileage_end);
                include 'View/return_feed_back.php'; 
        	}
                
                
            break;
        
        //end the session when the user is done
        case 'done':
            session_destroy();
            include 'View/main.php';   
            break;
        
        case 'details':
            $c = $Car->getOneCar($_GET['id']);
            $m = $Model->getOneModel($c['model_id']);
            include 'View/rental_form.php';
            break;
        
        default:
            include 'View/main.php';
            break;
        
    }
    
    
    // $car = $car->getCars();
    // $listOrders = $Order->searchOrder(1231231232);
    include 'View/footer.php';
     
    //$Car->addCar(2, 'Chevrolet Spark', 20000, 'http://st.motortrend.com/uploads/sites/10/2016/07/2017-chevrolet-spark-ls-manual-hatchback-angular-front.png');
    
?>