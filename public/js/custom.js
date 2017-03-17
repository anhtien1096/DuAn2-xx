jQuery(document).ready(function ($) {
    if ($('#list').length) {
        $('#list').dataTable({
            /** Option cho list */
        });
    }
})

var deleter = {

        linkSelector : "a.delete",

        init: function() {
            $(this.linkSelector).on('click', {self:this}, this.handleClick);
        },

        handleClick: function(event) {
            event.preventDefault();

            var self = event.data.self;
            var link = $(this);

            swal({
                title: "Xác nhận xóa",
                text: "Nếu bạn xác nhận xóa bạn sẽ không thể khôi phục lại?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Xóa vĩnh viễn",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                   // window.location = link.attr('href');

                    $.ajax({
                        url: link.attr('href'),
                        type: 'DELETE',
                        data: {
                            _token: window.Laravel.csrfToken,
                            _method: 'DELETE',
                        }
                    }).done(function (data) {
                        if (data.results == true) {
                            swal(data.msg)
                            window.location.reload();
                        }
                    });
                }
                else{
                    swal("cancelled", "Category deletion Cancelled", "error");
                }
            });

        },
    };

    var yesok = {

        linkSelector : "a.yesok",

        init: function() {
            $(this.linkSelector).on('click', {self:this}, this.handleClick);
        },

        handleClick: function(event) {
            event.preventDefault();

            var self = event.data.self;
            var link = $(this);

            swal({
                title: "Xác nhận",
                text: "Bạn có chắc chắn muốn thực hiện hành động này?",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Tôi chắc chắn",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    $.ajax({
                        url: link.attr('href'),
                        type: 'GET',
                        data: {
                            _token: window.Laravel.csrfToken,
                            _method: 'GET',
                        }
                    }).done(function (data) {
                        if (data.results == true) {
                            window.location.reload();
                        }
                    });
                }
                else{
                    swal("cancelled", "Category deletion Cancelled", "error");
                }
            });

        },
    };

yesok.init();
deleter.init();


