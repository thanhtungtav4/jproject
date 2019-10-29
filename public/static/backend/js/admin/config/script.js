var update = {
    _init:function () {

    },
    submit:function (id,type) {
        $.getJSON('/admin/validation', function (json) {
            // var form = $('#form-update');
            //
            // form.validate({
            //     rules: {
            //         value_vi: {
            //             maxlength: 191
            //         },
            //         value_en: {
            //             maxlength: 255
            //         },
            //     },
            //     messages: {
            //         value_vi: {
            //             maxlength: json.config.value_vi_max,
            //         },
            //         value_en: {
            //             maxlength: json.config.value_en_max,
            //         },
            //     },
            // });
            //
            // if (!form.valid()) {
            //     return false;
            // }

            $.ajax({
                url: laroute.route('admin.config.update'),
                method:'POST',
                dataType:'JSON',
                data:{
                    value_vi: $('#value_vi').val(),
                    value_en: $('#value_en').val(),
                    logo: $('#logo').val(),
                    type: type,
                    id: id
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(json.config.update_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.config');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.config');
                            }
                        });
                    } else {
                        swal.fire(json.config.update_fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.config.update_fail, mess_error, "error");
                }
            });

        });
    }
};

function uploadAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#div-image').empty();
            var tpl = $('#image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#div-image').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFileImage').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        // img.src = window.URL.createObjectURL(file);
        //
        // img.onload = function () {
        //     var imageWidth = img.naturalWidth;
        //     var imageHeight = img.naturalHeight;
        //
        //     window.URL.revokeObjectURL(img.src);
        //
        //     $('.image-size').text(imageWidth + "x" + imageHeight + "px");
        //
        // };
        // $('.image-capacity').text(Math.round(fsize / 1024) + 'kb');
        //
        // $('.image-format').text(input.files[0].name.split('.').pop().toUpperCase());
        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.config.upload"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#logo').val(res.file);
                    }
                }
            });
        }
    }
}
