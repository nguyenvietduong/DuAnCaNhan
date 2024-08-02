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
    <form action="{{ route('admin.update', $admin->id) }}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Email <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="email" value="{{ old('email', $admin->email ?? '') }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Họ Tên <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="name" value="{{ old('name', $admin->name ?? '') }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left"> Tên </label>
                                        <input type="text" name="last_name" value="{{ old('last_name', $admin->last_name ?? '') }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left"> Họ </label>
                                        <input type="text" name="first_name" value="{{ old('first_name', $admin->first_name ?? '') }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Ảnh đại diện </label>
                                        <input type="text" name="image" value="{{ old('image', $admin->image ?? '') }}"
                                            class="form-control upload-image" placeholder="" autocomplete="off"
                                            data-upload="Images">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Ngày sinh </label>
                                        <input type="date" name="birthday"
                                            value="{{ old('birthday', isset($admin->birthday) ? date('Y-m-d', strtotime($admin->birthday)) : '') }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin liên hệ</div>
                        <div class="panel-description">Nhập thông tin liên hệ của người sử dụng</div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Thành Phố</label>
                                        <select name="province_id" class="form-control setupSelect2 province location"
                                            data-target="districts">
                                            <option value="0">[Chọn Thành Phố]</option>
                                            @if (isset($provinces))
                                                @foreach ($provinces as $province)
                                                    <option @if (old('province_id') == $province->code) selected @endif
                                                        value="{{ $province->code }}">{{ $province->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Quận/Huyện </label>
                                        <select name="district_id" class="form-control districts setupSelect2 location"
                                            data-target="wards">
                                            <option value="0">[Chọn Quận/Huyện]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Phường/Xã </label>
                                        <select name="ward_id" class="form-control setupSelect2 wards">
                                            <option value="0">[Chọn Phường/Xã]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Địa chỉ </label>
                                        <input type="text" name="address"
                                            value="{{ old('addresss', $admin->address ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Số điện thoại</label>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', $admin->phone ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Chọn Tình Trạng <span
                                            class="text-danger">(*)</span></label>
                                        <select name="publish" class="form-control setupSelect2" id="">
                                            @foreach (config('apps.setup.publish') as $key => $val)
                                                <option {{ $key == old('publish') }} value="{{ $key }}" {{ $admin->publish == $key ? "selected" : "" }}>
                                                    {{ $val }}</option>
                                            @endforeach
                                        </select>
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
        var province_id = '{{ isset($admin->province_id) ? $admin->province_id : old('province_id') }}'
        var district_id = '{{ isset($admin->district_id) ? $admin->district_id : old('district_id') }}'
        var ward_id = '{{ isset($admin->ward_id) ? $admin->ward_id : old('ward_id') }}'
    </script>
@endsection
