<!--<p>
  The base url is <?php echo base_url(); ?>
</p>

<p>
  The site url is <?php echo site_url(); ?>
</p>
-->

<?php

$groundname_clean = urldecode($groundname);
$query = $this->db->query("SELECT * from campground WHERE name = '$groundname_clean';");

$row = $query->row();

if (isset($row)){
$user = $row->user_name;
$name = $row->name;
$img = $row->img;
$descr = $row->description;
$price = $row->price;
$id = $row->camp_id;
}

echo "<h2>" . $name . "</h2>";
echo "<p>Price " . $price . " per night</p>";
echo "<p>Owner: " . $user . "</p>";
echo '<p><img src="' . $img . '" class="card-img-top"/></p>';
echo '</br><p>' . $descr . "</p>" ;

echo '<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">Make reservation</button>';

echo "<p><b>Comments</b></p>";
$comms = $this->db->query("SELECT * from comment WHERE camp_id = '$id'");
if (empty($comms->result())) {
    echo "Sorry, no comments here yet!";
}
else {
    echo '<table style="width:85%">';
foreach ($comms->result() as $row) {
    echo '<tr><td style="padding:15px"><b>' . $row->user_name . "</b></td><td style='text-align:right'>Comment #". $row->comment_id . "</td></tr>";
    echo '<tr style="border-bottom:1px solid black"><td style="padding:15px" colspan="2">' . $row->content . "</td></tr>";
}
}
echo "</table>";

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
  echo '<div style="padding-top:35px;width:80%">
  <form id="commentinput" action="' . site_url('Mycomments/addComment') . '" method="post">
  <label for="content">Add comment:</label><br>
  <input type="text" id="content" name="content" style="width:100%;margin-bottom:25px"><br>
  <input type="hidden" id="camp_id" name="camp_id" value="' . $id . '">
  <input type="hidden" id="camp_name" name="camp_name" value="' . $name . '">
  <input type="submit" value="Submit" style="float:right">
  </form>
  </div>';
}
?>

<!-- Add reservation modal -->
<div class="modal fade" id="addModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Pick Dates and Confirm Reservation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="reservationForm" method="post" action="<?php echo site_url('camp/reserve_camp') ?>">
                  <div class="form-group">
                    <label for="from">From:</label> <br>
                    <input type="text" class="form-control"  id="from" name="from"> <br>

                    <label for="to">To:</label> <br>
                    <input type="text" class="form-control" id="to" name="to"> <br>
                  </div>
                  <div class="form-group"> 
                    <label for="price">Total Price:</label> <br>
                    <input type="text" id="price" name="price" value=""> <br>
                    <input hidden type="text" name="camp_id" value="<? echo $id?>">
                    <input hidden type="text" name="user_name" value="<? echo $_SESSION['username']?>">

                  </div>
                  <input type="submit" id="submitReservation" class="btn btn-primary btn-block" name="" value="Reserve">
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>



<script>

// Date Picker handler
$('#submitReservation').hide();
var start, end, date_diff;
var price = parseInt(<?php echo $price ?>);
var dateFormat = "yy-mm-dd",
      from = $( "#from" )
        .datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          minDate: "0"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
          setPrice();
        }),
      to = $( "#to" ).datepicker({
        dateFormat: "yy-mm-dd",
        defaultDate: "+1w",
        changeMonth: true,
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
        setPrice();
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }

    function setPrice(){
      start = new Date(from.val());
      end = new Date(to.val());
      date_diff = (end.getTime() - start.getTime()) / (1000 * 3600 * 24);
      date_diff = parseInt(date_diff);
      
      if(isNaN(date_diff)){
        $('#price').val("You must pick FROM and TO dates");
      } else{
        $('#price').val(price * date_diff);
        $('#submitReservation').show();
      }
      
    }




</script>
