<?php include("header.php") ?>
<?php include("config.php") ?>
<style>
	input[type="checkbox"] {
    transform: scale(1.4);
    accent-color:#fead19;
  }
</style>

<div class="container-fluid" id="main-content">
   <div class="row">

		<div class="col-lg-10 ms-auto pt-4 overflow-hidden" style="padding:8px 50px;">
            <div class="ps-3 mt-0 pb-3 border-bottom mb-3">
                <h5 class="fw-bold font text-start fs-4">ADD Image</h5>
            </div>
            <a href="room.php" class="text-decoration-none text-danger border rounded-pill p-1 ps-2 pe-2 "><i class="fa-solid fa-arrow-left fs-5 me-2"></i> go to room page </a>
                <form id="uploadForm" class="mt-4" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6 p-0 col-lg-4 mb-2 me-4">
                       <label class="form-label font">Add Images ...</label>
                       <input type="file" class="form-control shadow-none" name="images[]" id="fileInput" multiple></input>
                       <button class="btn btn-sm ps-4 pe-4 pt-2 pb-2 btn-warning mt-3 shadow-none" id="uploadButton" name="submit">Submit</button>
                    </div>
                </form>
              
              <div class="row">
                  <?php 
                  $sql = "SELECT * FROM images";
                  $result = mysqli_query($conn, $sql) or die("<h2> image not found");
                  if (mysqli_num_rows($result)) {
                      while ($row = mysqli_fetch_assoc($result)){
                  ?> 		
                  <div class="col-lg-3 mt-4 me-5 mb-2 border-start ps-4">
                  	  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                      <img src="../object_img/<?php echo $row['image']?>" width="270" height="162" class="p-2">
                      <a href="delete_images.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-danger">delete</a>
                  </div>
                  <?php }} ?>
              </div>
        </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $("#uploadButton").click(function() {
        var formData = new FormData($("#uploadForm")[0]);
        
        $.ajax({
            url: "upload_images.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
               
            }
        });
    });
});


</script>