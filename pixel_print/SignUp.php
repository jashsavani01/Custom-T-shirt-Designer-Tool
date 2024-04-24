<?php include("links.php") ?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Responsive Login and Signup Form </title>

        <!-- CSS -->
        <link rel="stylesheet" href="style.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
    <div id="error-box"></div>
    <div id="success-box"></div>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>
                    <form id="login-form">
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" id="email_l">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" id="password_l">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div>

                        <div class="field button-field">
                            <button id="signin_submit">Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <span>Login with Google</span>
                    </a>
                </div>

            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header>Signup</header>
                    <form id="form-add">
                        <div class="field input-field">
                            <input type="text" placeholder="Username" class="input" id="uname">
                        </div>
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" id="email">
                        </div>
                        <div class="field input-field">
                            <input type="password" placeholder="password" class="password" id="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button id="signup_submit">Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <span>Login with Google</span>
                    </a>
                </div>

            </div>
        </section>

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                function signin() {
                    $('#signin_submit').on("click", function(e){
                    e.preventDefault();
                        
                        var email_l = $("#email_l").val();
                        var password_l = $("#password_l").val();

                        if(email_l ==""  || password_l == "" ){
                            $('#error-box').html("😠 enter full details").fadeIn();
                            setTimeout(function(){
                                $('#error-box').fadeOut("slow");
                        },3000);
                        }else{
                        $.ajax({
                            url: "signin_data.php",
                            type:"POST",
                            data:{email_l:email_l,pass_l:password_l},
                            success:function(data){
                                if(data == 1){
                                    $('#form-add').trigger("reset");
                                    $('#success-box').html("😄 Successfully...!").fadeIn();
                                        setTimeout(function(){
                                            $('#success-box').fadeOut("slow");
                                    },3000);
                                    window.location.href = "create-tshirt.php";
                                }else{
                                    $('#error-box').html("😠 Email Id Not Valid...!").fadeIn();
                                        setTimeout(function(){
                                            $('#error-box').fadeOut("slow");
                                        },3000);
                                }
                            }
                        });
                    }
                });
            };
            signin();

            $('#signup_submit').on("click", function(e){
                e.preventDefault();
                    var username = $("#uname").val();
                    var emails  = $("#email").val();
                    var password = $("#password").val();

                    if(emails =="" || password == "" || username == ""){
                        $('#error-box').html("enter full details").fadeIn();
                        setTimeout(function(){
                            $('#error-box').fadeOut("slow");
                    },3000);
                    }else{
                    $.ajax({
                        url: "signup_data.php",
                        type:"POST",
                        data:{email:emails,pass:password,name:username},
                        success:function(data){
                            if(data == 1){
                                $('#form-add').trigger("reset");
                                $('#success-box').html("Successfully...!").fadeIn();
                                    setTimeout(function(){
                                        $('#success-box').fadeOut("slow");
                                },3000);
                            }else{
                                $('#error-box').html("Email alerdy verify...!").fadeIn();
                                    setTimeout(function(){
                                        $('#error-box').fadeOut("slow");
                                    },3000);
                            }
                        }
                    });
                }
            });
        });
        </script>
        <script>
            const forms = document.querySelector(".forms"),
            pwShowHide = document.querySelectorAll(".eye-icon"),
            links = document.querySelectorAll(".link");

            pwShowHide.forEach(eyeIcon => {
                eyeIcon.addEventListener("click", () => {
                    let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
                    
                    pwFields.forEach(password => {
                        if(password.type === "password"){
                            password.type = "text";
                            eyeIcon.classList.replace("bx-hide", "bx-show");
                            return;
                        }
                        password.type = "password";
                        eyeIcon.classList.replace("bx-show", "bx-hide");
                    })
                    
                })
            })      
            
            links.forEach(link => {
                link.addEventListener("click", e => {
                   e.preventDefault(); //preventing form submit
                    forms.classList.toggle("show-signup");
                })
            })
        </script>
    </body>
</html>
</body>
</html>