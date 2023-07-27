// Mark Entry File Start

    //Mark Entry File Start
    $(document).ready(function() {
        $("#semesterId").on('change', function() {
            let semesterId = $(this).val();

            $.ajax({
                url: "include/subjectList.php",
                method: "post",
                data: {
                    semesterId: semesterId
                },
                success: function(response) {
                    $("#subjectId").html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });