<div class="jumbotron">
<h2 style="text-align:center;">Catalog</h2>

<?php
$query = $this->db->query("SELECT * from campground;");

$base = site_url('camp/show_campsite');
  $name = $row->name;
  $price = $row->price;
  $image = $row->img;

  echo '<a href="'.$base.'/'.$name.'" class="card" style="width: 18rem; display: inline-block;">
          <img src="'.$image.'" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">'.$name.'</h5>
            <p class="card-text">'.$descr.' <span>€'.$price.'</span></p>
          </div>
        </a>';
}
echo '</div>';
?>
</div>
