   
<div class="row">
    
  <?php foreach ($cars as $c) : ?>
        <div class="col s12 m6">
          <div class="card" >
            <div class="card-image" >
              <img style="height: 190px;" src="<?= $c['image'] ?>">
              <span class="card-title -text"></span>
            </div>
            <div class="card-content">
              <p><?= $c['car_name'] ?> Or similar <?php
              
              
             switch ($c['model_id']) {
                
                //Standard
                case 1:
                    echo "(<b>Standard</b>)";
                
                    break;
                //Compact
                case 2:
                    echo "(<b>Compact</b>)";
                    
                    break;
                //Luxury    
                case 3;
                    echo "(<b>Luxury</b>)";
                    break;
                    
            }
              ?>
              
              
              </p>
            </div>
            <div class="card-action">
              <a href=".?action=details&id=<?= $c['car_id'] ?>">Select</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
</div>
        
      