<?php include("header.php") ?>
<?php include("config.php" )?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cart-Admin</title>
</head>
<body>
<div class="container-fluid" id="main-content">
   <div class="row">
		<div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="card mb-5 des">
                       <div class="card-body">
                          <div class="d-flex justify-content-between align-item-center ">
                              <h4 class="card-title  text-black font fw-bold"> ADD CART </h4>
                          </div>

                       <div class="card-body mt-3">  
                             <div class="table-responsive-md overflow-y-scroll" style="height: 230px;"> 
                                 <table class="table table-bordered " style="text-align: center;">
                                      <thead>
                                          <tr class="text-black" style="background:#770371;">
                                             <td scope="col" style="text-align:center;">id</td>
                                             <td scope="col" style="text-align:center; width: 54px;">Design</td>
                                             <td scope="col" style="text-align:center;">Type</td>
                                             <td scope="col" style="text-align:center;">Color</td>
                                             <td scope="col"  style="text-align:center;" >Material </td>
                                             <td scope="col"  style="text-align:center;" >Location </td>
                                             <td scope="col"  style="text-align:center;" >Quantity </td>
                                             <td scope="col"  style="text-align:center;" >More</td>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            $sql = "select * from add_cart";
                                            $result = mysqli_query($conn , $sql);
                                             if (mysqli_num_rows($result) > 0) {
                                              while ($row = mysqli_fetch_assoc($result)) {                
                                          ?> 
                                          <tr>
                                             <th> <?php echo $row['id']; ?></th>
                                             <th> <?php echo $row['design_id']; ?></th>
                                             <td><?php echo $row['type']; ?></td>
                                             <td><?php echo $row['color']; ?></td>
                                             <td><?php echo $row['material']; ?></td>   
                                             <td><?php echo $row['location']; ?></td> 
                                             <td><?php echo $row['quantity']; ?></td> 
                                             <th>
                                               <button class="btn btn-info rounded-pill btn-sm mt-1">
                                                <a href="moreCart.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-white"> View </a>
                                                </button>
                                             </th>
                                          </tr>
                                        <?php }}  ?>
                                      </tbody>
                                 </table>
                             </div>
                       </div>
                 </div>
            </div>
        </div>
   </div>
</div>     
</body>
</html>