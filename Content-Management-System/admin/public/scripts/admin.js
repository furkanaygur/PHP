/**
 * @author      Tayfun Erbilen
 * @web         http://erbilen.net
 * @mail        tayfunerbilen@gmail.com
 */
$(function () {

    

    $('.box >h3').append('<button type="button" class="toggle"><span class="fa fa-caret-up"></span></button>');

    $(document).on('click', 'button.toggle', function (e) {
        var id = $(this).closest('.box').attr('id');
        $(this).parent().next().toggle();
        if ($('.fa', this).hasClass('fa-caret-up')) {
            $('.fa', this).removeClass('fa-caret-up').addClass('fa-caret-down');
            if (id != 'undefined') {
                localStorage.setItem('box_' + id, true);
            }
        } else {
            $('.fa', this).removeClass('fa-caret-down').addClass('fa-caret-up');
            if (id != 'undefined') {
                delete localStorage['box_' + id];
            }
        }
        e.preventDefault();
    });

    function checkToggle() {
        $.each(localStorage, function (key, val) {
            if (!key.indexOf('box_')) {
                $('#' + (key.replace('box_', '')) + ' .toggle').trigger('click');
            }
        });
    }

    checkToggle();

    $('.sidebar >ul >li:not(.line)').hover(function () {
        if (!$('.sub-menu:visible', this).length) {
            $('.dropdown-menu', this).show();
            $(this).addClass('hover');
        }
    }, function () {
        $('.dropdown-menu', this).hide();
        $(this).removeClass('hover');
    });

    $('[dropdown] >li').hover(function () {
        $('ul', this).show();
        $(this).addClass('active');
    }, function () {
        $('ul', this).hide();
        $(this).removeClass('active');
    });

    $('.sidebar >ul >li').each(function () {
        if ($('.sub-menu', this).length) {
            var html = $('.sub-menu', this).html();
            $(this).append('<ul dropdown class="dropdown-menu">' + html + '</ul>');
        }
    });

    $('.collapse-menu').on('click', function (e) {
        $('.sidebar').toggleClass('fix');
        if ($('.fa', this).hasClass('fa-arrow-circle-left')) {
            $('.sidebar >ul >li.active .sub-menu').hide();
            $('.fa', this).removeClass('fa-arrow-circle-left').addClass('fa-arrow-circle-right');
            localStorage.setItem('sidebar', true);
        } else {
            $('.fa', this).removeClass('fa-arrow-circle-right').addClass('fa-arrow-circle-left');
            $('.sidebar >ul >li.active .sub-menu').show();
            delete localStorage['sidebar'];
        }
        e.preventDefault();
    });
    function sidebarCheck() {
        if (localStorage.getItem('sidebar')) {
            $('.sidebar .collapse-menu').trigger('click');
        }
    }

    sidebarCheck();

    if ($('#editor').length) {
        CKEDITOR.replace('editor');
    }
    
    $('.menu').sortable({
        handle:function(){},
        start: function(e, ui){
            ui.placeholder.height(ui.item.height());
        },
        update: function(){
            $('#menu >li ').each(function () {
                var subMenu = $('li', this);
                if(subMenu.length){
                    var index = $(this).index();
                    subMenu.each(function(){
                        $('input:eq(0)', this).attr('name','sub_title_'+index+'[]');
                        $('input:eq(1)', this).attr('name','sub_url_'+index+'[]');
                    })
                }
            })

        }
    });

    $('[tab]').each(function(){
        var tabList = $('[tab-list] li', this),
        tabContect = $('[tab-content]',this);
        tabList.filter(':first').addClass('active');
        tabContect.filter(':not(:first)').hide();
        tabList.on('click',function(e){
            var index = $(this).index();
            tabList.removeClass('active').filter(this).addClass('active');
            tabContect.hide().filter(':eq('+index+')').fadeIn(300);

            e.preventDefault();
        });
    }); 


    $('.table-sortable').sortable({
        update: function(event, ui) {
            var postData = $(this).sortable('serialize');
            postData += '&table=' + $(this).data('table');
            postData += '&where=' + $(this).data('where');
            postData += '&column=' + $(this).data('column');
            $.post(api_url + '/table-sort', postData, function(response) {
                if(response.success){
                    $('.success-msg').show().find('>div').html(response.success);
                }
            }, 'json');
        }
    });

    $('.success-close-btn').on('click', function(e){
        $(this).parent().hide();
        e.preventDefault();
    });


    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

    tinymce.init({
        selector: 'textarea.editor',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        height:'350px',
        width: '500px',
        resize: 'both'
    });


    $('.tagsinput').tagsInput({
        'autocomplete': {
            source : tags
        }
    });

});