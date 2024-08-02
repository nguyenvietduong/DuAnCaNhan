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
    <form action="{{ route('destination.update', $destination->id) }}" method="post" class="box">
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
                                        <input type="text" name="name" value="{{ $destination->name ?? '' }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Quận/Huyện </label>
                                        <select name="district_id" class="form-control districts setupSelect2 location"
                                            data-target="wards">
                                            <option value="0">[Chọn Quận/Huyện]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row mb20">
                                        <label for="" class="control-label text-left">Thành Phố</label>
                                        <select name="province_id" class="form-control setupSelect2 province location"
                                            data-target="districts">
                                            <option value="">[Chọn Thành Phố]</option>
                                            @if (isset($provinces))
                                                @foreach ($provinces as $province)
                                                    <option @if (old('province_id') == $province->code) selected @endif
                                                        value="{{ $province->code }}">{{ $province->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Phường/Xã </label>
                                        <select name="ward_id" class="form-control setupSelect2 wards">
                                            <option value="0">[Chọn Phường/Xã]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Mô tả </label>
                                        <input type="text" name="description" value="{{ $destination->description ?? null }}"
                                            class="form-control" placeholder="" autocomplete="off">
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

    <script>
        var province_id = '{{ isset($destination->province_id) ? $destination->province_id : old('province_id') }}'
        var district_id = '{{ isset($destination->district_id) ? $destination->district_id : old('district_id') }}'
        var ward_id = '{{ isset($destination->ward_id) ? $destination->ward_id : old('ward_id') }}'
    </script>


@endsection
