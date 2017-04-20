@extends('layouts.app')

@section('content')
    <style type="text/css">
        label {
            text-align: right;
        }​
    </style>
    <style>
        .tab-pane{
            background-color:#ffffff;
        }
    </style>
    <div class="row">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile</h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-8 col-md-4">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#status"><h4>Status</h4></a></li>
                    <li><a data-toggle="tab" href="#item"><h4>Item</h4></a></li>
                    </ul>

                    <?php
                        $ifElse = Auth::user()->skill->if_else_point/630*100;
                        $ie = (int) $ifElse;

                        $loop = Auth::user()->skill->loop_point/630*100;
                        $l = (int) $loop;

                        $array = Auth::user()->skill->array_point/630*100;
                        $a = (int) $array;
                    ?>
                <div class="tab-content">
                    <div id="status" class="tab-pane fade in active">
                        <ul class="progress2">
                            <!--  Item  -->
                            <li data-name="IF ELSE Skill" data-percent="{{$ie}}%(Lv {{Auth::user()->skill->if_else_level}})"> <svg viewBox="-10 -10 220 220">
                                    <g fill="none" stroke-width="5" transform="translate(100,100)">
                                        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
                                        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
                                        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
                                        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
                                        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
                                        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
                                    </g>
                                </svg> <svg viewBox="-10 -10 220 220">
                                    <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="{{Auth::user()->skill->if_else_point}}"></path>
                                </svg> </li>
                            <!--  Item  -->

                            <li data-name="Loop Skill" data-percent="{{$l}}%(Lv {{Auth::user()->skill->loop_level}})"> <svg viewBox="-10 -10 220 220">
                                    <g fill="none" stroke-width="5" transform="translate(100,100)">
                                        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
                                        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
                                        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
                                        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
                                        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
                                        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
                                    </g>
                                </svg> <svg viewBox="-10 -10 220 220">
                                    <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="{{Auth::user()->skill->loop_point}}"></path>
                                </svg> </li>
                            <!--  Item  -->

                            <li data-name="Array Skill" data-percent="{{$a}}%(Lv {{Auth::user()->skill->array_level}})"> <svg viewBox="-10 -10 220 220">
                                    <g fill="none" stroke-width="5" transform="translate(100,100)">
                                        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
                                        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
                                        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
                                        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
                                        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
                                        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
                                    </g>
                                </svg> <svg viewBox="-10 -10 220 220">
                                    <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="{{Auth::user()->skill->array_point}}"></path>
                                </svg> </li>
                            <!--  Item  -->
                        </ul>
                        </div>
                    <div id="item" class="tab-pane fade">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="thumbnail">
                                <img src="./images/the-meaning-of-D.jpg" alt='Thumbnail2' class="img-thumbnail img-responsive" width="150px" height="150px"/>
                                <div class="caption" text-align="left">
                                    <label class="right">x {{Auth::user()->change}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="thumbnail">
                                <img src="./images/50-50-movie_61.jpg" alt='Thumbnail2' class="img-thumbnail img-responsive" width="200px" height="200px"/>
                                <div class="caption" text-align="left">
                                    <label class="right">x {{Auth::user()->half}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="thumbnail">
                                <img src="./images/hO01DAyn.png" alt='Thumbnail2' class="img-thumbnail img-responsive" width="150px" height="150px"/>
                                <div class="caption" text-align="left">
                                    <label class="right">x {{Auth::user()->extra}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-4 col-md-8">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Detail</h4>
                    </div>

                    <div class="panel-body">
                        {{--<div class="thumbnail">--}}
                        <center>
                            <img src="./images/2955057094021740194.png" name="aboutme" width="140" height="140" class="img-circle">
                            <h3><img src="./images/Gold.png">{{ Auth::user()->name }}<img src="./images/Gold.png"></h3>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-book fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ Auth::user()->knowledge }}</div>
                                            <div>Knowledge</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="./images/gold.ico" width="50" height="50">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <label>{{ Auth::user()->gold }}</label>
                                            <div>Gold</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Register date: {{Auth::user()->created_at}}</p>
                            <p>Last login date: {{Auth::user()->updated_at}}</p>

                        </center>

                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    <!-- /#wrapper -->

    <svg width="0" height="0">
        <defs>
            <linearGradient id="cl1" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="1" y2="1">
                <stop stop-color="#618099"/>
                <stop offset="100%" stop-color="#8e6677"/>
            </linearGradient>
            <linearGradient id="cl2" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="0" y2="1">
                <stop stop-color="#8e6677"/>
                <stop offset="100%" stop-color="#9b5e67"/>
            </linearGradient>
            <linearGradient id="cl3" gradientUnits="objectBoundingBox" x1="1" y1="0" x2="0" y2="1">
                <stop stop-color="#9b5e67"/>
                <stop offset="100%" stop-color="#9c787a"/>
            </linearGradient>
            <linearGradient id="cl4" gradientUnits="objectBoundingBox" x1="1" y1="1" x2="0" y2="0">
                <stop stop-color="#9c787a"/>
                <stop offset="100%" stop-color="#817a94"/>
            </linearGradient>
            <linearGradient id="cl5" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="0" y2="0">
                <stop stop-color="#817a94"/>
                <stop offset="100%" stop-color="#498a98"/>
            </linearGradient>
            <linearGradient id="cl6" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="1" y2="0">
                <stop stop-color="#498a98"/>
                <stop offset="100%" stop-color="#618099"/>
            </linearGradient>
        </defs>
    </svg>
@endsection
