var open = 'no';
$('.lock').click(function () {
    if(open == 'ok'){
        open = 'no';
        $('.side-menu').animate({"left":"-250"},500);
        $(this).html('<i class="fa fa-chevron-right"></i>');
        $(this).animate({"left":"-65"},500);
    }else{
        open = 'ok';
        $(this).html('<i class="fa fa-times"></i>');
        $('.side-menu').animate({"left":"0"},500);
        $(this).animate({"left":"181"},500);

    }
    return false;
});

$('.search').click(function () {
    $('.serch-input').slideToggle(100);
    return false;
});








// / quiz
var cl;
var reco = false;
var time = $('.quest.active').find('.time').data('time');


$('.answer').click(function () {
    var val = $(this).html();
    $('.active .answer').removeClass('selected');
    $(this).addClass('selected');
    $('.active .a-input').val(val.trim());
    if($(this).hasClass('true')){
        // alert();
        $('.active .a-input').attr('data-true','true');
    }else{
        $('.active .a-input').attr('data-true','false');
    }
    // console.log(val.trim());
});

$('.next').click(function () {
    // clearInterval(cl);
    var ans = $(this).parent().find('.a-input').val();
    var quest = $(this).parent().find('.a-input').data('quest');
    var istrue = $(this).parent().find('.a-input').data('true');
    if(ans == ''){
        alert('The question not answered yet');
    }else{
        // alert(ans);
        $.ajax({
            method: 'post',
            url: base + 'ajax/answer',
            data: {ans:ans,quest:quest,istrue:istrue,quiz:quiz},
            type: 'json',
            beforeSend: function () {
            },
            success: function (data) {
                $('.quest.active').removeClass('active').next().addClass('active');
                stop();
                time = $('.active').find('.time').data('time');
                // alert(time);
                start(time)
                // clearInterval(cl);
                // start(time);
            }
        });
    }
    return false;
});
$('.next2').click(function () {
    // clearInterval(cl);
    var ans = $('.active').find('.a-input').val();
    var quest = $('.active').find('.a-input').data('quest');
    var istrue = $('.active').find('.a-input').data('true');
    if(ans == ''){
        ans = 'Not Answerd';
    }
        // alert(ans);
        $.ajax({
            method: 'post',
            url: base + 'ajax/answer',
            data: {ans:ans,quest:quest,istrue:istrue,quiz:quiz},
            type: 'json',
            beforeSend: function () {
            },
            success: function (data) {
                $('.quest.active').removeClass('active').next().addClass('active');
                // start(time)
            }
        });
    return false;
});

$('.reset').click(function () {
    $('.droppable').html('<p>drag the words bellow</p>');
    $(this).parent().find('.a-input').val('');
    var arr = $(this).parent().parent().find('.droppable').data('array');
    console.log(sentence[arr]);
    sentence[arr] = [];
    $('.draggable span').show();
    return false;
});


// / quiz


var sentence = [];
$(".draggable  span ").draggable({ revert: "valid" });
$(".droppable").droppable({
    accept: ".draggable  span",
    classes: {
        "ui-droppable-active": "ui-state-active",
        "ui-droppable-hover": "ui-state-hover"
    },
    drop: function (event, ui) {
        // $(ui.draggable).css('display','0');
        // alert($(ui.draggable).html());
        // alert($(this).data('array'))
        // sentence.push($(ui.draggable).html());
        if (sentence.includes($(this).data('array'))){
            sentence[$(this).data('array')].push($(ui.draggable).html());
        }else{

            sentence.push($(this).data('array'));
            if (sentence.includes($(this).data('array'))){
                sentence[$(this).data('array')]=[];
                sentence[$(this).data('array')].push($(ui.draggable).html());
            }
            console.log(sentence)
        }
        var str = sentence[$(this).data('array')].join("");
        $('.droppable[data-array=' + $(this).data('array')+']').html(str);
        $('.active').find('.a-input').val(str);
        $(ui.draggable).hide();
    }
});

// recorder
URL = window.URL || window.webkitURL;
var gumStream;
//stream from getUserMedia() 
var rec;
//Recorder.js object 
var input;
//MediaStreamAudioSourceNode we'll be recording 
// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext = new AudioContext;
//new audio context to help us record 
var recordButton = document.querySelector(".recordButton");
var stopButton = document.querySelector(".stopButton");
var pauseButton = document.querySelector(".pauseButton");
//add events to those 3 buttons 
$('.recordButton').click(function () {
  
    startRecording()
});
$('.stopButton').click(function () {
    if(reco == false){
        $('.next2').click();
        stop();
        time = $('.active').find('.time').data('time');
        // alert(time);
        start(time)
    }else{
        stopRecording()
        reco = false;
    }
});
$('.pauseButton').click(function () {
    pauseRecording();
});


function startRecording() { 
    console.log("recordButton clicked");
    reco = true;
    /* Simple constraints object, for more advanced audio features see
    
https://addpipe.com/blog/audio-constraints-getusermedia/ */

    var constraints = {
        audio: true,
        video: false
    }
    /* Disable the record button until we get a success or fail from getUserMedia() */



    /* We're using the standard promise based getUserMedia()
    
    https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia */

    navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
        console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
        /* assign to gumStream for later use */
        gumStream = stream;
        /* use the stream */
        input = audioContext.createMediaStreamSource(stream);
        /* Create the Recorder object and configure to record mono sound (1 channel) Recording 2 channels will double the file size */
        rec = new Recorder(input, {
            numChannels: 1
        })
        //start the recording process 
        rec.record()
        console.log("Recording started");
    }).catch(function (err) {
        //enable the record button if getUserMedia() fails 
        recordButton.disabled = false;
        stopButton.disabled = true;
        pauseButton.disabled = true
    });
}

function pauseRecording() {
    console.log("pauseButton clicked rec.recording=", rec.recording);
    if (rec.recording) {
        //pause 
        rec.stop();
        pauseButton.innerHTML = "Resume";
    } else {
        //resume 
        rec.record()
        pauseButton.innerHTML = "Pause";
    }
}

function stopRecording() {
    console.log("stopButton clicked");
    //disable the stop button, enable the record too allow for new recordings 

    //reset button just in case the recording is stopped while paused 
    pauseButton.innerHTML = "Pause";
    //tell the recorder to stop the recording 
    rec.stop(); //stop microphone access 
    gumStream.getAudioTracks()[0].stop();
    //create the wav blob and pass it on to createDownloadLink 
    rec.exportWAV(createDownloadLink);

}
function createDownloadLink(blob,th) {
    var url = URL.createObjectURL(blob);
    var au = document.createElement('audio');
    var li = document.createElement('li');
    var link = document.createElement('a');
    var filename = new Date().toISOString();

    var fd = new FormData();
    reco = false;
    fd.append("audio_data", blob, filename+'.wav');
    console.log(fd);
    $.ajax({
        method : 'post',
        url : base+'ajax/upload_audio',
        data : fd,
        type:'json',
        processData: false,
        contentType: false,
        beforeSend:function () {
        },
        success:function (data) {
            var obj = JSON.parse(data);
            // console.log(obj.link);
            // alert(data.link);
            $('.active').prev().find('.a-input').val(obj.link);
            var ans = obj.link;
            var quest = $('.active').find('.a-input').data('quest');
            var istrue = $('.active').find('.a-input').data('true');

            // alert(ans);
            $.ajax({
                method: 'post',
                url: base + 'ajax/answer',
                data: { ans: ans, quest: quest, istrue: istrue ,quiz:quiz},
                type: 'json',
                beforeSend: function () {
                },
                success: function (data) {

                    $('.quest.active').removeClass('active').next().addClass('active');
                    stop();
                    time = $('.active').find('.time').data('time');
                    // alert(time);
                    start(time)
                }
            });
        }
    });

}
// recorder
start(time)

function start(time) {
    var end = setInterval(() => {
        $('.quest.active').find('.time').find('b').html(--time);
        if (time == 0) {
            var time2 = $('.quest.active').next().find('.time').data('time');
            if ($('.quest.active').hasClass('rec')) {
                if (reco == true) {
                    stopRecording()
                } else {
                    $('.next2').click();
                }
            } else {
                $('.next2').click();
            }
            start(time2)
            clearInterval(end);
        }
    }, 1000);
    cl = end;
}
function stop() {
    clearInterval(cl);
}

// counter
// Set the date we're counting down to
var countDownDate = new Date(mydate).getTime();

// Update the count down every 1 second
var x = setInterval(function () {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        location.reload();
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
// counter