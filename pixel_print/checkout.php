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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn-primary{ 
            background-image: linear-gradient(#700895,#3f0066);
            border:none;
        }
        .pincode-arow{
            width:15px;
            height:16px;
        }
        .pincode-row{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 5px 16px;
            height: 40px;
            border-radius: 5px;
        }
        .pin-input{
            border:none;
            outline:none;
        }
        .pin-svg{
            border:none;
        }
        .cursor{
            cursor: pointer;
        }
        #myDiv {
            display: none;
        }
        .select {
            width: 100%;
            padding: 6px; 
            font-size: 16px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            background-color: #fff; 
            color: #333; 
            outline: none;
        }
        .select-menu{
                user-select: none;
                cursor: pointer;
            }
            .select-menu.active .select-btn svg{
                transform: rotate(-180deg);
                transition: 0.3s All;
            }
            .select-menu .options{
                position: relative;
                margin-top: 10px;
                border-radius: 8px;
                background: #fff;
                display: none;
                height:159px;
                padding-top:16px;
                overflow: scroll;
                overflow-x: hidden;
                overflow-y: hidden;
            }
            .select-menu.active .options{
                display: block;
            }
            .options .option{
                display: flex;
                height: 78px;
                cursor: pointer;
                border-radius: 8px;
                align-items: center;
                background: #fff;
            }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row pe-5 ps-5 mt-5 pt-5">
        <div class="col-lg-8">
            <!-- location box 2 -->

            <div class="border rounded-2 mt-3 bg-white">
                <div class="pincode-row border-none" id="locationbg">
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-row align-items-center justify-content-center me-3" style="height: 20px; width: 20px; border-radius: 50px; background-color: rgb(112, 8, 149);">
                            <span style="color: rgb(255, 255, 255); font-size: 14px;">1</span>
                        </div>
                        <span class="fw-semibold">Add location</span>
                    </div>
                    <h7 style="color:#3f0066;" class='fw-semibold cursor'  id="showButton">Change</h7>
                </div>
                <div class="px-3" id="myDiv">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start my-3" style="">
                        <div id="home" class="d-flex flex-column align-items-center px-3 py-3" role="button" style="border-radius: 5px; border-style: solid; border-width: 1px; border-color: rgb(102, 45, 145); background-color: rgb(244, 234, 252); margin-right: 16px; width:122px;">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="60" height="60" style="color: rgb(57, 66, 78);">
                                <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                            </svg>
                            <span style="color: rgb(57, 66, 78); font-size: 16px; margin-top: 10px;">Home</span>
                        </div>
                        <div id="work" class="d-flex flex-column align-items-center px-3 py-3" role="button" style="border-radius: 5px; border-style: solid; border-width: 1px; border-color: rgb(239, 241, 242); background-color: transparent; margin-right: 0px; width:122px;">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="work" class="svg-inline--fa fa-work fa-w-20 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 616 512"  width="60" height="60"  style="color: rgb(57, 66, 78);">
                                <path fill="currentColor" d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z"></path>
                            </svg>
                            <span style="color: rgb(57, 66, 78); font-size: 16px; margin-top: 10px;">Work</span>
                        </div>
                        <input type="hidden" id="location_type" value="">
                    </div>
                    <div class="col-lg-12">
                        <div class="p-3 d-flex row">
                            <div class="col-lg-5">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control shadow-none mb-2" id="name">
                            </div>
                            <div class="col-lg-5">
                                <label for="name" class="form-label">Mobile Number</label>
                                <input type="number" class="form-control shadow-none mb-2" id="name">
                            </div>
                            <div class="col-lg-10">
                                <label for="name" class="form-label">Address</label>
                                <textarea type="text" class="form-control shadow-none mb-3" rows="3" id="name"></textarea>
                            </div>
                            <div class="col-lg-5">
                                <label for="name" class="form-label">City/District/Town</label>
                                <input type="text" class="form-control shadow-none mb-3" id="name">
                            </div>
                            <div class="col-lg-5">
                                <label for="name" class="form-label">State</label>
                                <div class="mb-3">
                                    <select class="select" name="state" required="" tabindex="7">
                                        <option value="" disabled="">--Select State--</option>
                                        <option value="Andaman &amp; Nicobar Islands">Andaman &amp; Nicobar Islands</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadra &amp; Nagar Haveli &amp; Daman &amp; Diu">Dadra &amp; Nagar Haveli &amp; Daman &amp; Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Ladakh">Ladakh</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <label for="name" class="form-label">Landmark(optional)</label>
                                <input type="text" class="form-control shadow-none mb-2" id="name">
                            </div>
                            <div class="col-lg-5">
                                <label for="name" class="form-label">Alternate Phone</label>
                                <input type="text" class="form-control shadow-none mb-2" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center justify-content-md-start my-3">
                        <button type="button" id="hideButton" class="btn btn-primary" data-faitracker-form-bind="true">Continue</button>
                    </div>
                </div>
            </div>

            <!-- show address -->
            <div class="border rounded-2 mt-3 bg-white">
                <div class="pincode-row bg-white border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-row align-items-center justify-content-center me-3" style="height: 20px; width: 20px; border-radius: 50px; background-color: rgb(112, 8, 149);">
                            <span style="color: rgb(255, 255, 255); font-size: 14px;">2</span>
                        </div>
                        <span class="fw-semibold">Address</span>
                    </div>
                </div>
                <div class=" mt-2 mb-3 rounded-3">
                    <label for="address_selected" class="w-100  border-bottom">
                        <div class="mt-2 mb-3 rounded-3  me-1 ms-1 d-flex">
                            <span class="me-3 mt-3 ms-2">
                                <input type="radio" id="address_selected" name="address">
                            </span>
                            <div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="fw-semibold fs-5 me-3">jash savani</span>
                                    <span>9825631535</span>
                                </div>
                                <div>
                                    <span> f-9 jay shuikan app near holicild school </span>,<span>hirawadi</span>,<span>ahmedabad</span>-<span>382350</span>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <div id="main_box"></div>
        </div>

        <!-- side 2  -->
        <div class="col-lg-4 mt-4">
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
       $(document).ready(function () {
       var uid = <?php echo $id; ?>;
       function cartdata(){
       $.ajax({
            type: "POST",
            url: "Cart_data.php",
            data: {userid : uid},
            dataType: "json",
            success: function (data) {
                var output = data.output;
                var totalp = data.total;
                var number = data.num + '  item';
                $("#main_box").html(output);
                $("#totalprice,#totalprice").append(totalp);
                $("#number,#number").append(number);

                $(".select-btn").click(function () {
                $(".select-menu").toggleClass("active");
                });
            },
            error: function (xhr, status, error) {
             
            }
           });
        };
        cartdata();

        $(document).on("click",".delete-btn",function(){
        var itemId = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "remove_cart.php", 
            data: { id: itemId },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
    });
    const home = document.getElementById('home');
    const work = document.getElementById('work');
    
    home.addEventListener("click",function(){
        home.style.backgroundColor=" rgb(244, 234, 252)";
        home.style.borderColor="rgb(102, 45, 145)";
        work.style.borderColor="rgb(239, 241, 242)";
        work.style.backgroundColor="transparent";
    });
    work.addEventListener("click",function(){
        work.style.backgroundColor=" rgb(244, 234, 252)";
        home.style.borderColor="rgb(239, 241, 242)";
        work.style.borderColor="rgb(102, 45, 145)";
        home.style.backgroundColor="transparent";
    });


        document.getElementById("showButton").addEventListener("click", function() {
            document.getElementById("myDiv").style.display = "block";
            document.getElementById("showButton").style.display = "none";
            document.getElementById("locationbg").style.background = "#dfe7ff";
        });

        document.getElementById("hideButton").addEventListener("click", function() {
            document.getElementById("myDiv").style.display = "none";
            document.getElementById("showButton").style.display = "block";
            document.getElementById("locationbg").style.background = "#fff";
        });

    //.. this script for work and home location type set in input value

        document.addEventListener("DOMContentLoaded", function() {
            // Get a reference to the input field
            var inputField = document.getElementById("inputField");

            // Set the default value to "Home" when the page loads
            inputField.value = "Home";

            // Get references to the "Home" and "Work" elements
            var homeElement = document.getElementById("home");
            var workElement = document.getElementById("work");

            // Add a click event listener to the "Home" element
            homeElement.addEventListener("click", function() {
                inputField.value = "Home";
            });

            // Add a click event listener to the "Work" element
            workElement.addEventListener("click", function() {
                inputField.value = "Work";
            });
        });

</script>


</body>
</html>