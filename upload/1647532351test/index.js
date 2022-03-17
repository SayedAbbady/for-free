$(function () {
  "use strict";
  var name;
  var score = 0;
  var quenumber = $(".expaln-q").length;
  var x = document.getElementById(1);
  $(".score").text("0");

  // timer section
  var z = document.getElementById(2);
  var timerNum = parseInt($("#oldNum").attr("data-number"));
  console.log(timerNum);
  $("#numDown").html(timerNum);
  if (timerNum > 0) {
    var m = setInterval(() => {
      
      z.play();
      timerNum -= 1;
      console.log(timerNum);
      $("#numDown").html(timerNum);
      if (timerNum == 0) {
        $(".question").each(function () {
          $(".question").removeClass('active');
          $(".result").addClass('active');
        })
        clearInterval(m);
      }
    }, 1000);
  }
  $(".answer").click(function () {
    if ($(this).data("correct") == true) {
      if (score < 10) {
        $(".score").text(("0" + ++score) * 10);
      } else {
        $(".score").text((++score) * 10);
      }
      $(".good").show();
      $(".message").show();
      setTimeout(function () {
        $(".good").hide();
        $(".message").hide();
      }, 2500);
      $(this).parents(".question").removeClass("active").next().addClass("active");
      x.play();
    } else if ($(this).data("move") == true) {
      $(this).parents(".question").removeClass("active").next().addClass("active");
    } else {
      $(".wrong").show();
      $(".message").show();
      setTimeout(function () {
        $(".wrong").hide();
        $(".message").hide();
      }, 2500);
      $(this).parents(".question").removeClass("active").next().addClass("active");
    }
    //========================================================

    var numItems = ($('.question').length) - quenumber;
    if (numItems < 10) {
      $(".numQues").text("0" + numItems);
    } else {
      $(".numQues").text(numItems);
    }
    //========================================================

    // max Question
    $(".maxQues").text(numItems * 10);
    //========================================================

    // persantage
    var persantge = ((score / numItems) * 100);
    $(".persantge").text((persantge.toFixed(2)) + " %");
    //========================================================

    if (persantge >= 50) {
      $(".resaltStaute").html("<p>Congratulations you passed the exam in</p>"+$('.pdescript span').text());
    } else {
      $(".resaltStaute").text("Sorry you are faild, try agian");
    }

    if (score < 10) {
      $(".correctQues").text("0" + score);
    } else {
      $(".correctQues").text(score);
    }
  });
  

  // =-=============================================================
  // =-=============================================================
  // Drag and Drop
  /*
      Quiz Drag and drop
  */


  //===============================================================
  var answersLeft = [];
  function DragDrop(mainclass,mainbtn) {
  

    $("#"+mainclass).find("div.drag").each(function (i) {
    
    var $this = $(this);
    var answerValue = $this.data('target');
    var $target = $("#"+mainclass+' .drop[data-accept="' + answerValue + '"]');

    $this.draggable();

    if ($target.length > 0) {
      $target.droppable({
        accept: 'div.drag[data-target="' + answerValue + '"]',
        drop: function (event, ui) {
          answersLeft.splice(answersLeft.indexOf(answerValue), 1);
          
        }
      });
      answersLeft.push(answerValue);
    } else { }
  });


    $("#"+mainbtn).click(function () {

    if (answersLeft.length == 0) {
      if (score < 10) {
        $(".score").text(("0" + ++score) * 10);
      } else {
        $(".score").text((++score) * 10);
      }
      $(".good").show();
      $(".message").show();
      setTimeout(function () {
        $(".good").hide();
        $(".message").hide();
      }, 2500);
      $(this).parents(".question").removeClass("active").next().addClass("active");
      x.play();
    } else {
      $(".wrong").show();
      $(".message").show();
      setTimeout(function () {
        $(".wrong").hide();
        $(".message").hide();
      }, 2500);
      $(this).parents(".question").removeClass("active").next().addClass("active");
      answersLeft=[];

    }
    var numItems = ($('.question').length) - quenumber;
    if (numItems < 10) {
      $(".numQues").text("0" + numItems);
    } else {
      $(".numQues").text(numItems);
    }
    //========================================================

    // max Question
    $(".maxQues").text(numItems * 10);
    //========================================================

    // persantage
    var persantge = ((score / numItems) * 100);
    $(".persantge").text((persantge.toFixed(2)) + " %");
    //========================================================

    if (persantge >= 50) {
      $(".resaltStaute").html("<p>Congratulations you passed the exam in</p>"+$('.pdescript span').text());
    } else {
      $(".resaltStaute").text("Sorry you are faild, try agian");
    }

    if (score < 10) {
      $(".correctQues").text("0" + score);
    } else {
      $(".correctQues").text(score);
    }
  });

  }

  // run function Drag n Drop
  $(".start").click(function () {
    var btn = $(this).siblings().attr("id");
    var parentName = $(this).parents()[2].id;
    DragDrop(parentName, btn);
    $("#" + parentName + " .start").hide();
    console.log(answersLeft);
  });


  

});
