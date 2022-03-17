<?php
$count = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quiz</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i|Cairo:200,300,400,600,700,
  900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <audio id="1">
    <source src="1.ogg" type="audio/ogg">
    <source src="1.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
  <audio id="2">
    <source src="newSoundSayed.ogg" type="audio/ogg">
    <source src="newSoundSayed.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
  <div class="body container">
    <!--==================Message======================-->
    <div class="message ">
      <div class="congrate good text-center">
        <div class="alert alert-success">
          <p class="h1">Good Job</p>
        </div>
      </div>
      <div class="congrate wrong text-center">
        <div class="alert alert-danger">
          <p class="h1">Wrong</p>
        </div>
      </div>
    </div>
    <!--==================Message======================-->
    <div class="con">
    <header>
        <div class="row info">
          <div class="col-md-4 text-md-left text-center mt-md-3">
            <p>eaalim.com</p>
          </div>
          <div  class="col-md-4 text-center mt-md-3" 
                style=" z-index: 3;
                  font-size: 30px;
                  color: #fdff00;
                  font-weight: bold;"
                id="">
                <div style="margin-bottom: -20px;">Timer</div>
                <span id="numDown" style="font-size: 50px;"></span>
            
          </div>
          <div class="col-md-4 text-md-right text-center mt-md-3">
            <p class="whats">
              <i class="fa fa-whatsapp" aria-hidden="true"> +2 01148362722 </i><br>
              <i class="fa fa-skype" aria-hidden="true"> 020 8123 3611</i>
            </p>
          </div>
        </div>
        <img src="header.png" class="img-fluid" alt="photo">

      </header>

      <section class="text-right" dir="rtl">
        <div class="question-container ">