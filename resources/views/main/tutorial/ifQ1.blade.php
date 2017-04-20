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
        }
        #Answer{
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #Mainp [class*="col-"] {
            float: none;
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

    </style>
</head>

<body>
@extends('layouts.sidebar')

@section('content')
    <div id="wrapper">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <pre class="joe"><center><h4><label>Gold:<u>0</u></label>    <label>Type:class</label>    <label>Level:<u>1</u></label>    <label>Timer: </label><label id="my">0</label> : <label id="sy">0</label></h4></center></pre>
                </div>
            </div>
        </div>
        <h3><p align="right">item</p></h3>
        <table border="1" align="right">
            <tr>
                <td>
                    <img src="./images/the-meaning-of-D.jpg">
                </td>
                <td>
                    x1
                </td>
            </tr>
            <tr>
                <td>
                    <img src="./images/hO01DAyn.png">
                </td>
                <td>
                    x1
                </td>
            </tr>
        </table>
        <div class="container">

            <div id="Mainp"class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3><label>1</label>/20</h3>
                    <div id="Question" class="col-md-6 col-sm-6 col-xs-6">
                        <h2>Question</h2>
                        <p><label>Create Hello class and have a main class to print "Hello class":</label></p>
                        <hr>
                        <h2>Output</h2>
                        <img src="./images/ans1.JPG">
                        <hr>
                        <ol id="hits">
                            <li>Class name</li>
                            <li>about the main class</li>
                            <li>about the main class</li>
                            <li>about the main class</li>
                            <li>java basic library to print</li>
                        </ol>
                    </div>

                    <div id="Answer" class="col-md-6 col-sm-6 col-xs-6">
                        <h2>Answer</h2>
                        <pre>public class 1.<input type="text">{
	public 2. <input type="text"> 3.<input type="text"> 4.<input type="text">(String [] args){
		5.<input type="text">.print("Hello class");
	}
}
</pre>
                        <p id="test"align="right" valign="bottom"><a href="/questionResult"><input type="button" id="Next" class="btn btn-primary" value="Next"></a></p>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="container">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="#" class="btn active" style="float: left;">01</a>
                </li>

                <li>
                    <a href="q2.html" class="btn" style="float: left;">02</a>
                </li>
                <li>
                    <a href="q3.html" class="btn" style="float: left;">03</a>
                </li>

                <li>
                    <a href="q4.html" class="btn" style="float: left;">04</a>
                </li>
                <li>
                    <a href="q5.html" class="btn" style="float: left;">05</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">06</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">07</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">08</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">09</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">10</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">11</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">12</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">13</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">14</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">15</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">16</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">17</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">18</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">19</a>
                </li>
                <li>
                    <a href="#" class="btn" style="float: left;">20</a>
                </li>
                <li>
                    <p align="right"><a href="/skipQuestion"><input type="button" class="btn btn-warning" value="Ship"></a></p>
                </li>
            </ul>
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
        var s =$("#sy").val();
        var m = $("#my").val();
        var id = setInterval(frame, 1000);
        function frame(){
            if(s>=5){
                $("#hits").show();
                s++;
                $("#sy").text(s);
                if(s>=60){
                    m++;
                    $("#my").text(m);
                    s=0;
                    s++;
                    $("#sy").text(s);
                }
            }

            else{
                s++;
                $("#sy").text(s);
            }
        }
    });
</script>
<script src="../js/jqueryTime.js"></script>
<script src="../js/jquery.simple.timer.js"></script>
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
