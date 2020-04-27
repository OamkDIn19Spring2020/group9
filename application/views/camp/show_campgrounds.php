<h2>Campgrounds Page</h2>

<!--<p>
  The base url is <?php echo base_url(); ?>
</p>

<p>
  The site url is <?php echo site_url(); ?>
</p>
-->


<?php
$query = $this->db->query("SELECT * from campground;");

$base = site_url('camp/show_campsite');
echo "<table>";
echo "<th style='width:150px;text-align:center'></th><th style='padding:15px'>Owner</th> <th>Campsite</th> <th>Description</th> <th>Price / night</th>";
foreach ($query->result() as $row)
{
  $user = $row->user_name;
  $name = $row->name;
  $descr = $row->description;
  $price = $row->price;
  $img = $row->img;
  echo (
    "<tr>" .
    '<td><img style="max-width:100%;height:auto;padding:15px" src="' . $img . '"></td>' .
    "<td style='padding:15px'>" . $user . "</td>" .
    "<td><a href=\"" . $base . "/" . $name . "\">" . $name . "</a></td>" .
    "<td>" . $descr . "</td>" .
    "<td>" . $price . "</td>" .
    "</tr>"

  );
}

echo "</table>";
?>
