@extends('Fronted.layouts.master')

@section('title')
    Sign up
@endsection

@section('content')
    <section class="s-header-title" style="background-image: url(/Fronted/img/bg-1-min.png);">
        <div class="container">
            <h1 class="title">Sign up</h1>
            <ul class="breadcrambs">
                <li><a href="/">Home</a></li>
                <li>Sign up</li>
            </ul>
        </div>
    </section>
<section class="s-about signup">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form id="sign_upForm" action="{{url('User.sign_up')}}" method="post">

                    @csrf

                    <label><b>Name</b></label>
                    <input type="text" placeholder="Name"  name="name">
                    <label><b>Phone</b></label>
                    <input type="text" placeholder="Phone" name="phone">
                    <label><b>Email</b></label>
                    <input type="text" placeholder="Email" required name="email">
                    <label><b>Password</b></label>
                    <input type="text" placeholder="Password" required name="password">
                    <input type="checkbox" checked="checked">Remember


                    <br />
                    <div class="clearfix">
                        <button id="save" type="submit" class="btn">Sign up</button>

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
        $('#sign_upForm').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('applying your request', 'info', 'processing your request', false);
            var formData = new FormData($('#sign_upForm')[0]);
            $.ajax({
                url: '/saveUser',
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

