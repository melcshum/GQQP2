<!DOCTYPE html>
<html lang="en">

<head>

    <style type="text/css">
        .self{
            background: #F00;
        }
    </style>
    <style>
        .tab-pane{
            background-color:#ffffff;
        }
    </style>
</head>

<body>
@extends("main.layouts.app")

@section('content')


        <div id="page-wrapper">
            <div class="row-fluid">
                <div class="col-md-12 col-sm-12 col-xs-1">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active"><a href="#Platinum" data-toggle="tab"><img src="./images/platinum.png"></a></li>
                        <li><a href="#Gold" data-toggle="tab"><img src="./images/gold2.png"></a></li>
                        <li><a href="#Silver" data-toggle="tab"><img src="./images/silver2.png"></a></li>
                        <li><a href="#Copper" data-toggle="tab"><img src="./images/bronze.png"></a></li>

                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="Platinum">
                            <center>
                                <h3>Platinum</h3>
                            </center>
                            <table class="table table-striped" align="left">
                                <input type="hidden" name="userID" id="userID" value="{{Auth::user()->id}}">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mark</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1; ?>
                                @foreach($users as $user)
                                    @if($user -> id >= 1 && $user -> id <= 3)

                                     @elseif ($user -> knowledge >= 10000)
                                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                    <tr>
                                        <td>
                                            <?= $index; $index++ ?>
                                        </td>
                                        <td>
                                            <label>{{$user -> name}}</label>
                                        </td>
                                        <td>
                                            <label>{{$user -> knowledge}}</label>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                            </center>
                        </div>

                        <div class="tab-pane " id="Gold">
                            <center>
                                <h3>Gold</h3>
                            </center>
                            <table class="table table-striped" align="left">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mark</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1; ?>
                                @foreach($users as $user)
                                    @if($user -> id >= 1 && $user -> id <= 3)

                                    @elseif ($user -> knowledge < 10000 && $user->knowledge >= 5000)
                                        <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                        <tr>
                                            <td>
                                                <?= $index; $index++ ?>
                                            </td>
                                            <td>
                                                <label>{{$user -> name}}</label>
                                            </td>
                                            <td>
                                                <label>{{$user -> knowledge}}</label>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>



                        <div class="tab-pane" id="Silver">
                            <center>
                                <h3>Silver</h3>
                            </center>
                            <table class="table table-striped" align="left">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mark</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1; ?>
                                @foreach($users as $user)
                                    @if($user -> id >= 1 && $user -> id <= 3)

                                    @elseif ($user -> knowledge < 5000 && $user -> knowledge >= 2500)
                                        <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                        <tr>
                                            <td>
                                                <?= $index; $index++ ?>
                                            </td>
                                            <td>
                                                <label>{{$user -> name}}</label>
                                            </td>
                                            <td>
                                                <label>{{$user -> knowledge}}</label>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="Copper">
                            <center>
                                <h3>Bronze</h3>
                            </center>
                            <table class="table table-striped" align="left">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mark</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1; ?>
                                @foreach($users as $user)
                                    @if($user -> id >= 1 && $user -> id <= 3)

                                    @elseif ($user -> knowledge < 2500)
                                        <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                        <tr>
                                            <td>
                                                <?= $index; $index++ ?>
                                            </td>
                                            <td>
                                                <label>{{$user -> name}}</label>
                                            </td>
                                            <td>
                                                <label>{{$user -> knowledge}}</label>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
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
        $('table td').each(function(){
            //$('table tr:even').css('backgroundColor', '#FFFFFF');
            var userID = $('#userID').val();
            var id = $('#id').val();
            if(userID == id) {
             //   $(this).parent().css('backgroundColor', '#EFEF00');
            }
        });


    });
//            $('table').on('click', 'tr', function(){
//               $(this).addClass('self').sibling().removeClass('self');

</script>

</body>

</html>
