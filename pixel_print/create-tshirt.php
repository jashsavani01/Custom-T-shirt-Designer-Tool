<?php include("header.php"); ?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create-tshirt-css.css">
   <style>
    /* ===== Google Font Import - Poppins ===== */
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    </style>
    
    <!--===== Boxicons CSS =====-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     
    <title>Custom Dropdown Select Menu</title>
</head>
<body>

<div id="error-box"></div>
<div id="success-box"></div>

<!-- select tsirt type -->
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-6">
            <img src="https://printo-cloudinary.mobimedia.ai/dxivtqnri/image/upload/c_fill,f_auto,g_auto,w_1920/v1672324776/2023/T-shirts/Unisex-round-neck-cotton/Unisex-Round-Neck-Cotton-T-Shirt.jpg" width="562" >
        </div>
        <div class="col-lg-6">
        <form id='form-submit' action="index.php" method="POST">
        <input type="hidden" value="true" id="is_custom" name="iscustom">
        <input type="hidden" value="" id="tshirt_id" name="design_id">
    <div class="select-menu">
        <lable>Style</lable>
        <div class="select-btn">
            <span class="sBtn-text">Select your option</span>
            <input type='hidden' value="" id='tshirt_type' name="type">
            <input type='hidden' value="" id='materials' name="material">
            <i class="bx bx-chevron-down"></i>
        </div>

        <ul class="options" id='tshirt-type'>
            <li class="option select-product" data-product="Round Neck">
                <img src="https://tiimg.tistatic.com/fp/1/007/674/plain-black-pure-cotton-short-sleeve-casual-wrinkle-free-simple-stylish-t-shirt-for-men-622.jpg" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class="select-product option-text1">Round Neck</a>
                        <div class="option-text2">100% COTTON 180 GSM </div>
                    </div>
            </li>
            <li class="option select-product" data-product="Round Neck - Polyester">
                <img src="https://activefashionindia.com/wp-content/uploads/2023/05/drifit-tshirt-manufacturer-supplier.webp" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class="option-text1">Round Neck - Dry Fit</a>    
                        <div class="option-text2">140 GSM DRY FIT</div>
                    </div>
            </li>
            <li class="option select-product" data-product="Round Neck - Polyester">
                <img src="https://activefashionindia.com/wp-content/uploads/2023/05/drifit-tshirt-manufacturer-supplier.webp" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class="option-text1">Round Neck - Polyester </a>    
                        <div class="option-text2">POLYSTER 140 GSM</div>
                    </div>
            </li>
            <li class="option select-product" data-product="Oversized">
                <img src="https://tiimg.tistatic.com/fp/1/007/674/plain-black-pure-cotton-short-sleeve-casual-wrinkle-free-simple-stylish-t-shirt-for-men-622.jpg" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class="select-product option-text1">Oversized</a>    
                        <div class="option-text2">180 GSM BIO WASH PRE SHRUNK</div>
                    </div>
            </li>
            <li class="option select-product" data-product="Hoodie">
                <img src="https://tiimg.tistatic.com/fp/1/007/674/plain-black-pure-cotton-short-sleeve-casual-wrinkle-free-simple-stylish-t-shirt-for-men-622.jpg" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class=" option-text1">Hoodie</a>   
                        <div class="option-text2">COTTON</div>
                    </div>
            </li>
            <li class="option select-product" data-product="Unisex Collar - Cotton">
                <img src="https://tiimg.tistatic.com/fp/1/007/674/plain-black-pure-cotton-short-sleeve-casual-wrinkle-free-simple-stylish-t-shirt-for-men-622.jpg" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class=" option-text1">Unisex Collar - Cotton</a>   
                        <div class="option-text2">200 GSM COTTON</div>
                    </div>
            </li>
            <li class="option select-product" data-product="V-Neck Half Sleeve">
                <img src="https://activefashionindia.com/wp-content/uploads/2023/05/drifit-tshirt-manufacturer-supplier.webp" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class="option-text1">V-Neck Half Sleeve</a>  
                        <div class="option-text2">POLY-COTTON 180 GSM</div>
                    </div>
            </li>
            <li class="option select-product" data-product="V-Neck Full Sleeve">
                <img src="https://activefashionindia.com/wp-content/uploads/2023/05/drifit-tshirt-manufacturer-supplier.webp" class='tshirt-demo'>
                    <div class="tshirt-des"> 
                        <a href="#" class="option-text1">V-Neck Full Sleeve</a>  
                        <div class="option-text2">POLY-COTTON 180 GSM</div>
                    </div>
            </li>
        </ul>
    </div>


<!-- select a color -->
    <div class="select-menu-color">
        <lable>Fabric Color</lable>
            <div class="select-btn-color">
                <span class="sBtn-text-color">Select your option</span>
                <input type='hidden' value="" id='tshirt_color' name="color">
                <i class="bx bx-chevron-down"></i>
            </div>

        <ul class="options-color" id='tshirt-color'>
            <li class="option-color select-product-color">
                <div class='color-box white'></div><div class='option-text1-color'>White</div>
            </li>
            <li class="option-color select-product-color">
                <div class='color-box black'></div><div class='option-text1-color'>Black</div>
            </li>
            <li class="option-color select-product-color">
                <div class='color-box Red'></div><div class='option-text1-color'>Red</div>
            </li>
            <li class="option-color select-product-color">
                <div class='color-box Pink'></div><div class='option-text1-color'>Pink</div>
            </li>
            <li class="option-color select-product-color">
                <div class='color-box RoyalBlue'></div><div class='option-text1-color'>royalblue</div>
            </li>
            <li class="option-color select-product-color">
                <div class='color-box lavender'></div><div class='option-text1-color'>lavender</div>
            </li>
            <li class="option-color select-product-color" >
                <div class='color-box maroon'></div><div class='option-text1-color'>maroon</div>
            </li>
            <li class="option-color select-product-color" >
                <div class='color-box yellow'></div><div class='option-text1-color'>yellow</div>
            </li>
            <li class="option-color select-product-color" >
                <div class='color-box orange'></div><div class='option-text1-color'>orange</div>
            </li>
            <li class="option-color select-product-color" >
                <div class='color-box NavyBlue'></div><div class='option-text1-color'>Navy Blue</div>
            </li>
            <li class="option-color select-product-color" >
                <div class='color-box Mustard'></div><div class='option-text1-color'>Mustard</div>
            </li>
            <li class="option-color select-product-color" >
                <div class='color-box Gray'></div><div class='option-text1-color'>Gray</div>
            </li>
            <li class="option-color select-product-color" >
                <div class='color-box Purple'></div><div class='option-text1-color'>Purple</div>
            </li>
        </ul>
    </div>


<!-- select print location -->
<div id="material-selection" class="select-menu-loc">
    <lable>Print Locations</lable>
    <input type='hidden' value="" id='tshirt_location' name="location">
    <div class="select-btn-loc">
        <div class="sBtn-text-loc">
            <div id="Front" class="location-print">
                <div class="front-back">
                    <span>Front</span>
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="deleteSkill('Front', 'Front-checkbox')" class="icon icon-tabler icon-tabler-circle-minus" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="#fff" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 12l6 0" />
                        </svg>       
                </div>
            </div>

            <div id="Back" class="location-print">
                <div class="front-back">
                    <span>Back</span>
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="deleteSkill('Back', 'Back-checkbox')" class="icon icon-tabler icon-tabler-circle-minus" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="#fff" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M9 12l6 0" />
                        </svg>       
                </div>
            </div>
        </div>
        <i class="bx bx-chevron-down"></i>
    </div>
    <ul class="options-loc" id='tshirt-type'>
        <li class="option-loc select-product-locf" for="Front-checkbox">
            <input type="checkbox" id="Front-checkbox" class=" skill-checkbox">
            <label class="location-lable" >Front</label>
        </li>
        <li class="option-loc select-product-locb" for="Back-checkbox">
            <input type="checkbox" id="Back-checkbox" class=" skill-checkbox">
            <label class="location-lable" >Back</label>
        </li>
    </ul>
</div>


<!-- select quantity -->
    <div class='select-quantity'>
        <lable>Quantity</lable>
        <input type="text" value="" id="tshirt_quantity" name="quantity">  
    </div>

    <div id="price-display">
        <input type="hidden" value="" id="tshirt_price" name="price">
        <h5 class="fw-bold">Price: <span id="tshirt-price"></span></h5>
    </div>

  

    <div>
        <a href="https://wa.me/916355147853"  target="_blank" class="text-decoration-none text-success">whasapp </a>
    </div>
    <div class="d-flex justify-content-center">
        <button id='upload_tshirt' class="w-50 btn btn-warning" type="submit">UPLOAD DESIGN</button>
    </div>
    </form>
        </div>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function generateRandomNumber() {
  return Math.floor(Math.random() * 1000000) + 2000000;
}

const randomSixDigitNumber = generateRandomNumber();
const tshirt_id = document.getElementById("tshirt_id");
tshirt_id.value = randomSixDigitNumber;
localStorage.setItem("id", randomSixDigitNumber);
</script>

<script>

// tshirt type .....................

    const optionMenu = document.querySelector(".select-menu"),
    selectBtn = optionMenu.querySelector(".select-btn"),
    options = optionMenu.querySelectorAll(".option"),
    sBtn_text = optionMenu.querySelector(".sBtn-text"),
    thirt_type =  optionMenu.querySelector("#tshirt_type");
    material =  optionMenu.querySelector("#materials");
    selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       
    
    options.forEach(option =>{
        option.addEventListener("click", ()=>{
            let selectedOption = option.querySelector(".option-text1").innerText;
            let materials = option.querySelector(".option-text2").innerText;

            sBtn_text.innerText = selectedOption;
            thirt_type.value = selectedOption;
            material.value = materials;
            //type value store in localstorage
            localStorage.setItem("type", selectedOption);
            localStorage.setItem("material", materials);
         
            
            if (selectedOption === 'V-Neck Full Sleeve') {
                document.querySelector('.option-loc.select-product-locb').style.display = 'none';
            } else {
                document.querySelector('.option-loc.select-product-locb').style.display = 'flex';
            }
            optionMenu.classList.remove("active");
        });
    });

// tshirt color ....................

    const optionMenuc = document.querySelector(".select-menu-color"),
    selectBtnc = optionMenuc.querySelector(".select-btn-color"),
    optionsc = optionMenuc.querySelectorAll(".option-color"),
    sBtn_textc = optionMenuc.querySelector(".sBtn-text-color"),
    thirt_color =  optionMenuc.querySelector("#tshirt_color");

    selectBtnc.addEventListener("click", () => optionMenuc.classList.toggle("active"));       
    
    optionsc.forEach(option =>{
        option.addEventListener("click", ()=>{
            let selectedOptionc = option.querySelector(".option-text1-color").innerText;
            sBtn_textc.innerText = selectedOptionc; 
            thirt_color.value = selectedOptionc;
            
            //color value store in localstorage
            localStorage.setItem("color", selectedOptionc);

            optionMenuc.classList.remove("active");
        });
    });

//location...................
const optionMenu_loc = document.querySelector(".select-menu-loc");
const selectBtn_loc = optionMenu_loc.querySelector(".select-btn-loc");
const options_loc = optionMenu_loc.querySelectorAll(".option-loc");
const sBtn_text_loc = optionMenu_loc.querySelector(".sBtn-text-loc");

selectBtn_loc.addEventListener("click", () => optionMenu_loc.classList.toggle("active"));

options_loc.forEach(option => {
    option.addEventListener("click", () => {
        optionMenu_loc.classList.remove("active");
    });
});

var frontLiElement = document.querySelector('.option-loc.select-product-locf');
var backLiElement = document.querySelector('.option-loc.select-product-locb');

// Get the associated checkbox elements
var frontCheckboxElement = document.querySelector('#Front-checkbox');
var backCheckboxElement = document.querySelector('#Back-checkbox');

frontLiElement.addEventListener('click', function () {
    // Programmatically click the "Front" checkbox
    frontCheckboxElement.click();
});

backLiElement.addEventListener('click', function () {
    // Programmatically click the "Back" checkbox
    backCheckboxElement.click();
});

// Function to toggle the display of a specific skill's content
function toggleSkill(skillId, checkboxId) {
    const skillContent = document.getElementById(skillId);
    const checkbox = document.getElementById(checkboxId);

    if (checkbox.checked) {
        skillContent.style.display = 'block';
    } else {
        skillContent.style.display = 'none';
    }
}

// Add event listeners to the checkboxes
frontCheckboxElement.addEventListener('click', function () {
    toggleSkill('Front', 'Front-checkbox');
});

backCheckboxElement.addEventListener('click', function () {
    toggleSkill('Back', 'Back-checkbox');
});

// Initialize an empty array to store selected locations
const selectedLocations = [];

// Function to update the hidden input value
function updateHiddenInput() {
    const hiddenInput = document.getElementById('tshirt_location');
    hiddenInput.value = selectedLocations.join(', ');
    //location value store in localstorage
    localStorage.setItem("location", selectedLocations.join(', '));
    
}

// Function to handle checkbox click
function handleCheckboxClick(location, checkboxElement) {
    if (checkboxElement.checked) {
        // Add the location to the array if the checkbox is checked
        selectedLocations.push(location);
    } else {
        // Remove the location from the array if the checkbox is unchecked
        const index = selectedLocations.indexOf(location);
        if (index !== -1) {
            selectedLocations.splice(index, 1);
        }
    }

    // Update the hidden input
    updateHiddenInput();

    
}

// Add event listeners to the checkboxes
frontCheckboxElement.addEventListener('click', function () {
    handleCheckboxClick('Front', frontCheckboxElement);
});

backCheckboxElement.addEventListener('click', function () {
    handleCheckboxClick('Back', backCheckboxElement);
});


     //Quantity code check user input only numerical value not charecter value......

        const tshirt_quantity = document.getElementById("tshirt_quantity");

        tshirt_quantity.addEventListener("input", function(event) {
          // Get the current input value
            let inputValue = event.target.value;
        
          // Use a regular expression to remove non-numeric characters
            inputValue = inputValue.replace(/[^0-9]/g, "");
        
          // Update the input value with only numeric characters
            event.target.value = inputValue;
            
          //location value store in localstorage
          localStorage.setItem("quantity",inputValue);
    
        });

  $(document).ready(function() {
    $(".select-product").click(function() {
      const selectedProduct = $(this).data("product");
      $.ajax({
        url: "get_price.php", // Replace with your server-side script URL
        method: "POST",
        data: { product: selectedProduct},
        success: function(data) {
          $('#tshirt-price').html(data);
          $('#tshirt_price').val(data);
          //location value store in localstorage
          localStorage.setItem("price",data);
        }
      });
    });
  });
    document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('form-submit');
            
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent the form from submitting by default
                
                // Get input values
                const design_id = form.querySelector('input[name="design_id"]');
                const tshirt_type = form.querySelector('input[name="type"]');
                const tshirt_color = form.querySelector('input[name="color"]');
                const tshirt_Location = form.querySelector('input[name="location"]');
                const tshirt_quantity = form.querySelector('input[name="quantity"]');
                // Check if any input is empty
                if (design_id.value === "" || tshirt_type.value === "" || tshirt_color.value === "" || tshirt_Location.value === "" || tshirt_quantity.value === "" ) {
                    show_message('error',"insert all field !");
                } else {
                    // Submit the form if all fields are filled
                    form.submit();
                }
            });
        });

        function show_message(type, text) {
            var message_box;
            if (type === 'error') {
                message_box = document.getElementById('error-box');
            } else {
                message_box = document.getElementById('success-box');
            }
            
                message_box.innerHTML = text;
                message_box.style.display = 'block';
                setTimeout(function () {
                message_box.style.display = 'none';
            },2000);
        }

    //  });





</script>

</body>
</html>
