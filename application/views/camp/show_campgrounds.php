<h2>Campgrounds Page</h2>

<p>
  The base url is <?php echo base_url(); ?>
</p>

<p>
  The site url is <?php echo site_url(); ?>
</p>


<?php
$query = $this->db->query("SELECT * from campground;");

echo "<table>";
echo "<th>Owner</th> <th>Campsite</th> <th>Description</th> <th>Price / night</th>";
foreach ($query->result() as $row)
{
  $user = $row->user_name;
  $name = $row->name;
  $descr = $row->description;
  $price = $row->price;
  echo (
    "<tr>" .
    "<td>" . $user . "</td>" .
    "<td>" . $name . "</td>" .
    "<td>" . $descr . "</td>" .
    "<td>" . $price . "</td>" .
    "</tr>"

  );
}

echo "</table>";
?>
