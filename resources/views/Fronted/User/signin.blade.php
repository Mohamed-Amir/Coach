@extends('Fronted.layouts.master')

@section('title')
    Sign in
@endsection

@section('content')

    <section class="s-header-title" style="background-image: url(/Fronted/img/bg-1-min.png);">
        <div class="container">
            <h1 class="title">Sign in</h1>
            <ul class="breadcrambs">
                <li><a href="/">Home</a></li>
                <li>Sign in</li>
            </ul>
        </div>
    </section>
    <section class="s-about signup">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form  id="sign_inForm" action="{{url('User.sign_in')}}" method="post">
                        @csrf

                        <label><b>Email</b></label>
                        <input type="text" placeholder="Email" name="email" >
                        <label><b>Password</b></label>
                        <input type="text" placeholder="Password" name="password">
                        <br />
                        <input type="checkbox" checked="checked">Remember


                        <br />
                        <div class="clearfix">
                            <button id="save" type="submit" class="btn">Sign In</button>

                        </div>


                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    @include('Admin.includes.scripts.AlertHelper')

    <script>
        $('#sign_inForm').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('applying your request', 'info', 'processing your request ', false);
            var formData = new FormData($('#sign_inForm')[0]);
            $.ajax({
                url: '/logged',
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status == 1) {

                        $("#save").attr("disabled", false);

                        $.toast().reset('all');
                        swal(data.message, {
                            icon: "success",
                        });
                        location.href='/';

                        $("#save").attr("disabled", false);
                    }
                }
            });
        })
    </script>
@endsection