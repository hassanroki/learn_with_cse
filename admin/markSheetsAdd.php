<?php
    // Header
    include_once('include/header.php');
?>

<!-- Html -->

<div class="col-md-9 ps-3">
    <a href="markSheets.php" class="btn btn-info">All MarkSheets</a>
    <h2 class="text-center">Add New MarkSheets</h2>
    <hr>
    <form action="markSheetsStore.php" class="form box-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="classId" class="form-label">Class Id</label>
            <input type="text" name="classId" id="classId" class="form-control" placeholder="Enter Class Id">
        </div>
        <div class="mt-3">
            <label for="studentId" class="form-label">Student Id</label>
            <input type="text" name="studentId" id="studentId" class="form-control" placeholder="Enter Student Id">
        </div>
        <div class="mt-3">
            <label for="studentReg" class="form-label">Student Registration</label>
            <input type="text" name="studentReg" id="studentReg" class="form-control" placeholder="Enter Student Registration">
        </div>
    </form>
</div>

<?php
    // Footer
    include_once('include/footer.php');