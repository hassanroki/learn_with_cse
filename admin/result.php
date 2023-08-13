<?php
    // Session Start
    session_start();

    // Connect DB
    require('include/connect.php');

    // Query Function
    require_once('include/function.php');

    // Header
    include_once('include/header.php');

    // Semester Table Semester Showing
    $semesters = showDataAnyTable('semesters');


?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <h2 class="text-center">Find Your Result</h2>
    <hr>

    <?php
        if( isset( $_SESSION['reg_exits'] ) ) {
            ?>
            <div class="alert-alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['reg_exits']; ?>
            </div>
            <?php
        }
    ?>

    <form action="resultSheets.php" class="from" method="post" class="form">
        <table class="table table-bordered box-shadow submit-button">
            <thead>
                <tr>
                    <th><label for="semesterId" class="form-label">Semester</label></th>
                    <td>
                        <select name="semesterId" id="semesterId" class="form-control">
                            <option value="">Select Semester</option>
                            <?php
                                while( $data = $semesters -> fetch_object() ) {
                                    ?>
                                    <option value="<?php echo $data -> id; ?>"><?php echo $data -> name; ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><label for="studentReg" class="form-label">Student Registration</label></th>
                    <td><input type="number" name="studentReg" id="studentReg" class="form-control" placeholder="Enter Registration"></td>
                </tr>
                <tr>
                <td colspan="3" class="text-end"><input type="submit" value="Result" name="result"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php
    // Footer
    include_once('include/footer.php');

    // Unset
    unset( $_SESSION['reg_exits'] );