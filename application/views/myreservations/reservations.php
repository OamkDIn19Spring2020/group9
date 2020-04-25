<h2>My reservations page</h2>

<?php 
print_r($reservations);
foreach($reservations as $reservation){
    echo '<div class="card">
            <div class="card-body" style="display: inline-block; justify-content: space-between;">
            '.$reservation["reservation_id"].' '.$reservation["camp_id"].' '.$reservation["start"].' '.$reservation["end"].' '.$reservation["price"].' 
            </div>
          </div>';
}

?>