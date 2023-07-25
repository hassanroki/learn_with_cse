<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
// Course Table Data Website Showing
$selectData = "SELECT * FROM courses";
$result = $conn->query($selectData);
?>

<!-- Html -->
<div class="courses">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <h4 class="text-center">All Courses</h4>
            <hr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 col-sm-12 p-3">

                        <div class="card">
                            <a href="coursesView.php?id=<?php echo $row['id']; ?>" class="text-warning stretched-link"></a>
                            <img src="upload/<?php echo $row['profilePhoto'] ?>" class="card-img-top img-fluid rounded" alt="profilePhoto">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $row['courseName']; ?></h2>
                                <p class="card-text"><?php echo substr($row['description'], 0, 150); ?></p>


                            </div>
                        </div>

                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');
?>