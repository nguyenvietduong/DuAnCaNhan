@extends('layout.admin')
@section('adminContent')
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']])
<form action="{{route('system.store')}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">{{ $config['seo']['messages']['title'] }}</div>
                    <div class="panel-description">{{ $config['seo']['messages']['description'] }}</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Tên công ty</span>
                                    </label>
                                    <input type="" name="config[homepage_company]"
                                        value="{{ $systems['homepage_company'] ?? "" }}" class="form-control"
                                        placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Email công ty</span>


                                    </label>
                                    <input type="" name="config[email]" value="{{ $systems['email'] ?? "" }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Số điện thoại công ty</span>


                                    </label>
                                    <input type="" name="config[phone]" value="{{ $systems['phone'] ?? "" }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Biểu tượng</span>
                                        <span class="system-link text-danger">Click vào ô phía dưới để upload ảnh</span>
                                    </label>
                                    <input type="" name="config[icon]" value="{{ $systems['icon'] ?? "" }}"
                                        class="form-control upload-image" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Ảnh đại diện</span>
                                        <span class="system-link text-danger">Click vào ô phía dưới để upload ảnh</span>
                                    </label>
                                    <input type="" name="config[image]" value="{{ $systems['image'] ?? "" }}"
                                        class="form-control upload-image" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Copyright</span>


                                    </label>
                                    <input type="" name="config[homepage_copyright]"
                                        value="{{ $systems['homepage_copyright'] ?? "" }}" class="form-control"
                                        placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Tình trạng website</span>
                                    </label>
                                    @php

                                    @endphp
                                    <select name="config[company_status]" id="" class="form-control setupSelect2">
                                        @foreach (config('apps.setup.company_status') as $val)
                                            <option value="{{$val}}" {{(isset($systems['company_status']) && $systems['company_status'] === $val) ? 'selected' : ''}}>
                                                {{$val}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="uk-flex uk-flex-space-between">
                                        <span>Giới thiệu ngắn</span>
                                    </label>

                                    <textarea name="config[company_content]" class="form-control ck-editor"
                                        id="ckContent"
                                        data-height="500">{!! $systems['company_content'] ?? "" !!}</textarea>
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