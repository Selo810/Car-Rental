
<?php
// Set session variables
$_SESSION['car_id'] = $_GET['id'];

?>
<h5><?= $c['car_name'] ?></h5>

   
 <div class="row">
        <div class=" col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="<?= $c['image'] ?>">
            </div>
            <div class="card-content">
              <p><?= $m['model_name'] ?></p>
            </div>
            <div class="card-action">
              <p></p><?= $m['rental_rate'] ?> per day</p>
            </div>
          </div>
        </div>
      </div>
        
      
<div class="row">
    
    <form class="col s12" action="." method="POST">
    <input type="hidden" name="action" value="add_order" />
    <input type="hidden" name="type" value="" />
    
    <fieldset>
        <h5>Info</h5>
        
        
     <div class="row">
        <div class="input-field col s12">
            <label for="customer_name">Full Name</label><br />
          <input id="customer_name" type="text" class="validate" name="customer_name">
          
        </div>
      </div>
   
      <div class="row">
       <div class="input-field col s6">
           <label for="customer_email">Email</label><br />
          <input id="customer_email" type="email" class="validate" name="email">
          
        </div>
        
        <div class="input-field col s6">
             <label for="phone">Phone</label><br />
          <input id="customer_phone" type="text" class="validate" name="phone">
         
        </div>
        </div>
        
         <div class="row">
       <div class="input-field col s6">
            <label for="email">Total Rental Days</label><br />
          <input id="total_days" type="number" class="validate" name="total_days">
          
        </div>
        </div>
      </fieldset>
      <br />
      
    
       <button type="submit" class="btn btn-primary blue-grey darken-4">Submit</button>
    </form>
  </div>
 
 
    
    
    