<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .thumbnail{
            width:300px;
            height:300px;
        }
        pre.joe{
            padding-left: 1.8em }
        #Question{
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
            float: none;
        }
        #Answer{
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
            float: none;
        }
        #Test123{
            display: table;
        }

        #Mainp [class*="col-"] {
            display: table-cell;
            vertical-align: top;
        }
        #test{
            position: absolute;
            right:    0;
            bottom:   0;
        }
        .jst-hours {
            float: left;
        }
        .jst-minutes {
            float: left;
        }
        .jst-seconds {
            float: left;
        }
        .jst-clearDiv {
            clear: both;
        }
        .jst-timeout {
            color: red;
        }
        #Mc{
            width: 80%;
        }

    </style>


    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 150px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 10px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>


<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('main.layouts.game')

@section('content')
    <div id="wrapper">
    <div class="container">
        <div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <pre class="joe"><center><h4><label>Type:<span id="changeType">{!!(($fill[$random]->question_type))!!}</span></label>    <label>Level:<u><span id="changeQuLv">{!!(($fill[$random]->question_level))!!}</span></u></label>    <label>Timer: </label><label id="my">0</label>:<label id="tensy">0</label><label id="sy">0</label><label> <button id="myBtn"><img src="./images/bag.png" width="35" height="35"></button></label></h4></center></pre>
            </div>
        </div>
    </div>
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h3><p align="left">Items: </p></h3>
                    <img id='changeQ' src="./images/changeQuestion.png" width="50" height="50"> x <span id="changeNum" >{{ Auth::user()->change }}</span>
                    <img id='plustime' src="./images/extraTime.png" width="50" height="50"> x <span id="extraNum">{{ Auth::user()->extra }}</span>
                </div>

            </div>
            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                var changeQ = document.getElementById("changeQ");

                var plustime = document.getElementById("plustime");

                // When the user clicks the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "block";
                }
                changeQ.onclick = function() {
                    modal.style.display = "none";
                }
                plustime.onclick = function() {
                    modal.style.display = "none";
                }
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>


            <div id="myimageDiv" style="display:none;">
                <h3><p align="left">Items: </p></h3>
                <table border="1" align="left" width="100%" >
                    <tr>
                        <td>
                            <img id='changeQ' src="./images/changeQuestion.png" width="50" height="50">
                        </td>
                        <td>
                            x<span id="changeNum" >{{ Auth::user()->change }}</span>
                        </td>
                        <td>
                            <img id="plustime" src="./images/extraTime.png" width="50" height="50">
                        </td>
                        <td>
                            x<span id="extraNum">{{ Auth::user()->extra }}</span>
                        </td>
                    </tr>
                </table>
            </div>


    <div class="container">

        <div id="Mainp">
            <div id="Test123" class="col-md-12 col-sm-12 col-xs-12">

                <div id="Question" class="col-md-4 col-sm-4 col-xs-4">
                    <h2>Question <label>{!!(($playnum))!!}</label>/20</h2>
                    <p><label><span id="changeQuestion">{!!(($fill[$random]->question))!!}</span></label></p>
                    <hr>
                    <h2>Output</h2>
                    <img id='changePhoto' src={!!(($fill[$random]->photo))!!}>
                    <hr>
                    <ol id="hits">
                        {!!(($fill[$random]->hint))!!}
                    </ol>
                </div>

                <div id="Answer" >
                    <h2>Answer</h2>
                    {!! Form::open(array('action' => 'Main\ChallengeFillController@challenge','method' => 'post')) !!}
                    <input type="hidden" name="playNum" id="playNum" value={!! $playnum !!}>
                    <input type="hidden" name="playNum" id="playNum" value={!! $random !!}>
                    <input type="hidden" id='qtime' name="qtime" value={!! $fill[$random]->time !!}>
                    <input type="hidden" id='useItem' name="useItem" value=0>
                   <span id="programP"> {!!(($fill[$random]->program))!!}</span>
                    <p align="right" valign="bottom"><input type="submit" id="Next" class="btn btn-primary" value="Next"></p>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div class="container">

        {!! Form::close() !!}
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script type="text/javascript" src="../js/jquery-1.6.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $("#hits").hide();
        var qtime = $("#qtime").val();
        var s = qtime % 60;
        var m = Math.floor(qtime / 60);
        $("#my").text(m);
        if(parseInt($("#changeNum").html()) == 0){
            $("#changeQ").attr('src','./images/changeQuestion - black.png');
        }
        if(parseInt($("#extraNum").html()) == 0){
            $("#plustime").attr('src','./images/extraTime-black.png');
        }

        var id = setInterval(frame, 1000);
        function frame(){

            if(s ==0 && m>=1) {
                m--;
                $("#my").text(m);
                s = 60;
                $("#sy").text(s);
            }else if(s==0 && m==0){
                clearInterval(myVar);
            }
            if(qtime<=30){
                $("#hits").show();
                $("#sy").text(s);
            }
            if(s >60){
                m++;
                $("#my").text(m);
                s= (qtime % 60) -2;
                s--;
                qtime--;
                $("#sy").text(s);
            }
            else{
                s--;
                $("#sy").text(s);
                qtime--;
            }
            if(s>9){
                $("#tensy").hide();
            }
            else{
                $("#tensy").show();
            }

        }
        $('#plustime').click(function() {
            if (($("#useItem").val() == 0) && (parseInt($("#extraNum").html()) != 0)){
                qtime = qtime + 30;
                s = s + 30;
                $.ajax({
                    type: "POST",
                    url: "/challengeMCChangeExtra",
                    data: {sem: "mcextra"},
                    success: function (data) {
                        console.log(data);
                        $("#extraNum").html(data);
                        $("#extraNum").fadeOut(1000).fadeIn(1000);
                        $("#extraNum").fadeOut(1000).fadeIn(1000);
                        $("#useItem").val(1);
                        $("#changeQ").attr('src','./images/changeQuestion - black.png');
                        $("#plustime").attr('src','./images/extraTime-black.png');
                    }
                })
            }
            else{

            }
        });
        $("#Next").click(function(event){

        });

        $('#changeQ').click(function() {
            if (($("#useItem").val() == 0) && (parseInt($("#changeNum").html()) != 0)){
            $.ajax({
                type:"POST",
                url: "/challengeFillChange",
                data: {sem : "mc"},
                success:function(data){
                    console.log(data);
                    var changecount = parseInt($("#changeNum").html());
                    $("#changeNum").html(changecount - 1);
                    alert(data['question_type']);
                }
            })
            }
            else{

            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>
<script src="../dist/js/jqueryTime.js"></script>
<script src="../dist/js/jquery.simple.timer.js"></script>
<script>
    $(function(){

        $('.timer-quick').startTimer();
        $('.timer').startTimer({
            onComplete: function(){
                console.log('Complete');
            }
        });

        $('.timer-pause').startTimer({
            onComplete: function(){
                console.log('Complete');
            },
            allowPause: true
        });
    })
</script>
</body>

</html>
