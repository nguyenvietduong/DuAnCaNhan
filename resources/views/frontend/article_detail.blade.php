@extends('layout.client')
@section('clientContent')
<div class="py-4"></div>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            @include('frontend.component.article_detail.main')
            @include('frontend.component.article_detail.comment')
        </div>
    </div>
</section>
@endsection