<?php 
  $conn = mysqli_connect('localhost','root','','pixel_print') or die('connection faild');
  $id = $_POST['userid'];

  $sql = "select * from add_cart where user_id = {$id} ORDER BY id DESC";
  $result = mysqli_query($conn,$sql);
  $output="";
  $num ="";
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $front = $row['front'];
        $back = $row['back'];
        $innerResult = ""; // Use a different variable for the inner calculation

        if (strlen($front) > 39) {
            $innerResult = $front;
        } elseif (strlen($back) > 10) {
            $innerResult = $back;
        } else {
            $innerResult = $front;
        }

            $output .= "
            <div class='p-1 d-flex main-boxs border'>
            <div class='col-lg-3 d-flex flex-column'>
               <img src='{$innerResult}' width='182' height='179' id='design'>
               <div class='btn-primary text-danger cursor-pointer justify-content-center d-flex' role='button'  data-bs-toggle='modal' data-bs-target='#staticBackdrop' data-element-id='{$row['design_id']}'>Show Design</div>
            </div>
            
            <div class='col-lg-9 p-3 '>
                 <h5 style='font-size:18px; margin-bottom:12px;' class='color'>Custom T-shirts</h5>
                 <div class='d-flex justify-content-between'>
                     <h7 style='color:rgba(145,145,145); font-size:14px;'>Quantity : {$row['quantity']}</h7>
                     <div class='delete-btn' data-id={$row['id']}>
                         <span class='text-end text-danger'>Remove Item
                             <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash-filled' width='19' height='19' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                                <path d='M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z' stroke-width='0' fill='currentColor'></path>
                                <path d='M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z' stroke-width='0' fill='currentColor'></path>
                             </svg>
                         </span>
                     </div>
                 </div>
                 <div class='mt-3 w-100 mb-2'>
                     <div class='select-menu'>
                         <div class='select-btn d-flex justify-content-between'>
                            <h5 style='font-size:18px; margin-bottom:12px;' class='sBtn-text color'>Product Specifications</h5>
                            <svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='angle-down' class='svg-inline--fa fa-angle-down fa-w-10 ' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' style='width: 10px; margin-top: 5px; color: rgb(57, 66, 78);'>
                                <path fill='currentColor' d='M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z'></path>
                            </svg>
                         </div>
                         <div class='options' id='tshirt-type'>
                             <div class='option select-product'>
                                 <div class='d-flex mt-4 pt-1 w-100'>
                                     <div class='col-lg-5'>
                                        <h6 class='mb-3' style='color:rgba(158,158,159); font-size:15px;'>Style</h6>
                                        <h6 class='mb-3' style='color:rgba(158,158,159); font-size:15px;'>Print Type</h6>
                                        <h6 class='mb-3' style='color:rgba(158,158,159); font-size:15px;'>Material</h6>
                                        <h6 class='mb-3' style='color:rgba(158,158,159); font-size:15px;'>Fabric Colour</h6>
                                     </div>
                                     <div class='col-lg-7 color'>
                                        <h6 class='mb-3' id='type'>{$row['type']}</h6>
                                        <h6 class='mb-3'>Full Colour Print (Print and Cut)</h6>
                                        <h6 class='mb-3' id='material'>{$row['material']}</h6>
                                        <h6 class='mb-3' id='color'>{$row['color']} </h6>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class='d-flex justify-content-between mt-2 pt-3' style='border-top:2px solid rgb(239, 241, 242);'>
                     <p style='font-size:17px; font-weight:700;' class='color'>Item Total</p>
                     <input type='hidden' value='{$row['total_price']}' class='total_price'>
                     <p style='font-size:16px; font-weight:700;' class='color' >{$row['total_price']} </p>
                 </div>
            </div>
        </div>
            ";
        } 
                 

   if(isset($_POST['userid'])){
    $usid = $_POST['userid'];

    $sql1 = "select total_price from add_cart where user_id = {$usid}";
    $result1 = mysqli_query($conn,$sql1);
    $total = 0;
    if (mysqli_num_rows($result1) > 0) {
      while ($row = mysqli_fetch_assoc($result1)) {
        $total += $row['total_price'];
   }

         $num = mysqli_num_rows($result);
         $response = array('output' => $output, 'num' => $num , "total" => $total);
         echo json_encode($response);
    }
  }
}
?>

