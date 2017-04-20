<!DOCTYPE html>
<html lang="en">

<head>

    <style type="text/css">
        tr
        {
            line-height:100px;
        }
        
        th
        {
            text-align: center;
        }



    </style>


    <style>
        button .redeem { display: none; }
        button:hover .showPoint { display: none; }
        button:hover .redeem { display: inline; }
        button {width: 150px}

    </style>

</head>

<body>
@extends('layouts.app')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if (Session::has('message'))
                        <div class="alert alert-danger">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <table border="0" width="100%" align="right">
                        <tr>
                            <td colspan="2">
                                <h1 class="page-header" id="item">Items Redemption</h1>
                            </td>
                            <td colspan="2" align="center">
                                <img src="./images/2955057094021740194.png" name="aboutme" width="70" height="70" class="img-circle">
                                <h5><img src="./images/Gold.png">{{ Auth::user()->name }}<img src="./images/Gold.png"></h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                You now have:
                                <button2 class="btn btn-info">Change Question</button2> x {{Auth::user()->change}}&nbsp&nbsp&nbsp
                                <button2 class="btn btn-info">50/50</button2> x {{Auth::user()->half}}&nbsp&nbsp&nbsp
                                <button2 class="btn btn-info">Extra Time</button2> x {{Auth::user()->extra}}&nbsp&nbsp&nbsp
                            </td>
                            <th>

                                <h4 align="center"> <img src="./images/gold.ico" width="40">Gold: </h4>
                            </th>
                            <th align="left" class="gold">{{ Auth::user()->gold }}</td>
                            </th>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                {!! Form::open(array('action' => 'ItemController@exchangeItem','method' => 'post')) !!}
                    {{ csrf_field() }}
                <table border="1" width="100%">
                    <tr >
                        <th align="center">Item name</th>
                        <th align="center">Item description</th>
                        <th align="center">Cost</th>
                    </tr>

                    <input type="hidden" name="itemId" id="itemId" value="">

                    <tr>

                            <h5><td align="center"><button class="btn btn-info">Change Question</button></td>
                                <td align="center">&nbsp(user can displace to another question in Challenge Mode)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                <td align="center" ><button id="buy1" name="buy1" class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="1">
                                <span class="showPoint"><img src="./images/gold.ico" width="40"> &nbspx &nbsp500</span>
                                <span class="redeem">Redeem now!</span>
                            </button></h5>

                    </tr>


                    <tr>

                            <h5><td align="center"><button class="btn btn-info">50/50</button></td>
                                <td align="center">&nbsp(user can filter 2 incorrecct answer in  Challenge Mode <b>(Multiple Choice Only)</b>)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                <td align="center"><button id="buy2" name="buy2" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" value="2">
                                <span class="showPoint"><img src="./images/gold.ico" width="40"> x 1000</span>
                                <span class="redeem">Redeem now!</span>
                            </button></h5>

                    </tr>

                    <tr>

                            <h5> <td align="center"><button class="btn btn-info" >Extra time</button></td>
                                <td align="center">&nbsp(user can get an extra time in the Challenge Mode)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                <td align="center"><button id="buy3" name="buy3" class="btn btn-danger" data-toggle="modal" data-target="#myModal3" value="3">
                                <span class="showPoint"><img src="./images/gold.ico" width="40"> x 2000</span>
                                <span class="redeem">Redeem now!</span>
                            </button></h5>

                    </tr>
                </table>
                {!! Form::close() !!}





            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

@endsection

<!-- JavaScripts -->
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
<!-- C_bar JavaScript-->
<script src="../dist/js/C_bar.js"></script>
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
<script type="text/javascript" language="javascript">
    $(document).ready(function(){

        $('#buy1').click(function(){
            var id = $('#buy1').val();
            $('#itemId').val(id);
        });

        $('#buy2').click(function(){
            var id = $('#buy2').val();
            $('#itemId').val(id);
        });

        $('#buy3').click(function(){
            var id = $('#buy3').val();
            $('#itemId').val(id);
        });

    });
</script>

</body>

</html>
