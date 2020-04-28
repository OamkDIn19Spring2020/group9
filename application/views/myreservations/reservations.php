<h2>My reservations page</h2>

<?php 
//print_r($reservations);

foreach($reservations as $reservation){
  $id = $reservation["camp_id"];
  $query = $this->db->query('SELECT name from campground WHERE camp_id = ' . $id .';');
  $row = $query->row();
  $name = $row->name;
  echo '<div class="card">
            <div class="card-body" style="display: inline-block; justify-content: space-between;">
            Reservation ID: '.$reservation["reservation_id"].' at campsite '.$name.'. Reserved '.$reservation["start"].' to '.$reservation["end"].'. Total price: '.$reservation["price"].'. 
            </div>
          </div>';
}

?>