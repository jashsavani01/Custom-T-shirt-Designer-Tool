<?php
$con = mysqli_connect("localhost", "root", "", "pixel_print") or die("connection failed");

$designs="";

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']); // Escape user input
    $sql = "DELETE FROM add_cart WHERE id = {$id}";
    if (mysqli_query($con, $sql)) {
        $status = 1;
    } else {
        $status = 0;
    }
    echo $status;
}

if (isset($_POST['designid'])) {
    $did = mysqli_real_escape_string($con, $_POST['designid']); // Escape user input
    $sql1 = "SELECT canvas_front, canvas_back FROM custom_tshirts WHERE design_id = {$did}";

    $result = mysqli_query($con, $sql1);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $canvas_front = $row['canvas_front'];
            $canvas_back = $row['canvas_back'];

            $designs .= "
            <div class='d-flex justify-content-center p-2 shadow-lg border bg-light'>
                <div class='me-3'>
                    " . ($canvas_front === "undefined" ? "<img src='{$canvas_front}' style='display:none;'>" : "<img src='{$canvas_front}'>") . "
                </div>
                <div class=''>
                " . ($canvas_back === "undefined" ? "<img src='{$canvas_back}' style='display:none;'>" : "<img src='{$canvas_back}'>") . "
                </div>
            </div>
        ";
        
        }
    }
    echo $designs;
}

?>
