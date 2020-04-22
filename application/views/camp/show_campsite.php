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
