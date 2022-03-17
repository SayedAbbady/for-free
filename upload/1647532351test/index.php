<?php include('header.php') ?>
    <span data-number="" id="oldNum"></span>
    <!--====================Explain ==================-->
          <div class="question expaln-q active">
            <div class="row">
              <div class="col-12 text-center">
                <div class="headQuestion ">
                   سورةالمجادلة ايه رقم (5)  Drag and Drop
                </div>
              </div>
            </div><!--End Row (title) -->
            <div class="row">
              
              <div class="col-12 text-center">
                <p class=" pdescript">
                  
                  <span>إِنَّ ٱلَّذِينَ يُحَآدُّونَ ٱللَّهَ وَرَسُولَهُۥ كُبِتُواْ كَمَا كُبِتَ ٱلَّذِينَ مِن قَبۡلِهِمۡۚ وَقَدۡ أَنزَلۡنَآ ءَايَٰتِۭ بَيِّنَٰتٖۚ وَلِلۡكَٰفِرِينَ عَذَابٞ مُّهِينٞ(5)</span>
                </p>
              </div>
              <div class="col-12 text-left answer next" data-move="true">
                <p class="h2">Exercise <i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!--====================End Explain ==================--> <!-- ==================Question 2 222 =================-->
          <div class="question DND" id="dnd<?= $count?>">
            <div class="row">
              <div class="col-12 text-center">
                <div class="headQuestion">
                  Complete the following<span style="color:#97352a"> (words)</span>
                </div>
              </div>
            </div>
            <div class="row newDrag mx-auto">
              <div class="row col-12 theAnswers"><div data-target="word-18" class="col-md col-12 drag">
                <p id="word-18">  </p>
                </div><div data-target="word-13" class="col-md col-12 drag">
                <p id="word-13"> أَنزَلۡنَآ </p>
                </div><div data-target="word-12" class="col-md col-12 drag">
                <p id="word-12">  </p>
                </div><div data-target="word-4" class="col-md col-12 drag">
                <p id="word-4">  </p>
                </div><div data-target="word-14" class="col-md col-12 drag">
                <p id="word-14">  </p>
                </div><div data-target="word-7" class="col-md col-12 drag">
                <p id="word-7"> كَمَا </p>
                </div><div data-target="word-10" class="col-md col-12 drag">
                <p id="word-10">  </p>
                </div><div data-target="word-11" class="col-md col-12 drag">
                <p id="word-11"> قَبۡلِهِمۡۚ </p>
                </div><div data-target="word-9" class="col-md col-12 drag">
                <p id="word-9"> ٱلَّذِينَ </p>
                </div><div data-target="word-16" class="col-md col-12 drag">
                <p id="word-16">  </p>
                </div><div data-target="word-3" class="col-md col-12 drag">
                <p id="word-3"> يُحَآدُّونَ </p>
                </div><div data-target="word-15" class="col-md col-12 drag">
                <p id="word-15"> بَيِّنَٰتٖۚ </p>
                </div><div data-target="word-6" class="col-md col-12 drag">
                <p id="word-6">  </p>
                </div><div data-target="word-17" class="col-md col-12 drag">
                <p id="word-17"> عَذَابٞ </p>
                </div><div data-target="word-5" class="col-md col-12 drag">
                <p id="word-5"> وَرَسُولَهُۥ </p>
                </div><div data-target="word-2" class="col-md col-12 drag">
                <p id="word-2">  </p>
                </div><div data-target="word-1" class="col-md col-12 drag">
                <p id="word-1"> إِنَّ </p>
                </div><div data-target="word-8" class="col-md col-12 drag">
                <p id="word-8">  </p>
                </div></div>
              <div class="row col-12 mb-4 "><p class="aya"><span id="word-1" data-accept="word-1" class="drop no-border">............</span>..</p><p class="aya">ٱلَّذِينَ</p><p class="aya"><span id="word-3" data-accept="word-3" class="drop no-border">............</span>..</p><p class="aya">ٱللَّهَ</p><p class="aya"><span id="word-5" data-accept="word-5" class="drop no-border">............</span>..</p><p class="aya">كُبِتُواْ</p><p class="aya"><span id="word-7" data-accept="word-7" class="drop no-border">............</span>..</p><p class="aya">كُبِتَ</p><p class="aya"><span id="word-9" data-accept="word-9" class="drop no-border">............</span>..</p><p class="aya">مِن</p><p class="aya"><span id="word-11" data-accept="word-11" class="drop no-border">............</span>..</p><p class="aya">وَقَدۡ</p><p class="aya"><span id="word-13" data-accept="word-13" class="drop no-border">............</span>..</p><p class="aya">ءَايَٰتِۭ</p><p class="aya"><span id="word-15" data-accept="word-15" class="drop no-border">............</span>..</p><p class="aya">وَلِلۡكَٰفِرِينَ</p><p class="aya"><span id="word-17" data-accept="word-17" class="drop no-border">............</span>..</p><p class="aya">مُّهِينٞ</p></div>
                <div class="col-12 mt-3 text-center">
                  <button type="submit" class=" mx-auto start">Start now</button>
                  <button type="submit" id="btn<?= $count?>" class=" mx-auto clickSubmit">submit</button>
                </div>
              </div>
              <!--End Row-->
            </div>
            <!-- ==================END Question  Drag and Drop =================-->
            <?php include('footer.php') ?>