@extends('layout.client')
@section('clientContent')
<div class="py-3"></div>

<section class="section">
    <div class="container">
        <div class="row justify-content-center">

            @include('frontend.component.search.title')
            @include('frontend.component.search.main')

        </div>
    </div>
</section>
@endsection