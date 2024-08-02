@extends('layout.admin')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
    @include('backend.dashboard.component.formError')
    <form action="{{ route('tour.store') }}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Thông tin chung</h5>
                        </div>
                        <div class="ibox-content">
                            @include('backend.tour.tour.component.content', ['model' => $product ?? null])
                        </div>
                    </div>
                    @include('backend.tour.tour.component.album', ['model' => $product ?? null])
                    @include('backend.tour.tour.component.setup', ['model' => $product ?? null])
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
