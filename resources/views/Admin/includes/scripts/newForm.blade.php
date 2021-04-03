<script>
    function newAddFunction(name) {
        save_method = 'add';

        $('#save').text('حفظ');

        $('#modelTitle'+name).text($('#titleOf'+name).text());

        $('#form'+name)[0].reset();

        $('#modal'+name).modal();
    }
</script>



<script>
    function newSaveOrUpdate(url,name) {
        $("#save"+name).attr("disabled", true);

        Toset('الطلب قيد التتنفيد', 'info', 'يتم تنفيذ طلبك الان', false);
        var id = $('#id').val();

        var formData = new FormData($('#form'+name)[0]);

        $.ajax({
            url: url,
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status == 1) {

                    $("#save"+name).attr("disabled", true);

                    $.toast().reset('all');
                    swal(data.message, {
                        icon: "success",
                    });
                    table.ajax.reload();
                    $('#modal'+name).modal('toggle');
                    $("#save"+name).attr("disabled", false);
                    $('#err'+name).slideUp(200);
                }
            },
            error: function (y) {
                var error = y.responseJSON.errors;
                $('#err'+name).empty();
                $.toast().reset('all');
                for (var i in error) {
                    for (var k in error[i]) {
                        var message = error[i][k];
                        $('#err').append("<li style='color:red'>" + message + "</li>");
                    }
                }
                $("#save"+name).attr("disabled", false);
                $('#err'+name).slideDown(200);
            }
        });
    }
</script>
