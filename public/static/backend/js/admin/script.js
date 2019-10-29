var listAction = {
    add: function (page_id,plugin_id,type) {
        $.ajax({
            url: laroute.route('admin.map.add'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                page_id : page_id,
                plugin_id : plugin_id,
                type : type

            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    delete: function (page_id,plugin_id,type) {
        $.ajax({
            url: laroute.route('admin.map.delete'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                page_id : page_id,
                plugin_id : plugin_id,
                type : type
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

};

var plugin = {
    create:function () {

        $.ajax({
            url: laroute.route('admin.plugin.create.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#create-plugin').serialize(),
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    update:function () {
        $.ajax({
            url: laroute.route('admin.plugin.update.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#edit-plugin').serialize(),
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    delete:function (id) {
        $.ajax({
            url: laroute.route('admin.plugin.delete.post'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                id : id
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },
    change: function (id , value) {
        var is_active = 0;
        if ($(value).is(':checked')) {
            is_active = 1;
        }
        $.ajax({
            url: laroute.route('admin.plugin.changeStatus.post'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                id:id,
                is_active:is_active
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });

    }
};

var category = {
    create:function () {
        $.ajax({
            url: laroute.route('admin.category.create.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#create-category').serialize(),
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    update:function () {
        $.ajax({
            url: laroute.route('admin.category.edit.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#edit-category').serialize(),
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    delete:function (id) {
        $.ajax({
            url: laroute.route('admin.category.delete'),
            method: 'POST',
            dataType: 'JSON',
            data: { id : id },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

};

var pageAction = {
    create:function () {
        $.ajax({
            url: laroute.route('admin.page.create.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#create-page').serialize(),
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    update:function () {
        $.ajax({
            url: laroute.route('admin.page.edit.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#edit-page').serialize(),
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    delete:function (id) {
        $.ajax({
            url: laroute.route('admin.page.delete.post'),
            method: 'POST',
            dataType: 'JSON',
            data: { page_id : id },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    change: function (id , value) {
        var is_active = 0;
        if ($(value).is(':checked')) {
            is_active = 1;
        }
        $.ajax({
            url: laroute.route('admin.page.changeStatus.post'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                id:id,
                is_active:is_active
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });

    }

};

var productprice = {
    create:function () {
        $.ajax({
            url: laroute.route('admin.product.product-price.create.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#create-product-price').serialize(),
            success: function (res) {
                if (res.error === false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    update: function () {
        $.ajax({
            url: laroute.route('admin.product.product-price.update.post'),
            method: 'POST',
            dataType: 'JSON',
            data: $('#update-product-price').serialize(),
            success: function (res) {
                if (res.error === false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },

    change : function (id,type,value) {
        var is_active = 0;
        if ($(value).is(':checked')) {
            is_active = 1;
        }
        $.ajax({
            url: laroute.route('admin.product.product-price.change.post'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                id : id,
                type : type,
                value : is_active
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success").then(function () {
                        location.reload();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
        });
    },
};

var popup = {
    add: function (page_id,plugin_id,type) {
        $.ajax({
            url: laroute.route('admin.map.plugin.add'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                page_id : page_id,
                plugin_id : plugin_id,
                type : type

            },
            success: function (res) {
                $('#kt_modal_show_button_add').find('.modal-body .kt-scroll').html(res);
                $('#kt_modal_show_button_add').modal();
            },
        });
    },
}

function uploadAvatar(input)
{
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

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.plugin.upload.image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#plugin_image').val(res.file);
                    }
                }
            });
        }
    }
}
// solution
function uploadImageicon(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#div-image-icon').empty();
            var tpl = $('#image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#div-image-icon').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFileImageicon').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.plugin.upload.image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#icon_image').val(res.file);
                    }
                }
            });
        }
    }
}
function uploadImageicon2(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#div-image-icon2').empty();
            var tpl = $('#image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#div-image-icon2').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFileImageicon2').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.plugin.upload.image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#icon2_image').val(res.file);
                    }
                }
            });
        }
    }
}
function uploadImageicon3(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#div-image-icon3').empty();
            var tpl = $('#image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#div-image-icon3').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFileImageicon3').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.plugin.upload.image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#icon3_image').val(res.file);
                    }
                }
            });
        }
    }
}
// !solution
function uploadImagePage(input)
{
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

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.plugin.upload.image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#page_image').val(res.file);
                    }
                }
            });
        }
    }
}

function uploadImageSeo(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#div-image-seo').empty();
            var tpl = $('#image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#div-image-seo').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFileImageSeo').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.plugin.upload.image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#seo_image').val(res.file);
                    }
                }
            });
        }
    }
}

function uploadBackground(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#div-image-background').empty();
            var tpl = $('#image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#div-image-background').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFileBackground').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.page.upload.background"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#background').val(res.file);
                    }
                }
            });
        }
    }
}

function uploadImageProductPrice(input)
{
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

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.product.product-price.upload.image"),
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

