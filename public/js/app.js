$(function () {
    $('.nav-sidebar li:not(.has-treeview) > a').on('click', function () {
        $(this).addClass('active');
        // $(this).siblings('.treeview.active').find('> a').trigger('click');
        $(this).siblings().removeClass('active').find('li').removeClass('active');
        /* 
        var $parent = $(this).parent().addClass('active');
        $parent.siblings('.treeview.active').find('> a').trigger('click');
        $parent.siblings().removeClass('active').find('li').removeClass('active'); */
    });

    // $(window).on('load', function() {
    $('.nav-sidebar a').each(function () {
        if (window.location.href.indexOf(this.href) == 0) {
            $(this).addClass('active').closest('.has-treeview').addClass('menu-open')
                .children('a.nav-link').addClass('active');
            /* 
            $(this).parent().addClass('active')
            		.closest('.treeview-menu').addClass('.menu-open')
            		.closest('.treeview').addClass('active'); */
        }
    });
    // });

    $('#dialog').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var title = button.data('whatever');

        $(this).find('.modal-title').text(title);
    });

    $('.delete').click(function (e) {
        e.preventDefault();

        var href = $(this).attr('href');
        var $form = $('#delete-form').attr('action', href);

        $('#dialog').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var title = button.data('whatever');
            var message = '记录删除后不可恢复，请问确定删除该条记录吗？';
            var modal = $(this);

            modal.find('.modal-content').removeClass().addClass('modal-content bg-danger');
            modal.find('.modal-title').text(title);
            modal.find('.modal-body p').html(message);
        }).on('click', '#btn-confirmed', function () {
            $form.submit();
        });
    });

    $('.reset').click(function (e) {
        e.preventDefault();

        var href = $(this).attr('href');

        $('#dialog').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var title = button.data('whatever');
            var modal = $(this);

            modal.find('.modal-content').removeClass().addClass('modal-content bg-secondary');
            modal.find('.modal-title').text(title);
            modal.find('.modal-body').load(href);
        }).on('click', '#btn-confirmed', function () {
            $('#reset-form').submit();
        });
    });

    $('.import').click(function (e) {
        e.preventDefault();

        var href = $(this).attr('href');

        $('#dialog').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var title = button.data('whatever');
            var modal = $(this);

            modal.find('.modal-content').removeClass().addClass('modal-content bg-info');
            modal.find('.modal-title').text(title);
            modal.find('.modal-body').load(href, {
                action: href,
                accept: '.xlx,.xlsx,.csv'
            });
        }).on('click', '#btn-confirmed', function () {
            $('#import-form').submit();
        });
    });

    $('.datepicker').daterangepicker({
        autoApply: true,
        singleDatePicker: true,
        locale: {
            format: "YYYY-MM-DD",
            applyLabel: '确定',
            cancelLabel: '取消',
            daysOfWeek: [
                '日',
                '一',
                '二',
                '三',
                '四',
                '五',
                '六'
            ],
            monthNames: [
                '一月',
                '二月',
                '三月',
                '四月',
                '五月',
                '六月',
                '七月',
                '八月',
                '九月',
                '十月',
                '十一月',
                '十二月'
            ],
            firstDay: 1
        }
    });

    $('.select2').select2({
        // theme: 'bootstrap4'
    });
});
