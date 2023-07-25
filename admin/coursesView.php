<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header CSS Fonts
include_once('include/headerCssFonts.php');
?>

<?php
// Connect Function
require_once('include/function.php');
// Course Table Data View Web Site
$data = $category = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $result = selectAnyTableWhereId('courses', $id);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();

        // Categories Table Data Viewing
        $categoryId = $data->categoryId;
        $categoryResult = selectAnyTableWhereId('categories', $categoryId);
        $category = $categoryResult->fetch_object();
    }
}

if ($data == null) {
    header('location: courses.php');
}
?>

<!-- Html -->
<div class="courses-view">
    <div class="container">
        <div class="row">
            <a href="courses.php" class="btn btn-info my-5">All Course</a>
            <div class="card box-shadow">
                <img src="<?php echo $data->profilePhoto; ?>" class="card-img-top img-fluid rounded" alt="profilePhoto">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data->name; ?></h5>
                    <p class="card-text"><?php echo $data->description; ?></p>
                    <p class="card-text"><?php echo $category->name ?? ""; ?></p>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footerJs.php');
