<?php
$conn = mysqli_connect("localhost", "root", "", "pixel_print");
session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:SignUp.php");
        exit();
    }else{
        $id = $_SESSION['id'];
        $user = mysqli_fetch_assoc(mysqli_query($conn,"select name from sign_up where id = {$id}"));
        
    }
?>

<?php include("links.php") ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid p-3" style="background-color:#370048;">
            <h3 class="mb-0 h-font colorr mt-1 ms-4 ps-3 fs-3 text-white">PIXEL PRINT</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>
                    </ul>
                    <h6 class="text-white pe-4"><?php echo $user["name"];  ?></h6>
                    <a href="logout.php" class="text-decoration-none text-white btn btn-sm btn-danger">LOG OUT</a>
                </div>
        </div>
    </nav>
