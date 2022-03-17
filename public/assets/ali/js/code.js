$(document).ready(function() {

    /**
     * Body Padding Top Like Navbar Inner Height
     */
    // $('body').css('padding-top',$('.navbar').innerHeight());
    
    /**
     * Window Resize Event
     */
    $('.slider-content .owl-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    items: 1,
    smartSpeed: 1500,
    animateIn: 'zoomIn',
    animateOut: 'zoomOut'
  });
     
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
     * add and update data
     */
    // $('.signup').fadeOut();
    record('.signup', 'signup');
    record('.login', 'login');
    record('.contact', 'contact');
    //  function run

    $("#loginNew").click(function(){
        $("#clickMe").click();
    });

    function record(form, page) {
        $(form).on('submit', function () {
            // alert(46456);
            $.ajax({
                url: base_url + 'ajax/' + page,
                method: 'POST',
                dataType: "json",
                data: new FormData(this),
                contentType: false,
                processData: false,
                beforeSend:function () {
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

