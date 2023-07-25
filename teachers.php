<?php
// Session Start
session_start();

// LogOut
if (!isset($_SESSION['name'])) {
    header('location: login.php');
}

// Condition
if ($_SESSION['roles_id'] != 4 && $_SESSION['roles_id'] != 3 && $_SESSION['roles_id'] != 2 ) {
    header('location: notAuthorize.php');
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
// page number count
$countSql = "SELECT count(id) as total FROM teachers";
$result2 = $conn->query($countSql);
$count = $result2->fetch_assoc();

// data website showing and order and limit
$skip = 0;
$take = 3;
$page = 1;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $skip = ($page - 1) * $take;
}
// calculate page
$totalPage = ceil($count['total'] / $take);

$selectSql = "SELECT * FROM teachers
    ORDER BY id 
    LIMIT $skip, $take
    ";
$result = $conn->query($selectSql);
?>

<!-- Html -->
<div class="teacher">
    <div class="container">
        <div class="row">
            <div class="col-md-12 box-shadow">
                <h4 class="text-center">All Teacher List</h4>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Teacher Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_object()) {
                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $data->id; ?></td>
                                    <td><?php echo $data->name; ?></td>
                                    <td><?php echo $data->designation; ?></td>
                                    <td><?php echo $data->department; ?></td>
                                    <td><?php echo $data->contact; ?></td>
                                    <td>
                                        <?php
                                        if ($_SESSION['roles_id'] == 3) {
                                        ?>
                                            <a href="teachersView.php?id=<?php echo $data->id; ?>" class="btn btn-info text-white">Details</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Pagination Start -->
<div class="next-previous pb-3">
    <div class="container">
        <div class="row">
            <div class="alert">
                <strong>Current Page <?php echo $page; ?></strong> of <?php echo $totalPage; ?> Pages
            </div>
            <div class="col-md-3 py-3">
                <?php
                if ($page > 1) {
                ?>
                    <a href="teachers.php?page=<?php echo $page - 1; ?>" class="btn btn-info">
                        << Previous</a>
                        <?php
                    }
                        ?>
            </div>
            <div class="col-md-6 py-3">
                <?php
                for ($i = 1; $i <= $totalPage; $i++) {
                ?>
                    <a href="teachers.php?page=<?php echo $i; ?>" class="btn btn-info"><?php echo $i; ?></a>
                <?php
                }
                ?>
            </div>
            <div class="col-md-3 py-3">
                <?php
                if ($totalPage > $page) {
                ?>
                    <a href="teachers.php?page=<?php echo $page + 1; ?>" class="btn btn-info">Next>></a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Pagination End -->

<?php
// Header
include_once('include/footer.php');
?>