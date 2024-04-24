<?php
session_start();

if (!isset($_POST['design_id'])) {
    header("Location:create-tshirt.php");
    exit;
}else{

}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "pixel_print");

    if (!isset($_SESSION['id'])) {
        header("Location:SignUp.php");
        exit();
    }else{
        $id = $_SESSION['id'];
    }
?>
<?php include("links.php");  ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dynamic and Resizable Tshirt Designer</title>
        <link rel="stylesheet" href="index-css.css">
    </head>
    <body>


<div class="container">
    <div class="mt-5 pt-1 mb-5">
        <button id="addTextButton" class="btn btn-danger ps-4 pe-4">Add Default Text</button>
        <input type="text" id="textValue" placeholder="Edit Text">
        <label for="textColor">Text Color:</label>
        <input type="color" id="textColor" value="#000000">
        <label for="textFont">Text Font:</label>

        <select id="textFont">
            <option value="Arial" style="font-family: Arial, sans-serif;">Arial</option>
            <option value="Times New Roman" style="font-family: 'Times New Roman', serif;">Times New Roman</option>
            <option value="Helvetica" style="font-family: Helvetica, sans-serif;">Helvetica</option>
            <option value="Verdana" style="font-family: Verdana, sans-serif;">Verdana</option>
            <option value="Tahoma" style="font-family: Tahoma, sans-serif;">Tahoma</option>
            <option value="Georgia" style="font-family: Georgia, serif;">Georgia</option>
            <option value="Palatino Linotype" style="font-family: 'Palatino Linotype', 'Book Antiqua', serif;">Palatino Linotype</option>
            <option value="Book Antiqua" style="font-family: 'Book Antiqua', 'Palatino Linotype', serif;">Book Antiqua</option>
            <option value="Trebuchet MS" style="font-family: 'Trebuchet MS', sans-serif;">Trebuchet MS</option>
            <option value="Arial Black" style="font-family: 'Arial Black', sans-serif;">Arial Black</option>
            <option value="Impact" style="font-family: Impact, sans-serif;">Impact</option>
            <option value="Lucida Sans Unicode" style="font-family: 'Lucida Sans Unicode', sans-serif;">Lucida Sans Unicode</option>
            <option value="Lucida Console" style="font-family: 'Lucida Console', monospace;">Lucida Console</option>
            <option value="Century Gothic" style="font-family: 'Century Gothic', sans-serif;">Century Gothic</option>
            <option value="Garamond" style="font-family: Garamond, serif;">Garamond</option>
            <option value="Copperplate" style="font-family: Copperplate, fantasy;">Copperplate</option>
            <option value="Brush Script MT" style="font-family: 'Brush Script MT', cursive;">Brush Script MT</option>
            <option value="Comic Sans MS" style="font-family: 'Comic Sans MS', cursive;">Comic Sans MS</option>
            <option value="Courier New" style="font-family: 'Courier New', Courier, monospace;">Courier New</option>
            <option value="Arial Narrow" style="font-family: 'Arial Narrow', sans-serif;">Arial Narrow</option>
            <option value="Times" style="font-family: Times, serif;">Times</option>
            <option value="Courier" style="font-family: Courier, monospace;">Courier</option>
            <option value="Calibri" style="font-family: Calibri, sans-serif;">Calibri</option>
            <option value="Candara" style="font-family: Candara, sans-serif;">Candara</option>
            <option value="Franklin Gothic" style="font-family: 'Franklin Gothic', sans-serif;">Franklin Gothic</option>
            <option value="Franklin Gothic Medium" style="font-family: 'Franklin Gothic Medium', sans-serif;">Franklin Gothic Medium</option>
            <option value="Bodoni MT" style="font-family: 'Bodoni MT', serif;">Bodoni MT</option>
            <option value="Optima" style="font-family: Optima, sans-serif;">Optima</option>
            <option value="Century Schoolbook" style="font-family: 'Century Schoolbook', serif;">Century Schoolbook</option>
            <option value="Arial Rounded MT Bold" style="font-family: 'Arial Rounded MT Bold', sans-serif;">Arial Rounded MT Bold</option>
            <option value="Rockwell" style="font-family: Rockwell, serif;">Rockwell</option>
        </select>

        <label for="textSize">Font Size:</label>
        <input type="range" id="textSize" min="1" max="100" step="1" value="20">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#savedesign">
          Save design & Proceed 
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-right-line-filled" width="19" height="19" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M12.089 3.634a2 2 0 0 0 -1.089 1.78l-.001 2.586h-4.999a1 1 0 0 0 -1 1v6l.007 .117a1 1 0 0 0 .993 .883l4.999 -.001l.001 2.587a2 2 0 0 0 3.414 1.414l6.586 -6.586a2 2 0 0 0 0 -2.828l-6.586 -6.586a2 2 0 0 0 -2.18 -.434l-.145 .068z" stroke-width="0" fill="currentColor"></path>
             <path d="M3 8a1 1 0 0 1 .993 .883l.007 .117v6a1 1 0 0 1 -1.993 .117l-.007 -.117v-6a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path>
          </svg> 
        </button>
        
        <!-- Modal -->
        <div class="modal fade-4" id="savedesign" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog ">
                    <div class="modal-content p-3">
                        <h5 class="border-bottom pb-3"> Submit Print...</h5>
                        <p class="mt-3 mb-3">Continuing with these changes will change the price. Do you want to continue saving?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn  btn-dark rounded-3 shadow-none btn-sm ps-3 pe-3 pt-2 pb-2" id="upload-design" name="add-facalities">SUBMIT</button>
                        </div>
                    </div>
            </div>
        </div>

    </div>

    <div>
        <input type="file" id="tshirt-custompicture" accept="image/*" style="display:none;">
        <button id="add-image" class="btn btn-success ps-4 pe-4 me-4">Add Image</button>
    
        <label for="imgsize">image Size:</label>
        <input type="range" id="imgsize" min="1" max="100" step="1" value="20">   

        <label for="angleControl" class="ms-4">Angle:</label>
        <input type="range" id="angleControl" min="0" max="360" step="1" value="0" >

        <img src="icons/top.png" width="28" height="28" id="bring-to-top-button" class="me-3 ms-4">
        <img src="icons/bottom.png" width="28" height="28" id="send-to-bottom-button">
    </div>

    <div class="mt-4 d-flex justify-content-end mb-4">
        <button id="delete-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 7l16 0"></path>
                <path d="M10 11l0 6"></path>
                <path d="M14 11l0 6"></path>
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
            </svg>
        </button>
    </div>

    <div class="mb-5">
        <div style="display:none;" id="locationbtn">
            <button id="showFront" class="btn btn-info button frontbtn">front</button>
            <button id="showBack" class="btn btn-info button">back</button>
        </div>
    </div>

    <div class="d-flex justify-content-center mb-5">
        <div class="row me-5 pe-5">
            <div class="col-lg-6">
                <div class="col-lg-12 " id="frontTShirt">
                    <div id="main-tshirt-box-front" class="tshirt-container">
                        <img class="tshirt-image" id="tshirt-image-front" src="" alt="">
                        <div id="drawing-container-front" class="drawing-area">
                            <div class="canvas-box">
                                <canvas id="canva-front-box" class="" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 " id="backTShirt">
                    <div id="main-tshirt-box-back" class="tshirt-container">
                        <img class="tshirt-image" id="tshirt-image-back" src="" alt="">
                        <div id="drawing-container-back" class="drawing-area">
                            <div class="canvas-box">
                                <canvas id="canva-back-box" class="" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
        <div class="col-lg-3 p-2 bg-light image-plate d-flex justify-content-center">
            <div id="image-gallery">
            <?php
                $sql_img = "SELECT * FROM images ";
                $result_img = mysqli_query($conn, $sql_img);

                if (mysqli_num_rows($result_img) > 0) {
                while ($rows = mysqli_fetch_assoc($result_img)) {
            ?>
                    <img src="object_img/<?php echo $rows['image'] ?>" alt="Image 2" width="130" height="130" class="me-1 mb-2">
<?php
                }
            }
            ?>
            </div>
        </div>
    </div>

    <div class="ms-5 ps-5 mb-5 pb-5">
        <button id="preview-button" class="btn button">Preview</button>
        <button id="Design-button" class="btn button button_D">Design</button>
    </div>
</div>

<?php include('fabric.php') ?>


    </body>
</html>




