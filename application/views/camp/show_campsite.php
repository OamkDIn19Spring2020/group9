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
$img = base_url() . $row->img;
$descr = $row->description;
$price = $row->price;
$id = $row->camp_id;
echo $name;
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
    echo "<table>" . "<tr><th span=2>User</th></tr>";
foreach ($comms->result() as $row) {
    echo "<tr><td>" . $row->user_name . "</td>";
    echo "<td>" . $row->content . "</td></tr>";
}
echo "</table>";
}
?>
