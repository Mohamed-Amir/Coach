@extends('Fronted.layouts.master')

@section('title')
    profile
@endsection

@section('content')
    <section class="s-header-title" style="background-image: url(/Fronted/img/bg-1-min.png);">
        <div class="container">
            <h1 class="title">Profile</h1>
            <ul class="breadcrambs">
                <li><a href="/">Home</a></li>
                <li>Profile</li>
            </ul>
        </div>
    </section>
    <!-- ============= HEADER-TITLE END ============= -->

    <!-- ============== S-ABOUT-PROGRAM ============== -->

    <section class=" pt-150 rpt-100 profile">
        <!-- partial -->
        <div class="main-panel">
            <div class="container">


                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="profile-card">


                                <div class="profile-content">
                                    <div class="profile-name">Your name</div>
                                    <div class="profile-designation">Job name</div>
                                    <p class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
                                    <ul class="profile-info-list">
                                        <a href="{{url('User.my_profile')}}" class="profile-info-list-item"><i class="mdi mdi-eye"></i>Timeline</a>
                                        <a href="profile-my_program.html" class="profile-info-list-item"><i class="mdi mdi-bookmark-check"></i>My programs</a>
                                        <a href="profile-payment.html" class="profile-info-list-item"><i class="mdi mdi-bookmark-check"></i>Payment</a>
                                        <a href="" class="profile-info-list-item"><i class="mdi mdi-account"></i>Logout</a>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title font-weight-bold">About</p>
                                <hr>
                                <p class="card-description">User Information</p>
                                <ul class="about">
                                    <li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Name:</span><span class="about-item-detail">{{Auth::user()->name}}</span><a href="" class="about-item-edit">Edit</a></li>
                                    <li class="about-items"><i class="mdi mdi-lock-outline icon-sm "></i><span class="about-item-name">Password:</span><span class="about-item-detail">**********</span> <a href="" class="about-item-edit">Edit</a></li>
                                </ul>
                                <p class="card-description">Contact Information</p>
                                <ul class="about">
                                    <li class="about-items"><i class="mdi mdi-phone icon-sm "></i><span class="about-item-name">Phone:</span><span class="about-item-detail">{{Auth::user()->phone}}</span><a href="" class="about-item-edit">Edit</a></li>

                                    <li class="about-items"><i class="mdi mdi-email-outline icon-sm "></i><span class="about-item-name">Email:</span><span class="about-item-detail"><a href="">{{Auth::user()->email}}</a></span> <a href="" class="about-item-edit">Edit</a></li>

                                </ul>



                            </div>
                        </div>
                    </div>

                </div>




            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </section>
@endsection