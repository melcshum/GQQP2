@extends("layouts.app")

@section('content')
    <div class="col-md-1">

    </div>

    <div class="col-md-10">
    <div id="page-wrapper">
        <div class="row">
            <h1 class="page-header">Setting</h1>
            <!-- left column -->

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <hr />

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="text-center">
                    <img src="./images/2955057094021740194.png" class="avatar img-circle" alt="avatar">
                    <h6>Changes the photo</h6>

                    <input class="form-control" type="file">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <div class="col-md-6 text-left">
                    <h3>Information</h3>
                </div>
                <div class="col-md-6 text-right">
                    <form method="get" action="/changeInfor">
                        <input class="btn btn-primary" value="Edit" type="submit">
                    </form>
                </div>
                <br><br><br>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <input class="form-control" value="{{ Auth::user()->email }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="{{ Auth::user()->name }}" type="text">
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="col-md-3 control-label">Password:</label>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<input class="form-control" value="{{ Auth::user()->password }}" type="text">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </form>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    </div>

    <div class="col-md-1">
        </div>

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
    </body>





@endsection