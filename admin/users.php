<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
    //Users Table Data Website Showing
        $selectData = "SELECT * FROM users ORDER BY name ASC";
        $result = $conn -> query($selectData);
?>

<!-- Html -->
<div class="col-md-9 ps-3 overflow-hidden">
    <a href="usersAdd.php" class="btn btn-info">+ Add New Users</a>
    <hr>
    <div class="class-table">
        <h4 class="text-center">All Users List</h4>
        <?php
            if( isset( $_SESSION['insert_data'] ) ) {
                ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $_SESSION['insert_data']; ?>
                    </div>
                <?php
            }
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Id</th>
                    <th>Roles Id</th>
                    <th>Users Name</th>
                    <th>Password</th>
                </tr>
            </thead>
            <?php
                $i = 0;
                if( $result -> num_rows > 0 ) {
                    while( $row = $result -> fetch_assoc() ) {
                        $i++;
                        ?>
            <tbody>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['roles_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
            </tbody>
            <?php
                    }
                }
            ?>
        </table>
    </div>
</div>

<?php
// Header
include_once('include/footer.php');
?>

<?php
    // Session Unset
    unset( $_SESSION['insert_data'] );
?>