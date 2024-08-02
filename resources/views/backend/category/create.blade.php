@extends('layout.admin')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('category.store') }}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Nhập thông tin chung của loại tour</p>
                            <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row mb20">
                                        <label for="" class="control-label text-left">Tên Loại Tour <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="form-row mb20">
                                        <label for="" class="control-label text-left">Đường Dẫn</label>
                                        <input type="text" name="slug" value="{{ old('slug') }}"
                                            class="form-control inputSlug" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Mô tả</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5">{{ $category->description ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row mb20">
                                        <label for="" class="control-label text-left">Chọn Tình Trạng <span
                                                class="text-danger">(*)</span></label>
                                        <select name="publish" class="form-control setupSelect2" id="">
                                            @foreach (config('apps.setup.publish') as $key => $val)
                                                <option {{ $key == old('publish') }} value="{{ $key }}">
                                                    {{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <span class="image img-cover image-target"><img
                                                src="{{ old('image') ? old('image') : 'backend/img/not-found.png' }}"
                                                alt=""></span>
                                        <input type="hidden" name="image" value="{{ $model->image ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right mb15">
                <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
            </div>
        </div>
    </form>

@endsection
