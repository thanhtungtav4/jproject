var index = {
    change_status:function (id, obj) {
        var is_active = 0;
        if ($(obj).is(':checked')) {
            is_active = 1;
        }
        $.ajax({
            url:laroute.route('admin.faq.change-status'),
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
            title:  'Bạn có muốn xóa câu hỏi thường gặp không?',
            buttonsStyling: false,
            showCloseButton: true,
            html: 'Khi câu hỏi thường gặp bị xóa, bạn sẽ không thể khôi phục lại được.' +
                "<br>" +
                'Bạn có chắc chắn muốn xóa câu hỏi thường gặp này không?',
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
                        url: laroute.route('admin.faq.destroy'),
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
        $('#question_vi').summernote({
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
        $('#question_en').summernote({
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
        $('#answer_vi').summernote({
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
        $('#answer_en').summernote({
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
                    question_vi: {
                        required: true,
                    },
                    question_en: {
                        required: true,
                    },
                    answer_vi: 'required',
                    answer_en: 'required',
                    faq_order:{
                        required:true,
                        maxlength: 4,
                        number:true
                    }
                },
                messages: {
                    question_vi: {
                        required: json.faq.question_vi_required
                    },
                    question_en: {
                        required: json.faq.question_en_required
                    },
                    answer_vi: {
                        required: json.faq.answer_vi_required
                    },
                    answer_en: {
                        required: json.faq.answer_en_required
                    },
                    faq_order: {
                        required: json.faq.faq_order_required,
                        maxlength: json.faq.faq_order_max,
                        number: json.faq.faq_order_number,
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.faq.store'),
                method:'POST',
                dataType:'JSON',
                data:{
                    question_vi: $('#question_vi').val(),
                    question_en: $('#question_en').val(),
                    answer_vi: $('#answer_vi').val(),
                    answer_en: $('#answer_en').val(),
                    faq_order: $('#faq_order').val(),
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(json.faq.success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.reload();
                            }
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire(json.faq.fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.faq.fail, mess_error, "error");
                }
            });

        });
    },
    submit_close:function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    question_vi: {
                        required: true,
                    },
                    question_en: {
                        required: true,
                    },
                    answer_vi: 'required',
                    answer_en: 'required',
                    faq_order:{
                        required:true,
                        maxlength: 4,
                        number:true
                    }
                },
                messages: {
                    question_vi: {
                        required: json.faq.question_vi_required
                    },
                    question_en: {
                        required: json.faq.question_en_required
                    },
                    answer_vi: {
                        required: json.faq.answer_vi_required
                    },
                    answer_en: {
                        required: json.faq.answer_en_required
                    },
                    faq_order: {
                        required: json.faq.faq_order_required,
                        maxlength: json.faq.faq_order_max,
                        number: json.faq.faq_order_number,
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.faq.store'),
                method:'POST',
                dataType:'JSON',
                data:{
                    question_vi: $('#question_vi').val(),
                    question_en: $('#question_en').val(),
                    answer_vi: $('#answer_vi').val(),
                    answer_en: $('#answer_en').val(),
                    faq_order: $('#faq_order').val(),
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(json.faq.success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.faq');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.faq');
                            }
                        });
                    } else {
                        swal.fire(json.faq.fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.faq.fail, mess_error, "error");
                }
            });

        });
    }
};

var update = {
    _init:function () {
        $('#question_vi').summernote({
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
        $('#question_en').summernote({
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
        $('#answer_vi').summernote({
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
        $('#answer_en').summernote({
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
    submit:function (id) {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-update');

            form.validate({
                rules: {
                    question_vi: {
                        required: true,
                    },
                    question_en: {
                        required: true,
                    },
                    answer_vi: 'required',
                    answer_en: 'required',
                    faq_order:{
                        required:true,
                        maxlength: 4,
                        number:true
                    }
                },
                messages: {
                    question_vi: {
                        required: json.faq.question_vi_required
                    },
                    question_en: {
                        required: json.faq.question_en_required
                    },
                    answer_vi: {
                        required: json.faq.answer_vi_required
                    },
                    answer_en: {
                        required: json.faq.answer_en_required
                    },
                    faq_order: {
                        required: json.faq.faq_order_required,
                        maxlength: json.faq.faq_order_max,
                        number: json.faq.faq_order_number,
                    }
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
                url: laroute.route('admin.faq.update'),
                method:'POST',
                dataType:'JSON',
                data:{
                    question_vi: $('#question_vi').val(),
                    question_en: $('#question_en').val(),
                    answer_vi: $('#answer_vi').val(),
                    answer_en: $('#answer_en').val(),
                    faq_order: $('#faq_order').val(),
                    is_active: is_active,
                    id: id
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(json.faq.update_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.faq');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.faq');
                            }
                        });
                    } else {
                        swal.fire(json.faq.update_fail, '', "error");
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(json.faq.update_fail, mess_error, "error");
                }
            });

        });
    }
}
