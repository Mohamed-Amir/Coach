@extends('Fronted.layouts.master')

@section('title')
    Contacts
@endsection

@section('content')

    <!-- =============== HEADER END =============== -->

    <!-- =============== HEADER-TITLE =============== -->
    <section class="s-header-title" style="background-image: url(/Fronted/img/bg-1-min.png);">
        <div class="container">
            <h1 class="title">Contacts</h1>
            <ul class="breadcrambs">
                <li><a href="/">Home</a></li>
                <li>Contacts</li>
            </ul>
        </div>
    </section>
    <!-- ============= HEADER-TITLE END ============= -->

    <!-- ================== S-MAP ================== -->
    <section class="s-map">
        <div id="map" class="cont-map google-map"></div>
    </section>
    <!-- ================ S-MAP END ================ -->


    <!-- ================ S-CONTACTS ================ -->
    <section class="s-contacts" style="background-image: url(Fronted/img/bg-contacts.svg);">
        <div class="container">
            <h2 class="title-decor">Contact <span>Us</span></h2>
            <p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
            <div class="row">
                <div class="col-md-5 col-lg-4">
                    <div class="contact-item">
                        <div class="contact-item-left">
                            <img src="/Fronted/img/icon-1.svg" alt="img">
                            <h4>need help</h4>
                        </div>
                        <div class="contact-item-right">
                            <ul class="contact-item-list">
                                <li>{{about()->phone1}}</li>
                                <li>{{about()->phone2}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-left">
                            <img src="/Fronted/img/icon-2.svg" alt="img">
                            <h4>questions</h4>
                        </div>
                        <div class="contact-item-right">
                            <ul class="contact-item-list">
                                <li>{{about()->team_email}}</li>
                                <li>{{about()->help_email}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-left">
                            <img src="/Fronted/img/icon-3.svg" alt="img">
                            <h4>address</h4>
                        </div>
                        <div class="contact-item-right">
                            <ul class="contact-item-list">
                                <li>{{about()->address}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <form id='contactform' action="{{route('General.contact_us')}}" name="contactform">
                        @csrf
                        <ul class="form-cover">
                            <li class="inp-name">
                                <label>Name * (required)</label>
                                <input id="name" type="text" name="name" required>
                            </li>
                            <li class="inp-email">
                                <label>E-mail * (required)</label>
                                <input id="email" type="email" name="email" required>
                            </li>
                            <li class="inp-text">
                                <label>Message * (required)</label>
                                <textarea id="comments" name="massage" required></textarea>
                            </li>
                        </ul>
                        <div class="checkbox-wrap">
                            <div class="checkbox-cover">
                                <input type="checkbox">
                                <p>By using this form you agree with the storage and handling of your data by this website.</p>
                            </div>
                        </div>
                        <div class="btn-form-cover">
                            <button id="save" type="submit" class="btn">send comment</button>
                        </div>
                    </form>
                    <div id="message"></div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUmz_Riose169lAsGLx3ckI4rsCYFnpyU&callback=initMap">
    </script>
    <script type="text/javascript">
        function initialize() {
            var latlng = new google.maps.LatLng("{{about()->lat}}","{{about()->lng}}");
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 13
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: false,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', function() {
                var iwContent = '<div id="iw_container">' +
                    '<div class="iw_title"><b>Location</b> : Noida</div></div>';
                // including content to the infowindow
                infowindow.setContent(iwContent);
                // opening the infowindow in the current map and at the current marker location
                infowindow.open(map, marker);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    @include('Admin.includes.scripts.AlertHelper')
    <script>
        $('#contactform').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('applying your request', 'info', 'processing your request ', false);
            var formData = new FormData($('#contactform')[0]);
            $.ajax({
                url: '/contact_us',
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
                        location.href='{{route('General.contacts')}}';

                        $("#save").attr("disabled", false);
                    }
                }
            });
        })
    </script>
    @endsection