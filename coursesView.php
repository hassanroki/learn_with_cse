<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
// Course Table Data Website Viewing
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id'];
    $selectData = "SELECT * FROM courses WHERE id = '$id'";
    $result = $conn->query($selectData);
    if ($result->num_rows == 1) {
        $data = $result -> fetch_object();
    }
}
?>

<!-- Html -->
<div class="courses-view">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <h4 class="text-center"><?php echo $data -> courseName; ?></h4>
            <hr>
            <div class="col-md-12 col-sm-12 p-3">

                <div class="card">
                    <img src="upload/<?php echo $data -> profilePhoto; ?>" class="card-img-top img-fluid rounded" alt="profilePhoto">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $data -> courseName; ?></h2>
                        <p class="card-text"><?php echo $data -> description; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');
?>