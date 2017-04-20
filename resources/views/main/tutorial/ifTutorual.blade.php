<!DOCTYPE html>
<html lang="en">

<head>
    <style>

    </style>

</head>

<body>

@extends("layouts.tutorialBar")


@section('content')

    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tutorial 1 <small>Conditional Statements</small>
                        </h1>
                        {{--<ol class="breadcrumb">--}}
                            {{--<li>--}}
                                {{--<i class="fa fa-home"></i> <a href="intro.html">Main</a>--}}
                            {{--<li class="active">if...else--}}
                            {{--</li>--}}
                        {{--</ol>--}}
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p> An if statement can be followed by an optional else statement, which executes when the Boolean expression is false.</p>

                            Syntax:
                            The syntax of an if...else is:
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Example
                                </div>
                                <div class="panel-body">
                        <pre>if(Boolean_expression){
    //Executes when the Boolean expression is true
}else{
    //Executes when the Boolean expression is false
}</pre>
                                </div>
                            </div>
                            If the boolean expression evaluates to true, then the if block of code will be executed, otherwise else block of code will be executed.
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="panel-body">
                                <img class="img-responsive" src="../images/if.png" alt="">
                                <div class="panel-footer">
                                    Flow Diagram
                                </div>
                            </div>
                        </div>
                        {!! Form::open(array('action' => 'TutorialController@show','method' => 'post')) !!}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="page-header">
                            Exercise
                        </h3>
                        <div class="row">
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="../images/if_else.png" alt="">
                                    <div class="caption">
                                        <div class="ratings">
                                            <p class="pull-right">
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                        </div>
                                        </p>
                                        <h4>Practice 1
                                        </h4>
                                        <p><input type="submit" name="1" id="1" class="btn btn-primary" style="float: right;" value="Play"></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="../images/if_else.png" alt="">
                                    <div class="caption">
                                        <div class="ratings">
                                            <p class="pull-right">
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                        </div>
                                        </p>
                                        <h4>Practice 2
                                        </h4>
                                        <p><input type="submit" name="2" id="2" class="btn btn-primary" style="float: right;" value="Play"></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img class="img-responsive" src="../images/if_else.png" alt="">
                                    <div class="caption">
                                        <div class="ratings">
                                            <p class="pull-right">
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                                <span class="glyphicon glyphicon-star-empty"></span>
                                        </div>
                                        </p>
                                        <h4>Practice 3
                                        </h4>
                                        <p><input type="submit" name="3" id="3" class="btn btn-primary" style="float: right;" value="Play"></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                    </div>
    </div>
    </div>
        </div>
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
</script>
</body>

</html>