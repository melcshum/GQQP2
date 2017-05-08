<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .thumbnail{
            width:300px;
            height:300px;

        }
    </style>

</head>

<body>
@extends('main.layouts.sidebar')

@section('content')
    <div id="wrapper">
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="Topic">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Topic Introduction</div>
                            <div class="panel-body text-center">
                                Please Click Show Information to know more
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="nav" id="Topic_side1">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Topic Introduction</div>
                            <div class="panel-body text-center">
                                Topic 1 Is IF and Else
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="nav" id="Topic_side2">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Topic Introduction</div>
                            <div class="panel-body text-center">
                                Topic 2 Is Arrary
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="nav" id="Topic_side3">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Topic's  Introduction</div>
                            <div class="panel-body text-center">
                                Topic 3 Control Characters
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->


            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="Topic_side_Down1" >
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" ><img src="./images/gold.ico" width="40">Gold</div>
                            <div class="panel-body text-center">
                                2000 - 5000 Gold
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >How many Question</div>
                            <div class="panel-body text-center">
                                20
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Suggest finish time</div>
                            <div class="panel-body text-center">
                                25 minute
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Bar</div>
                            <div class="panel-body text-center">
                                <input id="input-3"  name="input-3"  class="rating rating-loading" value="3" data-size="xs" title="" readonly>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>


            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="Topic_side_Down2" >
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" ><img src="./images/gold.ico" width="40">Gold</div>
                            <div class="panel-body text-center">
                                2500 - 5500 Gold
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >How many Question</div>
                            <div class="panel-body text-center">
                                20
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Suggest finsih time</div>
                            <div class="panel-body text-center">
                                30 minute
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Bar</div>
                            <div class="panel-body text-center">
                                <input id="input-3"  name="input-3"  class="rating rating-loading" value="5" data-size="xs" title="" readonly>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>


            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="Topic_side_Down3" >
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" ><img src="./images/gold.ico" width="40">Gold</div>
                            <div class="panel-body text-center">
                                4000 - 6000 Gold
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >How many Question</div>
                            <div class="panel-body text-center">
                                20
                            </div>
                        </div>
                    </li>
                    <li>

                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Suggest finsih time</div>
                            <div class="panel-body text-center">
                                30 minute
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading text-center" >Bar</div>
                            <div class="panel-body text-center">


                                <input id="input-3"  name="input-3"  class="rating rating-loading" value="2" data-size="xs" title="" readonly>


                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header">Menu</h1>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                           
                            <div class="caption" style="overflow:hidden; height:100%">
                                 <table cellpadding="0" cellspacing="0" style="height:100%;" border="0" width="100%">
                                    <tr>
                                        <td colspan="3" align="center">
                                         <img src="./images/IF ELSE.png"  alt='Thumbnail' class="img-thumbnail img-responsive" width="120px" height="120px"/>
                                         </td>
                                         </tr>
                                    <tr>
                                    <td colspan="3"> <h4>Topic 1 If and Else</h4></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="bottom"><a data-toggle="modal" data-target="#Explanation1" class="btn btn-primary" role="button">Play</td>
                                    <td align="center" valign="bottom"><button id=Topic1 class="btn btn-primary">Show Information</button></td>
                                    <td align="right" valign="bottom"><//img src="./images/Lock.jpg" height="40" width="40">
                                    </td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                           
                            <div class="caption"  style="overflow:hidden; height:100%">
                                      <table cellpadding="0" cellspacing="0" style="height:100%;" border="0" width="100%">
                                    <tr>
                                        <td colspan="3" align="center">
                                          <img src="./images/Array.png" alt='Thumbnail2' class="img-thumbnail img-responsive" width="120px" height="120px"/>
                                         </td>
                                         </tr>
                                    <tr>
                                    <td colspan="3">     <h4>Topic 2 Array</h4></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="bottom"><a data-toggle="modal" data-target="#Explanation2" class="btn btn-primary" role="button">Play</td>
                                    <td align="center" valign="bottom"><button id=Topic2 class="btn btn-primary">Show Information</button></td>
                                    <td align="right" valign="bottom"> <//img src="./images/Unloack.jpg" height="40" width="40">
                                    </td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                            <div class="caption"  style="overflow:hidden; height:100%">
                                        <table cellpadding="0" cellspacing="0" style="height:100%;" border="0" width="100%">
                                    <tr>
                                        <td colspan="3" align="center">
                                          <img src="./images/Symbol.png" alt='Thumbnail3' class="img-thumbnail img-responsive" width="120px" height="120px"/>
                                         </td>
                                         </tr>
                                    <tr>
                                    <td colspan="3"> <h4>Topic 3 Loop</h4></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="bottom"><a data-toggle="modal" data-target="#Explanation3" class="btn btn-primary" role="button">Play</td>
                                    <td align="center" valign="bottom"><button id=Topic3 class="btn btn-primary">Show Information</button></td>
                                    <td align="right" valign="bottom"> <img src="./images/Lock.jpg" height="40" width="40">
                                    </td>
                                </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <div class="modal fade" id="Explanation1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Explanation</h4>
                </div>
                <div class="modal-body">
                    <p><h4>How to play?</h4></p>
                    <p>This game contain 20 questions. This set of question contain Multiple Choice and Fill in the Blanks question!</p>
                </div>
                    <div class="modal-footer">
                        {!! Form::open(array('action' => 'Main\TestController@result','method' => 'post')) !!}
                        <button type="submit" name="1" id="1" class="btn btn-primary" style="float: right;" value="if_else">Play</button>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Explanation2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Explanation</h4>
                </div>
                <div class="modal-body">
                    <p><h4>How to play?</h4></p>
                    <p>This game contain 20 questions. If you cannot complete the question in time,it takes 0 marks.<b>(when the level is high, it will more time)</b>
                        This mode can get Gold to buy item(Tips) in shop, it can help you solve some problem.</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(array('action' => 'Main\TestController@result','method' => 'post')) !!}
                    <button type="submit" name="1" id="1" class="btn btn-primary" style="float: right;" value="array">Play</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Explanation3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Explanation</h4>
                </div>
                <div class="modal-body">
                    <p><h4>How to play?</h4></p>
                    <p>This game contain 20 questions. If you cannot complete the question in time,it takes 0 marks.<b>(when the level is high, it will more time)</b>
                        This mode can get Gold to buy item(Tips) in shop, it can help you solve some problem.</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(array('action' => 'Main\TestController@result','method' => 'post')) !!}
                    <button type="submit" name="1" id="1" class="btn btn-primary" style="float: right;" value="loop">Play</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@endsection
</body>

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

<!-- star ranking-->
<script src="../dist/js/star-rating.js"></script>
<link rel="stylesheet" href="../dist/css/star-rating.css" media="all" type="text/css"/>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script type="text/javascript" src="../js/jquery-1.6.js"></script>
<script type="text/javascript">

    jQuery(document).ready(function($) {

        $("#Topic_side1").hide();
        $("#Topic_side_Down1").hide();
        $("#Topic_side2").hide();
        $("#Topic_side_Down2").hide();
        $("#Topic_side3").hide();
        $("#Topic_side_Down3").hide();



        $("#Topic1").click(function() {
            $("#Topic").hide(500);
            $("#Topic_side2").hide(500);
            $("#Topic_side_Down2").hide(500);
            $("#Topic_side3").hide(500);
            $("#Topic_side_Down3").hide(500);
            $("#Topic_side1").show(500);
            $("#Topic_side_Down1").show(500);


        });

        $("#Topic2").click(function() {
            $("#Topic").hide(500);
            $("#Topic_side1").hide(500);
            $("#Topic_side_Down1").hide(500);
            $("#Topic_side3").hide(500);
            $("#Topic_side_Down3").hide(500);
            $("#Topic_side2").show(500);
            $("#Topic_side_Down2").show(500);


        });

        $("#Topic3").click(function() {
            $("#Topic").hide(500);
            $("#Topic_side1").hide(500);
            $("#Topic_side_Down1").hide(500);
            $("#Topic_side2").hide(500);
            $("#Topic_side_Down2").hide(500);
            $("#Topic_side3").show(500);
            $("#Topic_side_Down3").show(500);


        });

    });

</script>

</html>
