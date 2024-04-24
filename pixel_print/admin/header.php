<?php include("../links.php") ?>
<style>
     #dashboard-menu{
       position: fixed;
       height: 100%;
     } 
     .navbar-color{
        background-color:#fffbff;
     }
     .nav-item:hover{
        border-right:4px solid #690089;
     }

</style>
</head>
<body>


<div class="container-fluid text-white p-3 d-flex align-items-center justify-content-between sticky-top" style="background-color:#370048;" id="header">
   <div class="d-flex ">
       <h3 class="mb-0 h-font colorr mt-1 ms-4 ps-3 fs-3">PIXEL PRINT</h3>
   </div>
       <!-- <a href="logout.php" class="btn btn-c btn-sm me-5 pe-3 ps-3">logout</a> -->
</div>

<div class="col-lg-2 border-top navbar-color" id="dashboard-menu">    
  <nav class="navbar navbar-expand-lg">
    <div class="w-100 flex-lg-column">
        <p class="mt-2  ps-5 mb-4 text-black fs-5 fw-bold">ADMIN PANEL</p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav nav-pills flex-column mt-2 "> 
           <li class="nav-item bg-white shadow-sm nav-item rounded-start-pill  ms-2 mb-3 pb-1 active ">
               <a class="nav-link text-decoration-none text-black h-pages" href="cart.php"><i class="fa-solid fa-gauge"></i><span class="fs-5 ms-1">Add Cart</span></a>
           </li>
           <li class="nav-item bg-white shadow-sm nav-item rounded-start-pill ms-2  mb-3 pb-1 active">
               <a class="nav-link text-decoration-none text-black h-pages" href="images.php"><i class="fa-solid fa-person-booth"></i><span class="fs-5 ms-1">Photos</span></a>
           </li>           
           <li class="nav-item bg-white shadow-sm nav-item rounded-start-pill ms-2  mb-3 pb-1 active">
               <a class="nav-link text-decoration-none text-black h-pages" href="images.php"><i class="fa-solid fa-radiation"></i><span class="fs-5 ms-1"> New User</span></a>
           </li>           
           <li class="nav-item bg-white shadow-sm nav-item rounded-start-pill ms-2  mb-3 pb-1 active">
               <a class="nav-link text-decoration-none text-black h-pages text-black" href="new_user.php"><i class="fa-solid fa-person-circle-question"></i><span class="fs-5 ms-1"> User-Querys</span></a>
           </li>                
        </ul>
      </div>
    </nav>
</div>



</body>
</html>