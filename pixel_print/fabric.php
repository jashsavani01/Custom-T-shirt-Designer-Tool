<script src="./fabric.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>            
    //get data and tshirt change accoding to demand ============
    var design_id = <?php echo json_encode($_POST['design_id']); ?>;
    var type = <?php echo json_encode($_POST['type']); ?>;
    var color = <?php echo json_encode($_POST['color']); ?>;
    var locations = <?php echo json_encode($_POST['location']); ?>;
    var quantity = <?php echo json_encode($_POST['quantity']); ?>;
    var price = <?php echo json_encode($_POST['price']); ?>;

    var mainTshirtBox_front = document.getElementById('main-tshirt-box-front');
    var mainTshirtBox_back = document.getElementById('main-tshirt-box-back');
    var tshirtImage = document.getElementById("tshirt-image-front");
    var canvaBox = document.getElementById("canva-front-box");
    const container = document.getElementsByClassName("tshirt-container"); 

    
    if(color === "Navy Blue"){
        mainTshirtBox_front.style.backgroundColor = "#341f97";
        mainTshirtBox_back.style.backgroundColor = "#341f97";
    }else if(color === "Mustard"){
        mainTshirtBox_front.style.backgroundColor = "rgb(255 202 9)";
        mainTshirtBox_back.style.backgroundColor = "rgb(255 202 9)";
    }else{
        mainTshirtBox_front.style.backgroundColor = color;
        mainTshirtBox_back.style.backgroundColor = color;
    }

   
// Function to toggle the visibility of the t-shirt sections
function toggleTshirtView(location,type) {
           var type = <?php echo json_encode($_POST['type']); ?>;
            const container = document.getElementsByClassName("tshirt-container"); 
            const mainTshirtBoxFront = document.getElementById("main-tshirt-box-front");
            const mainTshirtBoxBack = document.getElementById("main-tshirt-box-back");
            const tshirtImageFront = document.getElementById("tshirt-image-front");
            const tshirtImageBack = document.getElementById("tshirt-image-back");
            const canvasFront = document.getElementById("canva-front-box");
            const canvasBack = document.getElementById("canva-back-box");
            const frontimgaddbtn = document.getElementById("frontimgbtn");
            const backimgaddbtn = document.getElementById("backimgbtn");
            const frontTShirt = document.getElementById("frontTShirt");
            const backTShirt = document.getElementById("backTShirt");
            const locbtn = document.getElementById("locationbtn");

    switch (location) {
        case "Front":
                mainTshirtBoxFront.classList.remove("hidden");
                mainTshirtBoxBack.classList.add("hidden");
                tshirtImageFront.classList.remove("hidden");
                tshirtImageBack.classList.add("hidden");
                canvasFront.classList.remove("hidden");
                canvasBack.classList.add("hidden");
                
                if(type === 'Round Neck'){
                    mainTshirtBoxFront.style.width = "540px";
                    canvasFront.style.border = "none";
                    canvasFront.classList.add("round-neck-front");
                    canvasFront.width = 165;canvasFront.height = 177;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20221222_185822364327_fa23be_Front.png?quality=70&format=webp&w=1536"; }
                else if(type === 'Round Neck - Dry Fit'){
                    canvasFront.classList.add("common-front");
                    canvasFront.width = 207;canvasFront.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; }
                else if(type === 'Round Neck - Polyester'){ 
                    canvasFront.classList.add("common-front");
                    canvasFront.width = 207;canvasFront.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; }
                else if(type === 'Oversized'){
                    mainTshirtBoxFront.style.width = "540px";
                    canvasFront.classList.add("Oversized");
                    canvasFront.width = 190;canvasFront.height = 256;
                    tshirtImageFront.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_hanes_tagless_tee_front.png"; }
                else if(type === 'Hoodie'){ 
                    mainTshirtBoxFront.style.width = "540px";
                    canvasFront.classList.add("Hoodie_front");
                    canvasFront.width = 200;canvasFront.height = 170;
                    tshirtImageFront.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_front_v2.png"; }
                else if(type === 'Unisex Collar - Cotton'){ 
                    canvasFront.classList.add("common-front");
                    canvasFront.width = 207;canvasFront.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20190725_114943334198_5becb3_20170217_170039779490_d01d3c_Collar_neck_front.svg?quality=70&format=webp&w=1536"; }
                else if(type === 'V-Neck Half Sleeve'){ 
                    canvasFront.classList.add("common-front");
                    canvasFront.width = 207;canvasFront.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20211109_221037279685_3b4b95_V_Neck_Half_Slive.svg?quality=70&format=webp&w=1536"; }
                else if(type === 'V-Neck Full Sleeve'){
                    canvasFront.classList.add("common-front");
                    canvasFront.width = 207;canvasFront.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20211109_221223395362_9191ea_V_Neck_Full_Slive_1.svg?quality=70&format=webp&w=1536"; }
            break;
        case "Back":

                mainTshirtBoxFront.style.display = "none";
                mainTshirtBoxBack.style.display = "block";
                tshirtImageFront.style.display = "none";
                tshirtImageBack.style.display = "block";
                canvasFront.style.display = "none";
                canvasBack.style.display = "block";

                if(type === 'Round Neck'){
                    mainTshirtBoxBack.style.width = "540px";
                    canvasBack.style.border = "none";
                    canvasBack.width = 165; canvasBack.height = 177;
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20221222_191401115689_2f9bef_Back.png?quality=70&format=webp&w=1536"; 
                    canvasBack.classList.add("round-neck-front"); }
                else if(type === 'Round Neck - Dry Fit'){ 
                    mainTshirtBoxBack.style.width = "450px";
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
                    canvasBack.classList.add("dry-back"); }
                else if(type === 'Round Neck - Polyester'){ 
                    mainTshirtBoxBack.style.width = "450px";
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
                    canvasBack.classList.add("dry-back"); }
                else if(type === 'Oversized'){ 
                    mainTshirtBoxBack.style.width = "540px";
                    canvasBack.width = 210; canvasBack.height = 275;
                    tshirtImageBack.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_nl_basic_tee_back.png"; 
                    canvasBack.classList.add("Oversized_back"); }
                else if(type === 'Hoodie'){ 
                    mainTshirtBoxBack.style.width = "540px";
                    canvasBack.width = 212; canvasBack.height = 260;
                    tshirtImageBack.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_back_v2.png"; 
                    canvasBack.classList.add("Hoodie_back"); }
                else if(type === 'Unisex Collar - Cotton'){ 
                    mainTshirtBoxBack.style.width = "450px";
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1536"; 
                    canvasBack.classList.add("dry-back"); }
                else if(type === 'V-Neck Half Sleeve'){ 
                    mainTshirtBoxBack.style.width = "450px";
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
                    canvasBack.classList.add("dry-back"); }
            break;
        
            
        default:

        frontTShirt.classList.add("frontTShirt");
        backTShirt.classList.add("backTShirt"); 
        locbtn.style.display = "block";

        document.getElementById('showFront').addEventListener("click", function() {
            tshirtImageFront.style.display = 'block';
            tshirtImageBack.style.display = 'none';
            mainTshirtBoxBack.style.display = 'none';
            mainTshirtBoxFront.style.display = 'block';
        });

        document.getElementById('showBack').addEventListener("click", function() {
            tshirtImageFront.style.display = 'none';
             mainTshirtBoxFront.style.display = 'none';
            tshirtImageBack.style.display = 'block';
            mainTshirtBoxBack.style.display = 'block';
            backTShirt.classList.remove("backTShirt"); 
        });

        const frontButton = document.getElementById("showFront");
        const backButton = document.getElementById("showBack");

         frontButton.addEventListener("click", () => {
             frontButton.classList.add("active");
             backButton.classList.remove("active");
         });
         
         backButton.addEventListener("click", () => {
             backButton.classList.add("active");
             frontButton.classList.remove("active");
             frontButton.classList.remove("frontbtn");
         });





        if(type === 'Round Neck'){
                    mainTshirtBoxFront.style.width = "540px"; mainTshirtBoxBack.style.width = "540px";
                    canvasFront.style.border = "none";canvasBack.style.border = "none";
                    canvasFront.classList.add("round-neck-front");
                    canvasBack.classList.add("round-neck-front");
                    canvasFront.width = 165;canvasFront.height = 177;
                    canvasBack.width = 165; canvasBack.height = 177;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20221222_185822364327_fa23be_Front.png?quality=70&format=webp&w=1536"; 
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20221222_191401115689_2f9bef_Back.png?quality=70&format=webp&w=1536"; 
                }
                else if(type === 'Round Neck - Dry Fit'){
                    mainTshirtBoxBack.style.width = "450px";
                    canvasFront.classList.add("common-front");
                    canvasBack.classList.add("dry-back");
                    canvasFront.width = 207;canvasFront.height = 297;
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
                    }
                else if(type === 'Round Neck - Polyester'){
                    mainTshirtBoxBack.style.width = "450px";
                    canvasBack.classList.add("dry-back");
                    canvasFront.classList.add("common-front");
                    canvasFront.width = 207;canvasFront.height = 297;
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20190725_110356227438_be069c_Round_neck_front_1.svg?quality=70&format=webp&w=1536"; 
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470"; 
                    }
                else if(type === 'Oversized'){ 
                    mainTshirtBoxFront.style.width = "540px"; mainTshirtBoxBack.style.width = "540px";
                    canvasFront.classList.add("Oversized");
                    canvasBack.classList.add("Oversized_back");
                    canvasFront.width = 190;canvasFront.height = 256;
                    canvasBack.width = 210; canvasBack.height = 275;
                    tshirtImageFront.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_hanes_tagless_tee_front.png"; 
                    tshirtImageBack.src = "https://d2e7n18qldpcpa.cloudfront.net/unisex_tees/mockup_template_nl_basic_tee_back.png"; 
                    }
                else if(type === 'Hoodie'){ 
                    mainTshirtBoxFront.style.width = "540px"; mainTshirtBoxBack.style.width = "540px";
                    canvasFront.classList.add("Hoodie_front");
                    canvasBack.classList.add("Hoodie_back");
                    canvasFront.width = 200;canvasFront.height = 170;
                    canvasBack.width = 212; canvasBack.height = 260;
                    tshirtImageFront.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_front_v2.png"; 
                    tshirtImageBack.src = "https://d3vvxc53hv5hl7.cloudfront.net/hoodies_and_sweatshirts/product_template_gildan_heavy_hoodie_back_v2.png"; 
                    }
                else if(type === 'Unisex Collar - Cotton'){ 
                    mainTshirtBoxBack.style.width = "450px";
                    canvasBack.classList.add("dry-back");
                    canvasFront.classList.add("common-front");
                    canvasBack.classList.add("common-back");
                    canvasFront.width = 207;canvasFront.height = 297;
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20190725_114943334198_5becb3_20170217_170039779490_d01d3c_Collar_neck_front.svg?quality=70&format=webp&w=1536"; 
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1536";
                     }
                else if(type === 'V-Neck Half Sleeve'){ 
                    mainTshirtBoxBack.style.width = "450px";
                    canvasFront.classList.add("common-front");
                    canvasBack.classList.add("dry-back");
                    canvasFront.width = 207;canvasFront.height = 297;
                    canvasBack.width = 207; canvasBack.height = 297;
                    tshirtImageFront.src = "https://printo-s3.mobimedia.ai/site/20211109_221037279685_3b4b95_V_Neck_Half_Slive.svg?quality=70&format=webp&w=1536"; 
                    tshirtImageBack.src = "https://printo-s3.mobimedia.ai/site/20200704_095751542781_b8c0a0_20170324_111624948939_4a6c68_Collar_neck_back.svg?quality=70&format=webp&w=1470";
                     }
            break;
    }
}

// Call the function with the desired location(s)
toggleTshirtView(locations); // Display both front and back views

</script>


    <script>
  // Create Fabric.js canvas for front and back
        let canvas = new fabric.Canvas('canva-front-box');
        let canvas_back = new fabric.Canvas('canva-back-box');

        var activeCanvas = null;
        var activeObject = null;
        var activeImageArray = null;

        var imageArray = [];
        var imageArray_back = []; // Array to store added image objects
        var selectedImagesToUpload = [];

        
// Configure Fabric.js objects
fabric.Object.prototype.transparentCorners = false;
fabric.Object.prototype.centeredRotation = false;
fabric.Object.prototype.borderColor = 'purple';
fabric.Object.prototype.cornerSize = 10;
fabric.Object.prototype.cornerStyle = 'circle';

document.getElementById('add-image').addEventListener('click', function () {
    // Trigger the file input when the "Add Image" button is clicked
    document.getElementById('tshirt-custompicture').click();
});

// Event listener for custom picture upload
document.getElementById('tshirt-custompicture').addEventListener("change", function(e) {
    var reader = new FileReader();

    reader.onload = function(event) {
        var imgObj = new Image();
        imgObj.src = event.target.result;

        // When the picture loads, create the image in the active canvas
        imgObj.onload = function(){
            var img = new fabric.Image(imgObj);
            img.scaleToHeight(170);
            img.scaleToWidth(170);

            // Check the active canvas and add the image accordingly
            if (activeCanvas === canvas) {
                canvas.centerObject(img);
                canvas.add(img);
            } else if (activeCanvas === canvas_back) {
                canvas_back.centerObject(img);
                canvas_back.add(img);
            }
            
            // Store the associated file with the image object
            img.file = e.target.files[0];
            // Add the image object to the array
            imageArray.push(img);
            activeCanvas.renderAll();
        };

        imgObj.evented = true;
        imgObj.hasControls = true;
        imgObj.hasBorders = true;
        imgObj.selectable = true;
    };

    // If the user selected a picture, load it
    if (e.target.files[0]) {
        reader.readAsDataURL(e.target.files[0]);
    }
});
    var imageGallery = document.getElementById('image-gallery');
    var images = imageGallery.getElementsByTagName('img');

    
for (var i = 0; i < images.length; i++) {
    images[i].addEventListener('click', function (event) {
        fabric.Image.fromURL(event.target.src, function (img) {
            // Add the image to the canvas
            img.scaleToHeight(100);
            img.scaleToWidth(100);
            if (activeCanvas === canvas) {
                canvas.centerObject(img);
                canvas.add(img);
                activeImageArray = imageArray; // Update the active image array
            } else if (activeCanvas === canvas_back) {
                canvas_back.centerObject(img);
                canvas_back.add(img);
                activeImageArray = imageArray; // Update the active image array for the back canvas
            }
            
            activeImageArray.push(img); // Add the image to the array

            // Set a custom property to track the associated image
            img.originalImage = event.target;

            // Remove image from canvas and array when it's deleted
            img.on('removed', function () {
                activeImageArray = activeImageArray.filter(function (item) {
                    return item !== img;
                });
            });

            // Ensure only one image is selected at a time
            canvas.discardActiveObject();
            canvas_back.discardActiveObject();
            img.set('active', true);
            activeCanvas.setActiveObject(img);
            // Push the selected image to the array for upload
            selectedImagesToUpload.push(event.target.src);
            
        });
    });
}

// Function to switch between canvases
function switchCanvas(canvasToActivate) {
    activeCanvas = canvasToActivate;
    activeImageArray = (canvasToActivate === canvas) ? imageArray : imageArray_back;
};

// Event listener for uploading images
$(document).ready(function () {
    
    $("#upload-design").click(function () {

        $(this).html('Please wait...').css('cursor', 'not-allowed');

        if(locations === 'Front'){
            var canvasDataUrl_front = canvas.toDataURL({ format: 'png' });
        }else if(locations === 'Back' ){
            var canvasDataUrl_back = canvas_back.toDataURL({ format: 'png' });
        }
        else{
            var canvasDataUrl_front = canvas.toDataURL({ format: 'png' });
            var canvasDataUrl_back = canvas_back.toDataURL({ format: 'png' });
        }
       
    var newImages = [];

    imageArray.forEach(function (img) {
        if (img.file) {
            newImages.push(img.file);
        }
    });

    // Send the new images using FormData
    var formData = new FormData();
    for (var i = 0; i < newImages.length; i++) {
        formData.append('images[]', newImages[i]);
    }

    // Append the selectedImages to the formData
    formData.append('selectedImages', selectedImagesToUpload);
    formData.append('design_id', design_id);
    formData.append('type', type);
    formData.append('color', color);
    formData.append('locations', locations);
    formData.append('quantity', quantity);
    formData.append('price',price);
    formData.append('canvas_front',canvasDataUrl_front);
    formData.append('canvas_back',canvasDataUrl_back);
    formData.append('user_id', <?php echo json_encode($id); ?>);

    // Send the selected images and new images to the server for upload and insert
        $.ajax({
            type: "POST",
            url: "save_image.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response === "Images saved and database updated successfully"){
                    <?php 
                        $_SESSION['design_id'] = $_POST['design_id'];
                        $_SESSION['type'] = $_POST['type'];
                        $_SESSION['color'] = $_POST['color'];
                        $_SESSION['location'] = $_POST['location'];
                        $_SESSION['quantity'] = $_POST['quantity'];
                        $_SESSION['price'] = $_POST['price'];
                        $_SESSION['material']= $_POST['material']; 
                    ?>
                    window.location.href = 'confirm_cart.php';
                }
            },
            complete: function () {
                $(this).html('Submit').css('cursor', 'pointer');
            }
        });
    });
});

$('#alert-box').css('display', 'none');
function handleImageRemoval(canvas, imageArray, selectedImagesToUpload) {
    canvas.on('object:removed', function (e) {
        if (e.target && e.target.type === 'image') {
            var removedImage = e.target;
            var index = imageArray.indexOf(removedImage);
            if (index !== -1) {
                // Remove the image object from imageArray
                imageArray.splice(index, 1);

                // Remove the corresponding image URL from selectedImagesToUpload
                if (index < selectedImagesToUpload.length) {
                    selectedImagesToUpload.splice(index, 1);
                }
            }
        }
    });
}

// Call the function for both canvases, passing the correct canvas as a parameter
handleImageRemoval(canvas, imageArray, selectedImagesToUpload);
handleImageRemoval(canvas_back, imageArray, selectedImagesToUpload);



document.getElementById('angleControl').addEventListener("input", function() {
    const angle = parseInt(this.value, 10);
    if (activeObject) {
        activeObject.set('angle', angle).setCoords();
        activeCanvas.requestRenderAll();
    }
});

// Event listener for object selection
canvas.on('selection:created', updateActiveObject);
canvas.on('selection:updated', updateActiveObject);
canvas_back.on('selection:created', updateActiveObject);
canvas_back.on('selection:updated', updateActiveObject);

function updateActiveObject() {
    var activeSelection = activeCanvas.getActiveObject();
    if (activeSelection) {
        activeObject = activeSelection;
        document.getElementById('angleControl').value = activeObject.angle;
    }
}


// ... Set Canvas Depend On Tshirt Location ... //

 if(locations === 'Front'){
    window.addEventListener('load', activecanvas);
 }else if(locations === 'Back'){
    window.addEventListener('load', activebackcanvas);
 }else{
    window.addEventListener('load', activecanvas);
 }
 
function activecanvas(){
    activeCanvas = canvas;
}

 function activebackcanvas (){
     activeCanvas = canvas_back;
 }

document.getElementById('showFront').addEventListener("click", function() {
    activeCanvas = canvas;
});

document.getElementById('showBack').addEventListener("click", function() {
    activeCanvas = canvas_back; 
});



function adjustImageSize(sizePercentage) {
    var activeObject = activeCanvas.getActiveObject();
    if (activeObject && activeObject.type === 'image') {
        var scaleFactor = sizePercentage / 100;
        activeObject.scaleToWidth(activeObject.width * scaleFactor);
        activeObject.scaleToHeight(activeObject.height * scaleFactor);
        activeCanvas.renderAll();
    }
}


document.getElementById('imgsize').addEventListener("input", function() {
            var sizePercentage = parseInt(this.value, 10);
            adjustImageSize(sizePercentage);
        });



function toggleDeleteButtonVisibility() {
            var activeObject = activeCanvas.getActiveObject();
            var deleteButton = document.getElementById('delete-button');
            if (activeObject) {
                deleteButton.style.display = 'block';
            } else {
                deleteButton.style.display = 'none';
            }
        }

        // Custom event listener to handle delete button visibility
        canvas.on('selection:created', toggleDeleteButtonVisibility);
        canvas.on('selection:updated', toggleDeleteButtonVisibility);
        canvas.on('selection:cleared', toggleDeleteButtonVisibility);
        canvas_back.on('selection:created', toggleDeleteButtonVisibility);
        canvas_back.on('selection:updated', toggleDeleteButtonVisibility);
        canvas_back.on('selection:cleared', toggleDeleteButtonVisibility);

        // Event listener for the delete button
        document.getElementById('delete-button').addEventListener("click", function() {
            var activeObject = activeCanvas.getActiveObject();
            if (activeObject) {
                activeCanvas.remove(activeObject);
            }
        });

        function adjustImageSize(sizePercentage) {
    if (activeObject && activeObject.type === 'image') {
        var scaleFactor = sizePercentage / 100;
        activeObject.scaleToWidth(activeObject.width * scaleFactor);
        activeObject.scaleToHeight(activeObject.height * scaleFactor);
        activeCanvas.renderAll();
    }
}


         const canvasFront = document.getElementById("canva-front-box");
         const canvasBack = document.getElementById("canva-back-box");


    document.getElementById('preview-button').addEventListener("click", function() {
       // Front canvas
       canvasFront.style.border = 'none';
       canvasBack.style.border = 'none';
       canvas.forEachObject(function(obj) {
         obj.selectable = false;
         obj.evented = false;
         obj.hasControls = false;
         obj.hasBorders = false;
       });
       
       // Back canvas
       canvas_back.forEachObject(function(obj) {
         obj.selectable = false;
         obj.evented = false;
         obj.hasControls = false;
         obj.hasBorders = false;
       });
       
       canvas.hasDeleteControls = false;
       canvas_back.hasDeleteControls = false;
       
       canvas.discardActiveObject();
       canvas_back.discardActiveObject();
       
       canvas.renderAll();
       canvas_back.renderAll();
    });

    document.getElementById('Design-button').addEventListener("click", function() {
       // Front canvas
       canvasFront.style.border = '1px dashed #790000ab';
       canvasBack.style.border = '1px dashed #790000ab';

       canvas.forEachObject(function(obj) {
         obj.selectable = true;
         obj.evented = true;
         obj.hasControls = true;
         obj.hasBorders = true;
       });
       
       // Back canvas
       canvas_back.forEachObject(function(obj) {
         obj.selectable = true;
         obj.evented = true;
         obj.hasControls = true;
         obj.hasBorders = true;
       });
       
       canvas.hasDeleteControls = true;
       canvas_back.hasDeleteControls = true;
       
       canvas.discardActiveObject();
       canvas_back.discardActiveObject();
       
       canvas.renderAll();
       canvas_back.renderAll();
    });



    // bringtofront and sendtoback ..... 

    function bringToFront() {
  var activeObject = activeCanvas.getActiveObject();
  if (activeObject) {
    activeCanvas.bringToFront(activeObject);
    activeCanvas.discardActiveObject();
    activeCanvas.renderAll();
  }
}

// Function to send the active object to the bottom
function sendToBottom() {
  var activeObject = activeCanvas.getActiveObject();
  if (activeObject) {
    activeCanvas.sendToBack(activeObject);
    activeCanvas.discardActiveObject();
    activeCanvas.renderAll();
  }
}

// Attach these functions to your buttons
document.getElementById('bring-to-top-button').addEventListener('click', bringToFront);
document.getElementById('send-to-bottom-button').addEventListener('click', sendToBottom);

</script>


<script>
        const previewButton = document.getElementById("preview-button");
        const designButton = document.getElementById("Design-button");

        previewButton.addEventListener("click", () => {
            previewButton.classList.add("active_PB");
            designButton.classList.remove("active_PB");
            designButton.classList.remove("button_D");
         });
         
         designButton.addEventListener("click", () => {
            designButton.classList.add("active_PB");
            previewButton.classList.remove("active_PB");
         });

</script>


<!-- text -->

<script>
var activeTextObject = null;
var activeCanvas = null;

// Function to add default text to the canvas
document.getElementById('addTextButton').addEventListener("click", function() {
    var defaultText = 'Default Text'; // Change this to your desired default text
    var newText = new fabric.IText(defaultText, {
        left: 50,
        top: 50,
        fontSize: 20,
        fill: '#000000', // Default text color
        fontFamily: 'Arial', // Default font family
        selectable: true
    });

    if (activeCanvas) {
        activeCanvas.add(newText);
        activeTextObject = newText;
        updateTextValueInput(defaultText);
    }
});

// Function to update the input field with text value
function updateTextValueInput(text) {
    document.getElementById('textValue').value = text;
}

// Function to change text value
document.getElementById('textValue').addEventListener("input", function() {
    if (activeTextObject && activeTextObject.type === 'i-text') {
        activeTextObject.set({ text: this.value });
        activeCanvas.renderAll();
    }
});

// Function to change text color
document.getElementById('textColor').addEventListener("input", function() {
    if (activeTextObject && activeTextObject.type === 'i-text') {
        activeTextObject.set({ fill: this.value });
        activeCanvas.renderAll();
    }
});

// Function to change text font
document.getElementById('textFont').addEventListener("change", function() {
    if (activeTextObject && activeTextObject.type === 'i-text') {
        activeTextObject.set({ fontFamily: this.value });
        activeCanvas.renderAll();
    }
});

// Function to change font size
// Function to change font size
document.getElementById('textSize').addEventListener("input", function() {
    if (activeTextObject && activeTextObject.type === 'i-text') {
        activeTextObject.set({ fontSize: parseInt(this.value, 10) });
        activeCanvas.renderAll();
    }
});


canvas.on('mouse:down', function() {
    activeCanvas = canvas;
    if (activeCanvas) {
        if (activeCanvas.getActiveObject() && activeCanvas.getActiveObject().type === 'i-text') {
            activeTextObject = activeCanvas.getActiveObject();
            updateTextValueInput(activeTextObject.text);
            document.getElementById('textColor').value = activeTextObject.fill;
            document.getElementById('textFont').value = activeTextObject.fontFamily;
            document.getElementById('textSize').value = activeTextObject.fontSize;
        }
    }
});

canvas_back.on('mouse:down', function() {
    activeCanvas = canvas_back;
    if (activeCanvas) {
        if (activeCanvas.getActiveObject() && activeCanvas.getActiveObject().type === 'i-text') {
            activeTextObject = activeCanvas.getActiveObject();
            updateTextValueInput(activeTextObject.text);
            document.getElementById('textColor').value = activeTextObject.fill;
            document.getElementById('textFont').value = activeTextObject.fontFamily;
            document.getElementById('textSize').value = activeTextObject.fontSize;
        }
    }
});


$(document).ready(function () {
    // Fetch and display images when the page loads
    fetchAndDisplayImages();

    // Function to fetch and display images
    function fetchAndDisplayImages() {
        $.ajax({
            url: 'fetch_image.php', // Replace with the URL to your server-side script
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $("#image-gallery").html(data);
            },
            error: function (error) {
                console.error("Error fetching images:", error);
            }
        });
    }
}); 
</script>
