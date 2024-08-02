@extends('layout.client')
@section('clientContent')

<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  mb-5 mb-lg-0">
                @include('frontend.component.category.article')
            </div>

            <aside class="col-lg-4 sidebar-home">
                <!-- Search -->
                @include('frontend.component.search')
                <!-- about me -->
                @include('frontend.component.about_me')
                <!-- authors -->
                @include('frontend.component.author')
                <!-- mail -->
                @include('frontend.component.mail')
                <!-- categories -->
                @include('frontend.component.category')
                <!-- tags -->
                @include('frontend.component.tag')
                <!-- recent post -->
                @include('frontend.component.recent_post')
            </aside>
        </div>
    </div>
</section>
@endsection