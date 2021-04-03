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
    <section class="s-club-cards club-cards-lite">
        <div class="container">
            <h2 class="title-decor">Club <span>Cards</span></h2>
            <p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem ut, venenatis dapibus miq.</p>
            <div class="row">
                @foreach($packages as $row)
                <div class="col-md-4 club-card-col">
                    <div class="club-card-item">
                        <div class="price-cover">
                            <div class="price">{{$row->price}}</div>
                            <div class="date">{{$row->duration}}</div>
                        </div>
                        <div class="club-card-text">{{$row->about_package}} </div>
                        <a href="{{route('Packages.singlePackage',[$id])}}" class="btn">More Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection