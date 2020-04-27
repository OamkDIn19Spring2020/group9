<div class="jumbotron">
<h2 style="text-align:center;">Your Campsites</h2>
<button class="btn btn-primary btn-block" id="addBtn" data-toggle="modal" data-target="#addModal">Add Campground</button>
<?php
// print_r($camps);

echo '<div class="cards">';
foreach($camps as $camp){
    echo '<div class="card" style="width: 18rem; display: inline-block;">
    <img src="'.$camp['img'].'" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">'.$camp['name'].'</h5>
      <p class="card-text">'.$camp['description'].' <span>€'.$camp['price'].'</span></p>
      <a href="#" id="editBtn" class="btn btn-warning" data-toggle="modal" data-target="#editModal" 
      data-camp_id='.$camp['camp_id'].' data-name='.$camp['name'].' data-img='.$camp['img'].' data-description='.$camp['description'].' data-price='.$camp['price'].'>
      Edit</a>
      <a href="#" id="deleteBtn" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
      data-camp_id='.$camp['camp_id'].' data-name='.$camp['name'].'>
      Delete</a>
    </div>
  </div>';
}
echo '</div>';
?>
</div>



<!-- addModal -->
<div class="modal fade" id="addModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add a Campground</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <!-- <form class="" action="<?php // echo site_url('mycampgrounds/addCampground'); ?>" method="post"> -->
                <?php echo form_open_multipart('mycampgrounds/addCampground');?>
                  <div class="form-group">
                    <label for="name">Camp Name</label> <br>
                    <input type="text" class="form-control" id="name" name="name" value="" required> <br>

                    <label for="img">Image URL</label> <br>
                    <input type="file" class="form-control" id="img" name="img" value="" required> <br>

                    <label for="description">Description</label> <br>
                    <input type="text" class="form-control" id="description" name="description" value="" required> <br>

                    <label for="price">Price</label> <br>
                    <input type="number" class="form-control" id="price" name="price" value="" required> <br>
                  </div>
                  <input type="submit" class="btn btn-primary" name="" value="Create">
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>


<!-- editModal -->
<div class="modal fade" id="editModal" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit a Campground</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open_multipart('mycampgrounds/updateCampground');?>  
                        <div class="form-group">
                          <input type="hidden" id="edit_camp_id" name="camp_id" value="" >
                          <label for="edit_name">Campground Name</label> <br>
                          <input type="text" class="form-control" id="edit_name" name="name" value=""> <br>

                          <label for="edit_img">Image URL</label> <br>
                          <input type="file" class="form-control" id="edit_img" name="img" value=""> <br>
                          <input name="img_path" id="img_path">

                          <label for="edit_description">Description</label> <br>
                          <input type="text" class="form-control" id="edit_description" name="description" value=""> <br>

                          <label for="edit_price">Price</label> <br>
                          <input type="number" class="form-control" id="edit_price" name="price" value=""> <br>
                        </div>
                        <input type="submit" class="btn btn-primary" name="" value="Update">
                      </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

<!-- deleteModal -->
<div class="modal fade" id="deleteModal" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete a Campground</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form class="" action="<?php echo site_url('mycampgrounds/deleteCampground'); ?>" method="post">
                              <div class="form-group">
                                <input type="hidden" id="delete_camp_id" name="camp_id" value="" >
                                <p>Are you sure you wish to delete the "<span id="delete_name"></span>" campground?</p> 
                              </div>
                              <input type="submit" class="btn btn-danger " name="" value="Delete">
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

<script>

$(document).on( "click", '#addBtn',function(e) {
  console.log("add buttton clicked");
});

    $(document).on( "click", '#editBtn',function(e) {
        console.log("Update modal open");
        var camp_id = $(this).data('camp_id');
        var name = $(this).data('name');
        var img = $(this).data('img');
        var description = $(this).data('description');
        var price = $(this).data('price');
        console.log(img);

        $("#edit_camp_id").val(camp_id);
        $("#edit_name").val(name);
        $("#img_path").val(img);
        $("#edit_description").val(description);
        $("#edit_price").val(price);
    });

    $(document).on("click", "#deleteBtn", function(e){
        console.log("Delete modal open");
        var camp_id = $(this).data('camp_id');
        var name = $(this).data('name');
        console.log('camp_id = '+camp_id);
        console.log('name = '+name);

        $('#delete_camp_id').val(camp_id);
        $('#delete_name').html(name);
    });
</script>