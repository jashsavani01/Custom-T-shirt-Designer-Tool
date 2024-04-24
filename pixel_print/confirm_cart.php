<?php include("links.php") ?>

<?php
    $conn = mysqli_connect("localhost", "root", "", "pixel_print");
    session_start();
        if (!isset($_SESSION['id'])) {
            header("Location:SignUp.php");
            exit();
        }else{
            $id = $_SESSION['id'];
        }

        if (!isset($_SESSION['design_id'])){
            header("Location:create-tshirt.php");
        }

        $sql = 'SELECT canvas_front, canvas_back FROM custom_tshirts WHERE design_id = ' . $_SESSION["design_id"];
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $canvasfront = $row['canvas_front'];
                $canvasback = $row['canvas_back'];
            }
        };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
            .text{
                font-family: Lato, sans-serif;
            }
            
            
            .text-color{
                color:rgb(147 142 142);
            }
            .input-box{
                boder:3px solid black !important; 
                outline-style: none;
                border-color: rgb(218, 220, 221); 
                border-width: 1px; 
                border-style: solid; 
            }
            .text-size{
                font-size:15px;
            }
            .tshirt-container {
                position: relative;
                width: 276px;
                height: 319px;
                margin-right:42px;
                background-color:red;
            }   
            .tshirt-container .tshirt_images{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .canvas-box{
                width: 200px; 
                height: 400px; 
                top: 69px;
                left: 71px;
                position: absolute;
                user-select: none;
            }
            .canvas_images {
                position: absolute;
                user-select: none;
                cursor: default;
                width:109px;
                height: 108px;
                left:13px;
            }
        </style>
</head>
<body>

<div class="container">
    <div class="row pe-5 ps-5 mt-5 pt-5">
        <div class="col-lg-8 ">
            <h5>1 Custom T-shirts </h5>
            <div class="d-flex mt-4 pt-1">
                <div class="col-lg-6">
                    <h6 class="mb-3 text text-color">Style</h6>
                    <h6 class="mb-3 text text-color">Print Type</h6>
                    <h6 class="mb-3 text text-color">Material</h6>
                    <h6 class="mb-3 text text-color">Fabric Colour</h6>
                </div>
                <div class="col-lg-6">
                    <h6 class="mb-3 text" id="type"></h6>
                    <h6 class="mb-3 text">Full Color Print (Print and Cut)</h6>
                    <h6 class="mb-3 text" id="material"></h6>
                    <h6 class="mb-3 text" id="color"></h6>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <div id="main-tshirt-box-front" class="tshirt-container">
                    <img src="" class="tshirt_images" id="front">
                        <div class="canvas-box">
                                <img src="<?php echo $canvasfront; ?>" class="canvas_images" >
                        </div>
                </div>
                <div id="main-tshirt-box-back" class="tshirt-container">
                    <img src="" class="tshirt_images" id="back">
                        <div class="canvas-box">
                                <img src="<?php echo $canvasback; ?>" class="canvas_images" >
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 border">
            <div class="col-lg-12 ">
                <button id="confirm_btn" class="btn btn-danger W-100 rounded-2 mt-3 text-white pt-2 pb-2">Add To Cart</button>
                <div class="text-center mt-2">
                    <div class="text-danger" id="errors" style="display:none;">Please specify the size splitup</div>
                    <div class="text-danger" id="error" style="display:none;">ERROR:     Size splitup total must be </div>
                </div>
                <h5 class="mb-3 mt-4">Order Summary</h5>
                <div class="d-flex">
                     <div class="col-lg-8 text">
                         <h6 class="text-color">Per piece cost (Inclusive taxes)</h6>
                         <h6 class="text-color">Quantity</h6>
                         <h6 class="text-color">Total production charges</h6>
                     </div>
                     <div class="col-lg-4 text-end pe-1">
                         <h6 id="price">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="17" height="17" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                               <path d="M7 9l11 0"></path>
                            </svg>
                         <h6>
                         <h6 id="quantity"></h6>
                         <h6 id="totalprice">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="17" height="17" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                               <path d="M7 9l11 0"></path>
                            </svg>
                         </h6>
                     </div>
                </div>
                <div class="w-100 bg-light p-3 mt-3 shadow-sm" style="margin-bottom:29px;">
                    <h7 class="text text-color text-size"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                       <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                       <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                    </svg>Shipping options are now moved to checkout
                    </h7>
                </div>
                <div class="mt-4 d-flex mb-3">
                    <h6 class="text me-2">Size split up <h6><h6> (Total Quantity: 1)</h6>
                </div>
                <div class="d-flex">
                    <div class="d-flex flex-column me-2" style="width: 55px;">
                        <h6 class="fw-bold mb-1" style="color: rgba(100, 100, 100);">XS</h6>
                        <input type="text" placeholder="-" value="" id="input1" class="rounded-1 input-box text-center size-input">
                    </div>
                    <div class="d-flex flex-column me-2" style="width: 55px;">
                        <h6 class="fw-bold mb-1" style="color: rgba(100, 100, 100);">S</h6>
                        <input type="text" placeholder="-" value="" id="input2" class="rounded-1 input-box text-center size-input">
                    </div>
                    <div class="d-flex flex-column me-2" style="width: 55px;">
                        <h6 class="fw-bold mb-1" style="color: rgba(100, 100, 100);">M</h6>
                        <input type="text" placeholder="-" value="" id="input3" class="rounded-1 input-box text-center size-input">
                    </div>
                    <div class="d-flex flex-column me-2" style="width: 55px;">
                        <h6 class="fw-bold mb-1" style="color: rgba(100, 100, 100);">L</h6>
                        <input type="text" placeholder="-" value="" id="input4" class="rounded-1 input-box text-center size-input">
                    </div>
                    <div class="d-flex flex-column me-2" style="width: 55px;">
                        <h6 class="fw-bold mb-1" style="color: rgba(100, 100, 100);">XL</h6>
                        <input type="text" placeholder="-" value="" id="input5" class="rounded-1 input-box text-center size-input">
                    </div>
                    <div class="d-flex flex-column me-2" style="width: 55px;">
                        <h6 class="fw-bold mb-1" style="color: rgba(100, 100, 100);">XXL</h6>
                        <input type="text" placeholder="-" value="" id="input6" class="rounded-1 input-box text-center size-input">
                    </div>
                </div>
                <div class="text-center mt-2">
                    <div class="text-danger" id="errors" style="display:none;">Please specify the size splitup</div>
                    <div class="text-danger" id="error" style="display:none;">ERROR:     Size splitup total must be </div>
                </div>
                <div class="mt-2">
                    <img src="icons/size_chart.png" class="w-100">
                </div>
                <button id="confirm_btn" class="btn btn-danger W-100 rounded-2 mt-3 text-white pt-2 pb-2 mb-3">Add To Cart</button>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
const sizeInputs = document.querySelectorAll(".size-input");

sizeInputs.forEach((input) => {
    input.addEventListener("input", function (event) {
        // Get the current input value
        let inputValue = event.target.value;

        // Use a regular expression to remove non-numeric characters
        inputValue = inputValue.replace(/[^0-9]/g, "");

        // Update the input value with only numeric characters
        event.target.value = inputValue;
    });
});


    var type = "<?php echo htmlspecialchars($_SESSION['type']); ?>";
    var color = "<?php echo htmlspecialchars($_SESSION['color']); ?>";
    var quantity = "<?php echo htmlspecialchars($_SESSION['quantity']); ?>";
    var price = "<?php echo htmlspecialchars($_SESSION['price']); ?>";
    var material = "<?php echo htmlspecialchars($_SESSION['material']); ?>";
    var locations = "<?php echo htmlspecialchars($_SESSION['location']); ?>";
    var totalprice = price * quantity; 

    document.getElementById("type").innerText = type;
    document.getElementById("color").innerText = color;
    document.getElementById("quantity").innerText = quantity;
    document.getElementById("price").append(price);
    document.getElementById("material").innerText = material;
    document.getElementById("totalprice").append(totalprice);

    var front = document.getElementById("front");
    var back = document.getElementById("back");
    var mainfront = document.getElementById("main-tshirt-box-front");
    var mainback = document.getElementById("main-tshirt-box-back");

    mainback.style.backgroundColor = color;
    mainfront.style.backgroundColor = color;

    switch(locations){
    case "Front":
        back.src = "NAI";
        document.getElementById("main-tshirt-box-back").style.display = 'none';
        if(type === "Round Neck"){
            front.src = "https://printo-s3.mobimedia.ai/site/20221222_185822364327_fa23be_Front.png?quality=70&format=webp&w=1536"; 
        }   
        else if(type === 'Round Neck - Dry Fit'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            canvascommon();
        }
        else if(type === 'Round Neck - Polyester'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            canvascommon();
        }
        else if(type === 'Oversized'){ 
            front.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_hanes_tagless_tee_front.png"; 
            Oversized();  mainback.style.display = 'none';
        }
        else if(type === 'Hoodie'){ 
            front.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_front_v2.png"; 
            hoodie();
        }
        else if(type === 'Unisex Collar - Cotton'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_114943334198_5becb3_20170217_170039779490_d01d3c_Collar_neck_front.svg?quality=70&format=webp&w=1536"; 
            canvascommon();
        }
        else if(type === 'V-Neck Half Sleeve'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20211109_221037279685_3b4b95_V_Neck_Half_Slive.svg?quality=70&format=webp&w=1536"; 
            canvascommon();
        }
        else if(type === 'V-Neck Full Sleeve'){
            front.src = "https://printo-s3.mobimedia.ai/site/20211109_221223395362_9191ea_V_Neck_Full_Slive_1.svg?quality=70&format=webp&w=1536"; 
            canvascommon();
        }
        break;

    case "Back":
        front.src = "NAI";
        document.getElementById("main-tshirt-box-front").style.display = 'none';
        if(type === "Round Neck"){
            back.src = "https://printo-s3.mobimedia.ai/site/20221222_191401115689_2f9bef_Back.png?quality=70&format=webp&w=1536"; 
            front.style.display = "none";} 

        else if(type === 'Round Neck - Dry Fit'){
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
            canvascommon();
        }
        else if(type === 'Round Neck - Polyester'){
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
            canvascommon();
        }
        else if(type === 'Oversized'){ 
            back.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_nl_basic_tee_back.png"; 
            Oversized();  mainfront.style.display = 'none';
        }
        else if(type === 'Hoodie'){ 
            back.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_back_v2.png"; 
            hoodie();
        }
        else if(type === 'Unisex Collar - Cotton'){ 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1536";
            canvascommon();
        }
        else if(type === 'V-Neck Half Sleeve'){ 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
            canvascommon();
        }
        break;

    default:
        if(type === "Round Neck"){
            front.src = "https://printo-s3.mobimedia.ai/site/20221222_185822364327_fa23be_Front.png?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20221222_191401115689_2f9bef_Back.png?quality=70&format=webp&w=1536"; 
        }   
        else if(type === 'Round Neck - Dry Fit'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
            canvascommon();
        }
        else if(type === 'Round Neck - Polyester'){
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
            canvascommon();
        }
        else if(type === 'Oversized'){ 
            front.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_hanes_tagless_tee_front.png"; 
            back.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_nl_basic_tee_back.png"; 
            Oversized();
        }
        else if(type === 'Hoodie'){ 
            front.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_front_v2.png"; 
            back.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_back_v2.png"; 
            hoodie();
        }
        else if(type === 'Unisex Collar - Cotton'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20190725_114943334198_5becb3_20170217_170039779490_d01d3c_Collar_neck_front.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1536";
            Oversized();
        }
        else if(type === 'V-Neck Half Sleeve'){ 
            front.src = "https://printo-s3.mobimedia.ai/site/20211109_221037279685_3b4b95_V_Neck_Half_Slive.svg?quality=70&format=webp&w=1536"; 
            back.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
            canvascommon();
        }
        break;                
};

// some canvas width height top left function

    function canvascommon() {
        document.querySelectorAll('.canvas_images').forEach(function(element) {
            element.style.cssText = 'width:114px; height:162px; top:3px; left:7px;';
        });
    }
    function Oversized(){
        document.querySelectorAll('.tshirt-container').forEach(function(element) {
            element.style.cssText = 'width:316px;';
        });
        document.querySelectorAll('.canvas_images').forEach(function(element) {
            element.style.cssText = 'width:130px; height:162px; top:3px; left:24px;';
        });
        
        mainback.style.backgroundColor = color;
        mainfront.style.backgroundColor = color;
    }
    function hoodie() {
        var hoddiecanvas = document.querySelectorAll('.canvas_images');
            hoddiecanvas[0].style.cssText = 'width:114px; height:102px; top:31px; left:10px;';
            hoddiecanvas[1].style.cssText = 'width:124px; height:152px; top:18px; left:5px;';
    }

// Add a click event listener to the "Check quantity" button
var error =  document.getElementById("error");
error.append("<?php echo htmlspecialchars($_SESSION['quantity']); ?>");

var fronturl = document.getElementById("front").src;
var backurls = document.getElementById("back").src;

$(document).ready(function () {
     function confirm_cart() {
        var uid = <?php echo $id; ?>;

        var XS = $("#input1").val();
        var S = $("#input2").val();
        var M = $("#input3").val();
        var L = $("#input4").val();
        var XL = $("#input5").val();
        var XXL = $("#input6").val();
        
            $.ajax({
                type: "POST",
                url: "confirm_cart_data.php",
                data: {
                    userid: uid,
                    designid: "<?php echo htmlspecialchars($_SESSION['design_id']); ?>",
                    type: "<?php echo htmlspecialchars($_SESSION['type']); ?>",
                    color: "<?php echo htmlspecialchars($_SESSION['color']); ?>",
                    locations: "<?php echo htmlspecialchars($_SESSION['location']); ?>",
                    material: "<?php echo htmlspecialchars($_SESSION['material']); ?>",
                    totalprice: totalprice,
                    quantity: "<?php echo htmlspecialchars($_SESSION['quantity']); ?>",
                    fronturls:fronturl,
                    backurls:backurls,xs:XS,s:S,m:M,l:L,xl:XL,xxl:XXL
                },
                success: function (response) {
                    if(response === "successfully insert"){
                        window.location.href = 'Cart.php';
                    }else{
                        window.location.href = 'create-tshirt.php';
                    }
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                }
            });
        
    }
    $("#confirm_btn,#confirm_btn").click(function (){
        var input1 = Number(document.getElementById("input1").value);
        var input2 = Number(document.getElementById("input2").value);
        var input3 = Number(document.getElementById("input3").value);
        var input4 = Number(document.getElementById("input4").value);
        var input5 = Number(document.getElementById("input5").value);
        var input6 = Number(document.getElementById("input6").value);
        var error =  document.getElementById("error");
        var errors =  document.getElementById("errors");
        
        var sum = input1 + input2 + input3 + input4 + input5 + input6;
        if (sum == "<?php echo htmlspecialchars($_SESSION['quantity']); ?>") {
            errors.style.display = "none";
            error.style.display = "none";
            //when loading then sppiner continue...
            $(this).html("<div class='text-center'><div class='spinner-border' role='status'><span class='visually-hidden'>Loading...</span></div></div>").css('cursor', 'not-allowed');
            confirm_cart();
        }else if(sum == 0){
            errors.style.display = "block";
            error.style.display = "none";
        } else {
            errors.style.display = "none";
            error.style.display = "block";
        }
    });
});

</script>
</body>
</html>