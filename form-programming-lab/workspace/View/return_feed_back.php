
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
              <p><b>Order ID: </b><?= $o['order_id'] ?></p>
              <p><b>Full Name: </b><?= $cus['customer_name'] ?></p>
              <p><b>Email: </b><?= $cus['email'] ?></p>
              <p><b>Phone: </b><?= $cus['phone'] ?></p>
              <p><b>Rental Days: </b><?= $o['total_days'] ?></p>
              <p><b>Total: </b>&#36;<?= $return_total ?></p>
              
            <div><a href=".?action=done"><button class="btn btn-primary blue-grey darken-4">DONE</span></button></a></div>
              
              
            </div>
          </div>
        </div>
      </div>
      
</dive>

