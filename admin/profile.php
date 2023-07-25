<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
    // Admin Data Website Showing
    $data = [];
    if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
        $id = $_GET['id'];
        $selectSql = "SELECT * FROM admin WHERE id = '$id'";
        $result = $conn -> query( $selectSql );
        if( $result -> num_rows == 1 ) {
            $data = $result -> fetch_object();
        }
    }
?>

<!-- Html -->
<div class="col-md-9 ps-3 class-table">
    <img src="<?php echo $data -> profilePhoto; ?>" alt="profile" class="img-fluid rounded">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Admin Name</th>
                <td><?php echo $data -> adminName; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $data -> email; ?></td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?php echo $data -> contact; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $data -> address; ?></td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<?php
// Footer
include_once('include/footer.php');
?>