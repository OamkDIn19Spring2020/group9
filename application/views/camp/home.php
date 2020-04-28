<!-- <div style="text-align:center"> <img src="<?php echo base_url('Images') . '/Image' . rand(1, 33); ?>.jpg" id="image"></div> -->

<div class="jumbotron">
<h4 style="text-align:center">Welcome to CampIn!</h4>
<p style="text-align:center">Here are some featured Campsites</p>
<?php 
$base = site_url('camp/show_campsite');

$count = count($campsites) - 1;
$campsite1 = $campsites[rand(0, $count)];
$campsite2 = $campsites[rand(0, $count)];
$campsite3 = $campsites[rand(0, $count)];


echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner car-size">
          <div class="carousel-item active">
            <a href="'.$base.'/'.$campsite1['name'].'">
              <img class="d-block w-100" src="'.$campsite1['img'].'" alt="First slide">
            </a>
          </div>
          <div class="carousel-item">
            <a href="'.$base.'/'.$campsite2['name'].'">
              <img class="d-block w-100" src="'.$campsite2['img'].'" alt="First slide">
            </a>
          </div>
          <div class="carousel-item">
            <a href="'.$base.'/'.$campsite3['name'].'">
              <img class="d-block w-100" src="'.$campsite3['img'].'" alt="First slide">
            </a>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>';
?>
<hr>
<a href="<?php echo site_url('camp/show_campgrounds') ?>"class="btn btn-primary btn-block"> Browse our entire catalog</a>


</div>


<!--<p>
  The base url is <?php echo base_url(); ?>
</p>

<p>
  The site url is <?php echo site_url(); ?>
</p>
-->
