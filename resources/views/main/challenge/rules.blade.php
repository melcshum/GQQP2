<!DOCTYPE html>
<html lang="en">

<head>


</head>
<style>
    .main-container {
        width: 100%;
        margin: 0 auto;
        max-width: 100%;
        clear: both;

    }
    .row-fluid {

    }
    </style>

<body>
@extends("main.layouts.app")

@section('content')
    <div id="page-wrapper">
        <div class="row-fluid">
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div style="text-align:center" class="main-container">
                    <table border="0" width="100%">
                        <tr><td>

                    <font size="5" >
                        <div id="myimageDiv2" style="display:inline;"><img src="../images/rankingDivision.png" width="100%" height="350"></div>
                        <abc>
                        <table border="1" width="100%">
                            <tr>
                                <th><img src="./images/ranking2.png" width="100%" height="70%"></th>
                                <th><center><i class="fa fa-book fa-3x"></i>Knowledge point</center></th>
                            </tr>
                            <tr>
                                <th>Platinum</th>
                                <td>Top 25% players</td>
                            </tr>
                            <tr>
                                <th>Gold</th>
                                <td>26%-50% players</td>
                            </tr>
                            <tr>
                                <th>Silver</th>
                                <td>51%-75% players</td>
                            </tr>
                            <tr>
                                <th>Bronze</th>
                                <td>Other players</td>
                            </tr>
                            <tr>

                            </tr>
                        </table>
                            <br>Enjoy the Challenge!</abc>

                    </font>
                            </td></tr>
                    </table>
                </div>


                <hr>
            </div>

            <div id="myimageDiv" style="display:none;">
                <img src='../images/5sec.gif' width="100%" height="100%" align="left">
                <br />
            </div>




            <div style="text-align:center">
                <abc>
                    <a onclick="showHide();setTimeout(myFunction, 5400);" id="myBtn" class="btn btn-info" href="#">Start Challenge</a>
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
        var pImageDiv=document.getElementById("myimageDiv2");


//set display to inline if currently none, otherwise to none
        oImageDiv.style.display=(oImageDiv.style.display=='none')?'inline':'none';
        pImageDiv.style.display=(pImageDiv.style.display=='inline')?'none':'inline';
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
