var index = {
    change_status:function (id, obj) {
        var is_active = 0;
        if ($(obj).is(':checked')) {
            is_active = 1;
        }
        $.ajax({
            url:laroute.route('admin.agency.change-status'),
            method:'POST',
            dataType:'JSON',
            data:{
                id:id,
                is_active:is_active
            },
            success:function () {
                swal.fire('Thay đổi trạng thái thành công', "", "success")
            }
        })
    },
    remove:function (id) {
        // $.getJSON('/admin/lang-country', function (json) {
        swal.fire({
            title:  'Bạn có muốn xóa đại lý không?',
            buttonsStyling: false,
            showCloseButton: true,
            html: 'Khi đại lý bị xóa, bạn sẽ không thể khôi phục lại được.' +
                "<br>" +
                'Bạn có chắc chắn muốn xóa đại lý này không?',
            type: "danger",

            confirmButtonText: 'Đồng ý xóa',
            confirmButtonClass: "btn btn-sm btn-default btn-bold",

            showCancelButton: true,
            cancelButtonText: 'Không xóa',
            cancelButtonClass: "btn btn-sm btn-bold btn-brand"
        }).then(function (result) {
            if (result.value) {
                if (result.value) {
                    $.ajax({
                        url: laroute.route('admin.agency.destroy'),
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            id: id
                        },
                        success: function (res) {
                            if (!res.error) {
                                swal.fire('Xóa thành công', "", "success").then(function (result) {
                                    if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                        window.location.reload();
                                    }
                                    if (result.value == true) {
                                        window.location.reload();
                                    }
                                });
                            }
                        }
                    });
                }
            }
        });
        // });
    }
};

var create = {
    _init: function () {
    },
    submit_load: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    name_vi: {
                        required: true,
                        maxlength: 255
                    },
                    name_en: {
                        required: true,
                        maxlength: 255
                    },
                },
                messages: {
                    name_vi: {
                        required: json.agency.name_vi_required,
                        maxlength: json.agency.name_vi_max
                    },
                    name_en: {
                        required: json.agency.name_en_required,
                        maxlength: json.agency.name_en_max
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.agency.store'),
                method:'POST',
                dataType:'JSON',
                data:{
                    name_vi: $('#name_vi').val(),
                    name_en: $('#name_en').val(),
                    image_logo: $('#image_logo').val(),
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(json.agency.success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.reload();
                            }
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire(json.agency.fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.agency.fail, mess_error, "error");
                }
            });

        });
    },
    submit_close:function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    name_vi: {
                        required: true,
                        maxlength: 255
                    },
                    name_en: {
                        required: true,
                        maxlength: 255
                    },
                },
                messages: {
                    name_vi: {
                        required: json.agency.name_vi_required,
                        maxlength: json.agency.name_vi_max
                    },
                    name_en: {
                        required: json.agency.name_en_required,
                        maxlength: json.agency.name_en_max
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.agency.store'),
                method:'POST',
                dataType:'JSON',
                data:{
                    name_vi: $('#name_vi').val(),
                    name_en: $('#name_en').val(),
                    image_logo: $('#image_logo').val(),
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(json.agency.success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.agency');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.agency');
                            }
                        });
                    } else {
                        swal.fire(json.agency.fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.agency.fail, mess_error, "error");
                }
            });

        });
    }
};

var update = {
    _init:function () {
    },
    submit:function (id) {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-update');

            form.validate({
                rules: {
                    name_vi: {
                        required: true,
                        maxlength: 255
                    },
                    name_en: {
                        required: true,
                        maxlength: 255
                    },
                },
                messages: {
                    name_vi: {
                        required: json.agency.name_vi_required,
                        maxlength: json.agency.name_vi_max
                    },
                    name_en: {
                        required: json.agency.name_en_required,
                        maxlength: json.agency.name_en_max
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            var is_active = 0;
            if ($('#is_active').is(':checked')) {
                is_active = 1;
            }

            $.ajax({
                url: laroute.route('admin.agency.update'),
                method:'POST',
                dataType:'JSON',
                data:{
                    name_vi: $('#name_vi').val(),
                    name_en: $('#name_en').val(),
                    image_logo: $('#image_logo').val(),
                    is_active: is_active,
                    id: id
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(json.agency.update_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.agency');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.agency');
                            }
                        });
                    } else {
                        swal.fire(json.agency.update_fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.agency.update_fail, mess_error, "error");
                }
            });

        });
    }
}

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
                url: laroute.route("admin.agency.upload"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#image_logo').val(res.file);
                    }
                }
            });
        }
    }
}