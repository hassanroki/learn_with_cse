<?php
// Header
include_once('include/header.php');
?>

<?php
// Connect Query Used Function
require_once('include/function.php');

// Semester Table Data Website Showing
$semesterList = showDataAnyTable('semester');

// Subjects Table Data Showing
$subjectList = showDataAnyTable('subjects');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <h3 class="text-center">Select Semester & Subject</h3>
    <hr>
    <form action="markEntryActions.php" class="form" method="post">
        <table class="table table-bordered box-shadow submit-button">
            <tbody>
                <tr>
                    <td>
                        <label for="semesterId" class="form-label">Semester</label>
                    </td>
                    <td>
                        <select name="semesterId" id="semesterId" class="form-control">
                            <option value="">Select Semester</option>
                            <?php
                            while ($data = $semesterList->fetch_object()) {
                            ?>
                                <option value="<?php echo $data->id; ?>"><?php echo $data->semester; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="subjectId" class="form-label">Subject</label>
                    </td>
                    <td>
                        <select name="subjectId" id="subjectId" class="form-control">
                            <option value="">Select Subject</option>
                            <?php
                            while ($data = $subjectList->fetch_object()) {
                            ?>
                                <option value="<?php echo $data->id; ?>"><?php echo $data->courseTitle; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-end">
                        <input type="submit" value="Submit" name="">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
