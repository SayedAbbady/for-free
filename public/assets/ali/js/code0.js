$(document).ready(function() {
    
    /**
     * Body Padding Top Like Navbar Inner Height
     */
    $('body').css('padding-top',$('.navbar').innerHeight());
    
    /**
     * Window Resize Event
     */
    $(window).resize(function () {
       //=============slider img height============// 
       $('.a div img').innerHeight($(window).height());
       //=============slider img height============// 
    });

    $('.b1').click(function () {
        $('.signup').fadeIn('slow');
        $('.login').hide();
        $('.nav-item').removeClass('active');
        $('.home').addClass('active');
    });
    $('.b2').click(function () {
        $('.signup').hide();
        $('.login').fadeIn('slow');
        $('.nav-item').removeClass('active');
        $('.home').addClass('active');
    });
    
    $('.home').click(function () {
        $('.b1').click();
    });
    /**
     * sections And Horisontal Scroll
     */

    $('#pagepiling').pagepiling({
        direction: 'horizontal',
        easing: 'swing',
        menu: null,
        anchors: ['home', 'learn', 'tutor'],
        navigation: {
            'textColor': '#000',
            'bulletsColor': '#000',
            'position': 'right',
            'tooltips': ['home', 'learn','tutor']
        },
        animateAnchor:true
    });

    $('.nav-item').click(function(){
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });

    /**
     * Main Slider
     */
    $(".t").owlCarousel({
        items:1,
        nav:false,
        animateIn: 'fadeInUp',
        animateOut: 'fadeOutDown',
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        dots:false,
        margin:50
        
    });
    $(".a").owlCarousel({
        items:1,
        nav:false,
        // animateIn: 'fadeIn',
        // animateOut: 'fadeOut',
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        dots:false
        
    });
    $('.a div img').innerHeight($(window).height());
    $('.owl-next').html('<i class="fa fa-chevron-right fa-2x"></i>');
    $('.owl-prev').html('<i class="fa fa-chevron-left fa-2x"></i>');
    


        /**
     * add and update data
     */

    record('.signup', 'signup');
    record('.login', 'login');
    record('.contact', 'contact');
    //  function run

    function record(form, page) {
        $(form).on('submit', function () {
           
            $.support.cors = true ;
            $.ajax({
                url: base_url + 'ajax/' + page,
                method: 'POST',
                dataType: 'JSON',
                // jsonpCallback: 'callbackFnc',
                data: new FormData(this),
                // async: false,
                crossDomain: true,
                contentType: false,
                processData: false,
                beforeSend:function (res) {
                     $.support.cors = true ;
                    $(form).fadeTo('slow',.5);
                },
                success: function (data) {
                    if(data.status == 1){
                        noti(data.message,'');
                        if(page == 'login'){
                            setTimeout(function () {
                                window.location = base_url+'user';
                            },2500);
                        }
                        if(page == 'signup'){
                            setTimeout(function () {
                                $('.b2').click();
                            },500);
                        }
                    }else{
                        noti(data.message,'');
                    }
                    $(form).fadeTo('slow',1);
                }
            });
            return false;
        });
    }



    /**
     * notify function
     */

    function noti(msg,alertType) {
        $.notify({
            // options
            icon: 'glyphicon glyphicon-warning-sign',
            title: '',
            message: msg,
        },{
            // settings
            element: 'body',
            position: null,
            type: alertType,
            allow_dismiss: true,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title"><b>{1}</b></span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });

    }


  


    
});

