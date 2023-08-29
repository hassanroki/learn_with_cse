<?php
// Session Start
session_start();

// Login 
if( !isset( $_SESSION['login_success'] ) ) {
    header('location: login.php');
}

// Connect Header
include_once('include/header.php');

// Connect Function
require_once('include/function.php');

$semester = showDataAnyTable('semesters');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <form action="groupResultSheets.php" class="form" method="post">

        <?php
            if( isset( $_SESSION['semester_exits'] ) ) {
                ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['semester_exits']; ?>
                </div>
                <?php
            }
        ?>

        <h2 class="text-center">Find Semester Result</h2>
        <hr>
        <table class="table table-striped submit-button">
            <tr>
                <th><label for="semesterId" class="form-label">Semester</label></th>
                <td>
                    <select name="semesterId" id="semesterId" class="form-control">
                        <option value="">Selected Semester</option>
                        <?php
                            while( $data = $semester->fetch_object() ){
                                ?>
                                <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>

                <td colspan="2">
                    <div class="mt-3 text-end"><input type="submit" value="Result" name="result"></div>
                </td>

            </tr>
        </table>
    </form>
</div>

<?php
// Connect Footer
include_once('include/footer.php');

// Unset Session
unset( $_SESSION['semester_exits'] );
