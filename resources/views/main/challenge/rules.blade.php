<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body>
@extends("main.layouts.app")

@section('content')
    <div id="page-wrapper">
        <div class="row-fluid">
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div style="text-align:center">
                    <font size="5" >
                        <abc>Leaderboard was divided into 4 divisions <br><b>(platinum, gold, silver, bronze)</b>
                            which the top 25% of players will assign to the Platinum Division,<br>
                            26%-50% will be Gold Division ,<br>51%-75% will be Silver Division <br>
                            and the others players will be Bronze Division.<br><br>Enjoy the Game!</abc>

                    </font>
                </div>


                <hr>
            </div>

            <div id="myimageDiv" style="display:none;">
                <img src='../images/5sec.gif' width="100%" height="100%">
                <br />
            </div>




            <div style="text-align:center">
                <abc>
                    <a onclick="showHide();setTimeout(myFunction, 5500);" id="myBtn" class="btn btn-info" href="#">Start Game</a>
                    <a href="#" class="btn btn-danger" >Cancel</a>

                </abc>

            </div>


        </div>
    </div>
    <!-- /#wrapper -->
@endsection

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<script src="../vendor/jslib/jquery-1.11.1.js"></script>

<script type="text/javascript">

    function showHide(){
//create an object reference to the div containing images

        var oImageDiv=document.getElementById("myimageDiv");


//set display to inline if currently none, otherwise to none
        oImageDiv.style.display=(oImageDiv.style.display=='none')?'inline':'none';

    }
</script>
<script type="text/javascript">
    function myFunction(){
////your other code
///
///
        window.location="/challenge";//at the end

    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("abc").remove();


        });
    });
</script>

<script >
    $(document).ready(function(){
        $("#Progress").hide();
        $("#Bar").hide();
        $("#confirm").click(function(){
            var elem = $("#sss").text();
            var width = 5;
            var id = setInterval(frame, 1000);
            function frame() {
                if (width <= 0) {
                    alert("Finish!"+width);

                    location.replace("index.html");
                } else {
                    width--;
                    $("#sss").text(width);
                }
            }
        });
    });
</script>

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

<script type="text/javascript"src="../jslib/jquery-1.11.1.js"></script>
<script type="text/javascript"src="../vendor/jslib/jquery-1.6.js"></script>


</body>

</html>
