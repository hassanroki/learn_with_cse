<?php
// Session Start
session_start();

// LogOut
if (!isset($_SESSION['name'])) {
    header('location: login.php');
}

// Condition
if( $_SESSION['roles_id'] != 4 && $_SESSION['roles_id'] != 3 && $_SESSION['roles_id'] != 2 ) {
    header('location: notAuthorize.php');
}
?>

<?php
// Connect DB
require('admin/include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
// Students Table Data Count
$dataCount = "SELECT count(id) as total FROM students";
$countResult = $conn->query($dataCount);
$data = $countResult->fetch_assoc();
//echo $data['total'];

// Page Setup Condition
$page = 1;
$skip = 0;
$take = 3;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $skip = ($page - 1) * $take;
}

// Calculate Page
$totalPage = ceil($data['total'] / $take);

// Students Table Data Web Site Showing
$selectSql = "SELECT * FROM students
ORDER BY id DESC
LIMIT $skip, $take";
$result = $conn->query($selectSql);
?>

<!-- Html -->
<div class="teacher student flex-wrap">
    <div class="container">
        <div class="row">
            <div class="shadow-custom">
                <h4 class="text-center">All Students List</h4>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Student Name</th>
                            <th>Class Name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['studentName']; ?></td>
                                    <td><?php echo $row['className']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td>
                                        <?php
                                            if( $_SESSION['roles_id'] = 2 ) {
                                                ?>
                                                <a href="studentsView.php?id=<?php echo $row['id']; ?>" class="btn btn-info text-white">Details</a>
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
<div class="pagination pb-3">
    <div class="container">
        <div class="row">
            <div class="alert">
                <strong>Current Page <?php echo $page; ?></strong> of <?php echo $totalPage; ?> Pages
            </div>
            <div class="col-md-3 py-3">
                <?php
                if ($page > 1) {
                ?>
                    <a href="students.php?page=<?php echo $page - 1; ?>" class="btn btn-info">
                        << Previous </a>
                        <?php
                    }
                        ?>
            </div>
            <div class="col-md-6 py-3">
                <?php
                for( $i = 1; $i <= $totalPage; $i++ ) {
                    ?>
                    <a href="students.php?page=<?php echo $i; ?>" class="btn btn-info"><?php echo $i; ?></a>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-3 py-3 text-end">
                <?php
                if ($totalPage > $page) {
                ?>
                    <a href="students.php?page=<?php echo $page + 1; ?>" class="btn btn-info"> Next>> </a>
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