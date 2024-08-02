@extends('layout.admin')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['edit']['title']])
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tour.update', $tour->id) }}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Thông tin chung</h5>
                        </div>
                        <div class="ibox-content">
                            @include('backend.tour.tour.component.content')
                        </div>
                    </div>
                    @include('backend.tour.tour.component.album')
                    @include('backend.tour.tour.component.setup')
                    {{-- @include('backend.product.product.component.variant') --}}
                    {{-- @include('backend.dashboard.component.seo', ['model' => $product ?? null]) --}}
                </div>
                <div class="col-lg-3">
                    @include('backend.tour.tour.component.aside')
                </div>
            </div>
            @include('backend.dashboard.component.button')
        </div>
    </form>

@endsection
