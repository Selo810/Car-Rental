<?php
// Start the session
//session_start();
?>

<?php
// Set session variables
$_SESSION['return_order_id'] = $o['order_id'];

?>
   
<h5><?= $cus['customer_name'] ?></h5>

   
 <div class="row">
        <div class=" col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="<?= $c['image'] ?>">
            </div>
            <div class="card-content">
              <p><?= $c['car_name'] ?></p>
            </div>
            <div class="card-action">
                <p> <b>Order ID:</b> <?= $o['order_id'] ?></p>
                <p> <b>Rental Days:</b> <?= $o['total_days'] ?></p>
                <p> <b>Start Miles:</b> <?= $o['Start_miles'] ?></p>
            </div>
          </div>
        </div>
      </div>
        
 
<div class="row">
    
    <form class="col s12" action="." method="POST">
    <input type="hidden" name="action" value="return" />
    <input type="hidden" name="type" value="" />
    
    
    <h5>Return Form</h5>
        
      
        
    <div class="row">
       <div class="input-field col s3">
            <label for="end_miles">End Miles</label><br />
          <input id="end_miles" type="number" class="validate" name="end_miles">
          
        </div>
        <br />
        <br />
        
        <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
    </div>
      
    </form>
  </div>
 
 
    
    
    

