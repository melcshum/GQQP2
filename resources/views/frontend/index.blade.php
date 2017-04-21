@extends('main.layouts.app')

@section('content')
    <div id="page-wrapper">
        <div class="row-fluid">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <center>
                    @if (Auth::guest())
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table border="0" width="100%">
                                <tr>
                                    <td rowspan="1"><img src="../images/javaimage.jpeg" width="225" height="300px"></td>
                                    <td><a href="/register"><img src="./images/join.png" name="join" width="500" height="300" ></a></td>
                                    <td rowspan="1"><img src="../images/javaicon.png" width="225" height="300px"></td>
                                </tr>

                            </table>
                        </div>
                        <br>
                        <div class="col-md-6 col-sm-6 col-xs-6">


                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                <div class="flipper">
                                    <div class="front">
      <span class="">
       <i class="fa fa-compass" aria-hidden="true" style="font-size:150px;color:gold"></i>
            <div class="caption">
                            <h3>Goal</h3>
                            <p>What can we gain from this learning platform?</p>

                </div>
        </span>
                                    </div>
                                    <div class="back">
                                        <div class="back-logo"></div>
                                        <div class="back-title"></div>
                                        <table border="0" width="490px" height="240px">
                                            <tr><td colspan="2" align="center"><i class="fa fa-compass" aria-hidden="true" style="font-size:100px;color:gold"></i></td></tr>
                                            <tr><td colspan="2" align="center"><strong>GOAL</strong></td></tr>
                                            <tr>
                                                <td>    <ul><li><h5>Enrich Themselves</h5></li></td>
                                                <td>   <ul>    <li><h5>Breaking Up Traditional Learning</h5></li></td>
                                            </tr>
                                            <tr>
                                                <td>    <ul><li><h5>Improving Constantly</h5></li></td>
                                                <td>   <ul><li><h5>Enhance Student's Learning Motivation</h5></li></td>
                                                </ul></td>

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">


                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                <div class="flipper">
                                    <div class="front">
      <span class="">
       <img src="../images/why.png" width="110px" height="150px"/>

            <div class="caption">
                            <h3>Why？</h3>
                            <p>Why you need to use this learning system?</p>

                </div>
        </span>
                                    </div>
                                    <div class="back">
                                        <div class="back-logo"></div>
                                        <div class="back-title"></div>

                                        <table border="0" width="490px" height="240px">
                                            <tr><td colspan="2" align="center"><img src="../images/why2.png" width="100px" height="100px"></td></tr>
                                            <tr><td><strong></strong></td></tr>
                                            <tr>
                                                <td>    <ul><li><h5>Learning programming is not easy</h5></li></td>
                                                <td>   <ul>    <li><h5>Interesting Way to Learn Programming?</h5></li></td>
                                            </tr>
                                            <tr>
                                                <td>    <ul><li><h5>Traditional Learning Is Boring </h5></li></td>
                                                <td>   </td>
                                                </ul></td>

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </center>
                <!----------------- Login View -------------------------->
                @else
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a href="/tutorial">
                            <div class="thumbnail"><br>
                                <font color="#003D79"> <i class="fa fa-book" aria-hidden="true" style="font-size:60px;"></i></font>
                                <div class="caption">
                                    <font color="#003D79"><h3>Tutorial Note</h3></font>
                                    <font color="#003D79"><p>You can view tutorial and do pratice here</p></font>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a href="/playMenu">
                            <div class="thumbnail"><br>
                                <font color="#01814A"><i class="fa fa-gamepad" aria-hidden="true" style="font-size:60px;"></i></font>
                                <font color="#01814A"><h3>Play game</h3></font>
                                <font color="#01814A"><p>You can play different types and topics' game here</p></font>
                                <font color="#01814A"><p>You can get gold here.</p></font>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a href="/rules">
                            <div class="thumbnail"><br>
                                <font color="#CE0000"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size:60px;"></i></font>
                                <div class="caption">
                                    <font color="#CE0000"><h3>Challenge</h3></font>
                                    <font color="#CE0000"><p>You can play challenging game here</p></font>
                                    <font color="#CE0000"><p>You can get gold and point here.</p></font>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{--<div class="col-md-4 col-sm-6 col-xs-12">--}}
                    {{--<a href="intro.html">--}}
                    {{--<div class="thumbnail"><br>--}}
                    {{--<i class="fa fa-bug" aria-hidden="true" style="font-size:60px;"></i>--}}
                    {{--<div class="caption">--}}
                    {{--<h3>Debug tool</h3>--}}
                    {{--<p>You can use debug tool here</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-6 col-xs-12">--}}
                    {{--<a href="intro.html">--}}
                    {{--<div class="thumbnail"><br>--}}
                    {{--<i class="fa fa-users" aria-hidden="true" style="font-size:60px;"></i>--}}
                    {{--<div class="caption">--}}
                    {{--<h3>Forum</h3>--}}
                    {{--<p>You can chat with other users here</p>--}}

                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a href="/ranking">
                            <div class="thumbnail"><br>
                                <i class="fa fa-trophy" aria-hidden="true" style="font-size:60px;"></i>
                                <div class="caption">
                                    <h3>Ranking</h3>
                                    <p>You can view the ranking here</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a href="/profile">
                            <div class="thumbnail"><br>
                                <i class="fa fa-users" aria-hidden="true" style="font-size:60px;"></i>
                                <div class="caption">
                                    <h3>Profile</h3>
                                    <p>You can view the profile here</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a href="shop">
        <div class="thumbnail"><br>
            <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:60px;"></i>
            <div class="caption">
                <h3>Shop</h3>
                <p>You can use gold to buy items to use in the game here</p>
            </div>
        </div>
    </a>
</div>
@endif
</div>
</div>
<!-- /.row -->
</div>
@endsection

<style type="text/css">
.thumbnail{
width:300px;
height:300px;

}

</style>
<style>
.flip-container {
-webkit-perspective: 1000;
-moz-perspective: 1000;
-o-perspective: 1000;
perspective: 1000;

border: 0px solid #ccc;
}

.flip-container:hover .flipper,
.flip-container.hover .flipper {
-webkit-transform: rotateY(180deg);
-moz-transform: rotateY(180deg);
-o-transform: rotateY(180deg);
transform: rotateY(180deg);
}

.flip-container, .front, .back {
width: 500px;
height: 250px;
}

.flipper {
-webkit-transition: 0.6s;
-webkit-transform-style: preserve-3d;

-moz-transition: 0.6s;
-moz-transform-style: preserve-3d;

-o-transition: 0.6s;
-o-transform-style: preserve-3d;

transition: 0.6s;
transform-style: preserve-3d;

position: relative;
}

.front, .back {
-webkit-backface-visibility: hidden;
-moz-backface-visibility: hidden;
-o-backface-visibility: hidden;
backface-visibility: hidden;

position: absolute;
top: 0;
left: 0;
}

.front {
background:0 0 no-repeat;
z-index: 2;
}

.back {
-webkit-transform: rotateY(180deg);
-moz-transform: rotateY(180deg);
-o-transform: rotateY(180deg);
transform: rotateY(180deg);

background: #f8f8f8;
}

.front .name {
font-size: 2em;
display: inline-block;
background: rgba(33, 33, 33, 0.9);
color: #f8f8f8;
font-family: Courier;
padding: 5px 10px;
border-radius: 5px;
bottom: 60px;
left: 25%;
position: absolute;
text-shadow: 0.1em 0.1em 0.05em #333;

-webkit-transform: rotate(-20deg);
-moz-transform: rotate(-20deg);
-o-transform: rotate(-20deg);
transform: rotate(-20deg);
}

.back-logo {
position: absolute;
top: 40px;
left: 90px;
width: 160px;
height: 117px;
background: 0 0 no-repeat;
}

.back-title {
font-weight: bold;
color: #00304a;
position: absolute;
top: 180px;
left: 0;
right: 0;
text-align: center;
text-shadow: 0.1em 0.1em 0.05em #acd7e5;
font-family: Courier;
font-size: 2em;
}

.back p {
position: absolute;
bottom: 40px;
left: 0;
right: 0;
text-align: center;
padding: 0 20px;
font-family: arial;
line-height: 2em;
}
</style>

