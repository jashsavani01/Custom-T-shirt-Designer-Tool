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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
            .text{
                font-weight: 700;
                color: rgba(0, 0, 0, 0.7);
                font-size: 31px;
                line-height: 1.10714;
            }
            .color{
                color:rgb(57, 66, 78);
            }
            .header{
               background-color: rgb(239, 241, 242);
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
            .main-boxs:hover{
                box-shadow:4px 4px 9px rgba(0, 0, 0, 0.2), -4px -4px 9px rgba(0, 0, 0, 0.2);
            }
            .delete-btn{
               cursor: pointer;
            }
        </style>
</head>
<body>

<div class="container">
    <div class="row pe-5 ps-5 mt-5 pt-5">
        <h2 class="text">Shopping Cart</h2>
        <span style="color:rgba(158,158,159); font-size:18px;" id="number"></span>


        <div class="col-lg-8">
           <div class="col-lg-12 pt-3 ps-3 pb-3 header mt-4">
              <h6 id="number">All Jobs -  </h6>
           </div>
           <div id="main_box"></div>
        </div>
        <!-- side 2  -->
        <div class="col-lg-4 mt-4">
           <div class="p-3 border shadow-sm">
               <h6>Summary</h6>
               <div class="d-flex justify-content-between mt-4">
                  <h6  style="color:rgba(158,158,159); font-size:15px;">Item Subtotal</h6>
                  <h6 id="totalprice">₹</h6>
               </div>
               <div class="border-top pt-4 pb-4  mt-4">
                   <div class="d-flex justify-content-between">
                      <h6 >Item Total (inclusive of all tax)</h6>
                      <h5 id="totalprice">₹</h5>
                   </div>
               </div>
               <div class="w-100 header d-flex pt-3 ps-3 pb-3 text">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                           <path d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z"></path>
                    </svg><h6>Vouchers are now moved to checkout<h6>
               </div>
           </div>
        <a href="checkout.php"><button id="confirm_btn" class="btn btn-danger W-100 rounded-2 mt-3 text-white pt-2 pb-2 mb-3">Continue to Checkout</button></a>
        </div>


        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tshirt Design</h1>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalBody"></div>
                </div>
            </div>
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
            error: function (xhr, status, error){}
        });
    };
        cartdata();

        $(document).on("click",".delete-btn",function(){
        var itemId = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "Cart_fun.php", 
            data: { id: itemId },
            success: function (response){
                location.reload();
            },
            error: function (xhr, status, error) {
            }
        });
    });

    $(document).on("click", ".btn-primary", function() {
    var elementId = $(this).data('element-id');
    $.ajax({
        type: "POST",
        url: "Cart_fun.php", 
        data: { designid: elementId },
        success: function (response){
            $('#modalBody').html(response);
            // Show the modal
            $('#staticBackdrop').modal('show');
        },
        error: function (xhr, status, error) {
            console.error("Error in Ajax request:", error);
        }
    });
});


});



</script>
</body>
</html>