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
    <form action="{{ route('booking.update', $booking->id) }}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Nhập thông tin chung của người sử dụng</p>
                            <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Họ tên <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="name" value="{{ $booking->name }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Email <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="email" value="{{ $booking->email }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Số điện thoại </label>
                                        <input type="text" name="phone" value="{{ $booking->phone }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Địa chỉ </label>
                                        <input type="text" name="address" value="{{ $booking->address }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Tour đã đặt <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="" value="{{ $booking->tour->name }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Ngày khởi hành <span
                                                class="text-danger">(*)</span></label>
                                        <input type="datetime-local" name="tour_date" value="{{ $booking->tour_date }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Số người lớn <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="adult" value="{{ $booking->adult }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Số trẻ em <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="children"
                                            value="{{ $booking->children ?? 'Không có' }}" class="form-control"
                                            placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Chọn HDV <span
                                                class="text-danger">(*)</span></label>
                                        <select name="guide_id" class="form-control setupSelect2" id="">
                                            @foreach ($guides as $guide)
                                                <option value="{{ $guide->id }}"
                                                    {{ $booking->guide_id == $guide->id ? 'selected' : '' }}>
                                                    {{ $guide->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Trạng thái <span
                                                class="text-danger">(*)</span></label>
                                        <select name="status" class="form-control setupSelect2" id="">
                                            @foreach (config('apps.setup.status') as $key => $val)
                                                <option value="{{ $key }}"
                                                    {{ $booking->status == $key ? 'selected' : '' }}>
                                                    {{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Ghi chú <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="description" value="{{ $booking->description }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Tổng giá <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name=""
                                            value="{{ number_format($booking->total, 0, ',', '.') }}đ"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right mb15">
                <a class="btn btn-primary mr10" href="">Xem danh sách chi tiết</a>
                <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
            </div>
        </div>
    </form>

    <script>
        var province_id = '{{ isset($user->province_id) ? $user->province_id : old('province_id') }}'
        var district_id = '{{ isset($user->district_id) ? $user->district_id : old('district_id') }}'
        var ward_id = '{{ isset($user->ward_id) ? $user->ward_id : old('ward_id') }}'
    </script>
@endsection
