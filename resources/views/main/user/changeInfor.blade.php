@extends('layouts.app')

@section('content')

<div id="page-wrapper">
    <div class="row-fluid">
        <div class="col-md-10 col-sm-10 col-xs-10">
            <h1>Update Information</h1>

            @if (Session::has('message'))
                <div class="text-danger">
                    {{Session::get('message')}}
                </div>
            @endif
            <hr />

            <form method="post" action="{{url('/updateInfor')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="mypassword">Current password: </label>
                    <input type="password" name="mypassword" class="form-control">
                    <div class="text-danger">
                        {{$errors -> first('mypassword')}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">New password: </label>
                    <input type="password" name="password" class="form-control">
                    <div class="text-danger">
                        {{$errors -> first('password')}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="mypassword">Confimate password: </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update Information</button>
            </form>
        </div>
    </div>
</div>
@endsection
