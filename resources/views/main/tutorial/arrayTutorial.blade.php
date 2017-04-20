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
                            Tutorial 2 <small>Array</small>
                        </h1>
                        {{--<ol class="breadcrumb">--}}
                        {{--<li>--}}
                        {{--<i class="fa fa-home"></i> <a href="intro.html">Main</a>--}}
                        {{--<li class="active">if...else--}}
                        {{--</li>--}}
                        {{--</ol>--}}
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p> To use an array in a program, you must declare a variable to reference the array, and you must specify the type of array the variable can reference. Here is the syntax for declaring an array variable −</p>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Syntax
                                </div>
                                <div class="panel-body">
                        <pre>dataType[] arrayRefVar;   // preferred way.
or
dataType arrayRefVar[];  // works but not preferred way.</pre>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Example
                                </div>
                                <div class="panel-body">
                        <pre>double[] myList;   // preferred way.
or
double myList[];   // works but not preferred way.</pre>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="panel-body">
                                <img class="img-responsive" src="../images/objects-tenElementArray.gif" alt="">
                                <div class="panel-footer">
                                    An array of 10 elements.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="page-header">
                                Exercise
                            </h3>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail">
                                        <img class="img-responsive" src="../images/Array2.png" alt="">
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
                                            <h4><a href="#">Practice 1</a>
                                            </h4>
                                            <p><a href="/mcQuestion" class="btn btn-primary" role="button" style="float: right;">Play</a>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail">
                                        <img class="img-responsive" src="../images/Array2.png" alt="">
                                        <div class="caption">
                                            <div class="ratings">
                                                <p class="pull-right">
                                                    <span class="glyphicon glyphicon-star"></span>a
                                                    <span class="glyphicon glyphicon-star"></span>
                                                    <span class="glyphicon glyphicon-star-empty"></span>
                                                    <span class="glyphicon glyphicon-star-empty"></span>
                                                    <span class="glyphicon glyphicon-star-empty"></span>
                                            </div>
                                            </p>
                                            <h4><a href="#">Practice 2</a>
                                            </h4>
                                            <p><a href="/mcQuestion" class="btn btn-primary" role="button" style="float: right;">Play</a>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail">
                                        <img class="img-responsive" src="../images/Array2.png" alt="">
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
                                            <h4><a href="#">Practice 3</a>
                                            </h4>
                                            <p><a href="/mcQuestion" class="btn btn-primary" role="button" style="float: right;">Play</a>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
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