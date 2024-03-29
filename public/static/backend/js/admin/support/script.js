var index = {
    change_status: function (id, obj) {
        var is_active = 0;
        if ($(obj).is(':checked')) {
            is_active = 1;
        }
        $.ajax({
            url: laroute.route('admin.support.change-status'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                is_active: is_active
            },
            success: function () {
                swal.fire('Thay đổi trạng thái thành công', "", "success")
            }
        })
    },
    remove: function (id) {
        // $.getJSON('/admin/lang-country', function (json) {
        swal.fire({
            title: 'Bạn có muốn xóa tin tức không?',
            buttonsStyling: false,
            showCloseButton: true,
            html: 'Khi hỗ trợ bị xóa, bạn sẽ không thể khôi phục lại được.' +
                "<br>" +
                'Bạn có chắc chắn muốn xóa hỗ trợ này không?',
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
                        url: laroute.route('admin.support.destroy'),
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
        $('#content_vi').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });
        $('#content_en').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });
    },
    submit_load: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    title_vi: {
                        required: true,
                        maxlength: 255
                    },
                    title_en: {
                        required: true,
                        maxlength: 255
                    },
                    content_vi: 'required',
                    content_en: 'required',
                    description_vn: {
                        maxlength: 255
                    },
                    description_en: {
                        maxlength: 255
                    },
                },
                messages: {
                    title_vi: {
                        required: json.support.title_vn_required,
                        maxlength: json.support.title_vn_max
                    },
                    title_en: {
                        required: json.support.title_en_required,
                        maxlength: json.support.title_en_max
                    },
                    content_vi: {
                        required: json.support.content_vn_required
                    },
                    content_en: {
                        required: json.support.content_en_required
                    },
                    description_vn: {
                        maxlength: json.support.description_vn_max
                    },
                    description_en: {
                        maxlength: json.support.description_en_max
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.support.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    title_vi: $('#title_vi').val(),
                    title_en: $('#title_en').val(),
                    description_vi: $('#description_vi').val(),
                    description_en: $('#description_en').val(),
                    image_thumb: $('#image_thumb').val(),
                    content_vi: $('#content_vi').val(),
                    content_en: $('#content_en').val(),
                    news_status: $('input[name="news_status"]:checked').val(),
                    alias_vi: to_slug($('#title_vi').val()),
                    alias_en: to_slug($('#title_en').val())
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(json.support.success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.reload();
                            }
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire(json.support.fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.support.fail, mess_error, "error");
                }
            });

        });
    },
    submit_close: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    title_vi: {
                        required: true,
                        maxlength: 255
                    },
                    title_en: {
                        required: true,
                        maxlength: 255
                    },
                    content_vi: 'required',
                    content_en: 'required',
                    description_vn: {
                        maxlength: 255
                    },
                    description_en: {
                        maxlength: 255
                    },
                },
                messages: {
                    category_id: {
                        required: json.support.category_required,
                    },
                    title_vi: {
                        required: json.support.title_vn_required,
                        maxlength: json.support.title_vn_max
                    },
                    title_en: {
                        required: json.support.title_en_required,
                        maxlength: json.support.title_en_max
                    },
                    content_vi: {
                        required: json.support.content_vn_required
                    },
                    content_en: {
                        required: json.support.content_en_required
                    },
                    description_vn: {
                        maxlength: json.support.description_vn_max
                    },
                    description_en: {
                        maxlength: json.support.description_en_max
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.support.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    title_vi: $('#title_vi').val(),
                    title_en: $('#title_en').val(),
                    description_vi: $('#description_vi').val(),
                    description_en: $('#description_en').val(),
                    image_thumb: $('#image_thumb').val(),
                    content_vi: $('#content_vi').val(),
                    content_en: $('#content_en').val(),
                    news_status: $('input[name="news_status"]:checked').val(),
                    alias_vi: to_slug($('#title_vi').val()),
                    alias_en: to_slug($('#title_en').val())
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(json.support.success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.support');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.support');
                            }
                        });
                    } else {
                        swal.fire(json.support.fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.support.fail, mess_error, "error");
                }
            });

        });
    }
};

var update = {
    _init: function () {
        $('#content_vi').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });
        $('#content_en').summernote({
            // placeholder: 'Nhập nội dung',
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
            // onImageUpload: function(files, editor, welEditable) {
            //     sendFile(files[0], editor, welEditable);
            // }
        });
    },
    submit: function (id) {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-update');

            form.validate({
                rules: {
                    title_vi: {
                        required: true,
                        maxlength: 255
                    },
                    title_en: {
                        required: true,
                        maxlength: 255
                    },
                    content_vi: 'required',
                    content_en: 'required',
                    description_vn: {
                        maxlength: 255
                    },
                    description_en: {
                        maxlength: 255
                    },
                },
                messages: {
                    title_vi: {
                        required: json.blog.title_vn_required,
                        maxlength: json.blog.title_vn_max
                    },
                    title_en: {
                        required: json.blog.title_en_required,
                        maxlength: json.blog.title_en_max
                    },
                    content_vi: {
                        required: json.blog.content_vn_required
                    },
                    content_en: {
                        required: json.blog.content_en_required
                    },
                    description_vn: {
                        maxlength: json.blog.description_vn_max
                    },
                    description_en: {
                        maxlength: json.blog.description_en_max
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
                url: laroute.route('admin.support.update'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    title_vi: $('#title_vi').val(),
                    title_en: $('#title_en').val(),
                    description_vi: $('#description_vi').val(),
                    description_en: $('#description_en').val(),
                    image_thumb: $('#image_thumb').val(),
                    content_vi: $('#content_vi').val(),
                    content_en: $('#content_en').val(),
                    news_status: $('input[name="news_status"]:checked').val(),
                    id: id,
                    alias_vi: to_slug($('#title_vi').val()),
                    alias_en: to_slug($('#title_en').val()),
                    is_active: is_active
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(json.support.update_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.support');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.support');
                            }
                        });
                    } else {
                        swal.fire(json.support.update_fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.support.update_fail, mess_error, "error");
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
                url: laroute.route("admin.support.upload"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#image_thumb').val(res.file);
                    }
                }
            });
        }
    }
}

function to_slug(str)
{
    // Chuyển hết sang chữ thường
    str = str.toLowerCase();

    // xóa dấu
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    // Xóa ký tự đặc biệt
    str = str.replace(/([^0-9a-z-\s])/g, '');

    // Xóa khoảng trắng thay bằng ký tự -
    str = str.replace(/(\s+)/g, '-');

    // xóa phần dự - ở đầu
    str = str.replace(/^-+/g, '');

    // xóa phần dư - ở cuối
    str = str.replace(/-+$/g, '');

    // return
    return str;
}