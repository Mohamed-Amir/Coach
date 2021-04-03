@extends('Fronted.layouts.master')

@section('title')
    Packages
@endsection

@section('content')

    <section class="s-header-title" style="background-image: url(/Fronted/img/bg-1-min.png);">
        <div class="container">
            <h1 class="title">Packages</h1>
            <ul class="breadcrambs">
                <li><a href="/">Home</a></li>
                <li>Packages</li>
            </ul>
        </div>
    </section>

    <section class="s-about" style="background: #fff;">
        <div class="container">
            <img class="about-effect-tringle" src="/Fronted/img/tringle-about-top.svg" alt="img">
            <div class="row about-row">
                <div class="col-md-5 about-img-col">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/klZNNUz4wPQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ></iframe>
                    </div>
                </div>
                <div class="col-md-7 about-info-cover">
                    <h2 class="title-decor">About <span>Program</span></h2>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmmpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut <a href="contacts.html">enim ad minim</a> veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
                    <ul class="about-cont">
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:18004886040">1-800-488-6040</a></li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:fitmax@gmail.com">fitmax@gmail.com</a></li>
                    </ul>
                    <a href="signup.html" class="btn">Subscibe now</a>
                </div>
            </div>
        </div>
    </section>

@endsection