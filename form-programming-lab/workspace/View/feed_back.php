
<dive class="container">
    
<h5><?= $c['car_name'] ?></h5>

   
 <div class="row">
        <div class=" col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="<?= $c['image'] ?>">
            </div>
            <div class="card-content">
              <p><?= $m['model_name'] ?> (<?= $m['rental_rate'] ?> per day)</p>
            </div>
            <div class="card-action">
              <p><b>Order ID: </b><?= $o_id ?> <span class="red-text">Save Order ID for later</span></p>
              <p><b>Full Name: </b><?= $customer_name ?></p>
              <p><b>Email: </b><?= $customer_email ?></p>
              <p><b>Phone: </b><?= $customer_phone ?></p>
              <p><b>Rental Days: </b><?= $total_days ?></p>
              <p><b>Total: </b>&#36;<?= $order_total ?></p>
              <p class="red-text">Total will change when car is returned</p>
              
              <div><a href=".?action=done"><button class="btn btn-primary blue-grey darken-4">DONE</span></button></a></div>
              
            </div>
          </div>
        </div>
      </div>
      
</dive>

