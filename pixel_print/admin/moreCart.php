<?php include("header.php") ?>
<?php include("config.php" )?>
<?php
    $id = $_GET['id'];
    $sql = "select * from add_cart where id = {$id}";
    $result = mysqli_query($conn , $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {     
                $type = $row['type'];
                $color = $row['color'];
                $material = $row['material'];
                $location = $row['location'];
                $price = $row['total_price'];
                $quantity = $row['quantity'];
                $front = $row['front'];
                $back = $row['back'];
                $design_id = $row['design_id'];
            }
        };
    $sql2 = "select * from custom_tshirts where design_id = {$design_id}";
    $result2 = mysqli_query($conn , $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {     
            $image = $row2['image'];
            $canvas_front = $row2['canvas_front'];
            $canvas_back = $row2['canvas_back'];
        }
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Data-Admin</title>
    <style>
        #front{
            display:block;
        }
        .main-img{
            box-shadow:4px 4px 9px rgba(0, 0, 0, 0.1), -4px -4px 9px rgba(0, 0, 0, 0.1);
        }
        .download{
            text-decoration:none;
            color:white;
            border-radius:12px;
            padding:4px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid bg-light" id="main-content">
    <div class="row">
		<div class="col-lg-10 ms-auto p-4 overflow-hidden d-flex">
            <div class="col-lg-6">
                <div class="p-4">
                    <img src="<?php echo $front ?>" width="533"  id="front">
                    <img src="<?php echo $back ?>" width="533"  style="display:none;" id="back">
                </div>
                <div style="display:none;" id="locationbtn" class="d-flex justify-content-center">
                    <button id="showFront" class="btn btn-info ps-5  pe-5  me-3 frontbtn">front</button>
                    <button id="showBack" class="btn btn-info ps-5  pe-5  ">back</button>
                </div>
            </div>
            <div class="col-lg-6">
            <h5 class="mb-3">Custom Image</h5>
                <div class="border mb-4 p-2 main-img">
                    <div class="d-flex">
                        <div class="col-lg-6 p-2 me-4 ms-4 ">
                            <div class="mb-2" style="height:272px;">
                                <img src="<?php echo $canvas_front ?>">
                            </div>
                            <button class="btn btn-info ps-5  pe-5  me-3">front Canvas</button>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="mb-2" style="height:272px;">
                                <img src="<?php echo $canvas_back ?>">
                            </div>
                            <button class="btn btn-info ps-5  pe-5  ">back Canvas</button>
                        </div>
                    </div>
                </div>
                <h5 class="mb-3">Download Images</h5>
                <div class="p-2 d-flex border main-img" style="overflow:scroll;">
                <?php
                   
                   $fileNamesArray = array_map('trim', explode(',', $image));
                   $uploadDirectory = "../uploads/";
                   
                   foreach ($fileNamesArray as $fileName) {
                       $filePath = $uploadDirectory . $fileName;
                   
                       if (file_exists($filePath)) {
                           // Open a div container for the image and download link
                           echo '<div class="d-flex flex-column p-4">';
                           
                           // Display the image
                           echo '<img src="' . $filePath . '" alt="' . $fileName . '" width="122" height="122" class="">'; // Corrected 'heigth' to 'height'
                           
                           // Generate a download link for the image
                           echo '<a class="download bg-warning mt-2" href="' . $filePath . '" download="' . $fileName . '">Download</a><br>';
                           
                           // Close the div container
                           echo '</div>';
                       } else {
                           echo "File $fileName does not exist in the object_img folder<br>";
                       }
                   }
                   ?>
                   

                </div>
            </div>
        </div>
    </div>
</div>


<script>

var front = document.getElementById("front");
var back = document.getElementById("back");

switch(location){
    case "Front":
        if(type === "Round Neck"){
            front.src = "https://printo-s3.mobimedia.ai/site/20221222_185822364327_fa23be_Front.png?quality=70&format=webp&w=1536"; 
            back.style.display = "none";       
        }   
        else if(type === 'Round Neck - Dry Fit'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            back.style.display = "none"; 
            front.style.width = "273";     
        }
        else if(type === 'Round Neck - Polyester'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            back.style.display = "none";        
        }
        else if(type === 'Oversized'){ 
            front.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_hanes_tagless_tee_front.png"; 
            back.style.display = "none";        
        }
        else if(type === 'Hoodie'){ 
            front.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_front_v2.png"; 
            back.style.display = "none";        
        }
        else if(type === 'Unisex Collar - Cotton'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_114943334198_5becb3_20170217_170039779490_d01d3c_Collar_neck_front.svg?quality=70&format=webp&w=1536"; 
            back.style.display = "none";        
        }
        else if(type === 'V-Neck Half Sleeve'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20211109_221037279685_3b4b95_V_Neck_Half_Slive.svg?quality=70&format=webp&w=1536"; 
            back.style.display = "none";        
        }
        break;

        case "Back":
        if(type === "Round Neck"){
            back.src = "https://printo-s3.mobimedia.ai/site/20221222_191401115689_2f9bef_Back.png?quality=70&format=webp&w=1536"; 
            front.style.display = "none";} 

        else if(type === 'Round Neck - Dry Fit'){
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
            front.style.display = "none";
            back.style.width = "273";
        }
        else if(type === 'Round Neck - Polyester'){
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
            front.style.display = "none";
        }
        else if(type === 'Oversized'){ 
            back.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_nl_basic_tee_back.png"; 
            front.style.display = "none";
        }
        else if(type === 'Hoodie'){ 
            back.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_back_v2.png"; 
            front.style.display = "none";
        }
        else if(type === 'Unisex Collar - Cotton'){ 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1536";
            front.style.display = "none";
        }
        else if(type === 'V-Neck Half Sleeve'){ 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
            front.style.display = "none";
        }
        break;

        default:


        document.getElementById('locationbtn').style.display = "block";

        document.getElementById('showFront').addEventListener("click", function() {
            front.style.display = 'block';
            back.style.display = 'none';
        });

        document.getElementById('showBack').addEventListener("click", function() {
            front.style.display = 'none';
            back.style.display = 'block';
        });

        
        if(type === "Round Neck"){
            front.src = "https://printo-s3.mobimedia.ai/site/20221222_185822364327_fa23be_Front.png?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20221222_191401115689_2f9bef_Back.png?quality=70&format=webp&w=1536"; 
        }   
        else if(type === 'Round Neck - Dry Fit'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
            front.style.width = "273";
            back.style.width = "280";
            back.style.height = "306";
        }
        else if(type === 'Round Neck - Polyester'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
        }
        else if(type === 'Oversized'){ 
            front.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_hanes_tagless_tee_front.png"; 
            back.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_nl_basic_tee_back.png"; 
        }
        else if(type === 'Hoodie'){ 
            front.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_front_v2.png"; 
            back.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_back_v2.png"; 
        }
        else if(type === 'Unisex Collar - Cotton'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_114943334198_5becb3_20170217_170039779490_d01d3c_Collar_neck_front.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1536";
        }
        else if(type === 'V-Neck Half Sleeve'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20211109_221037279685_3b4b95_V_Neck_Half_Slive.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
        }
        break;                
};

</script>

</body>
</html>