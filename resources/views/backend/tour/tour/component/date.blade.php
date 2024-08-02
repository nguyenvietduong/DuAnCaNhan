<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn ngày khởi hành </h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row allDate mb15">
                    <label for="" class="control-label text-left">Chọn ngày <span
                            class="text-danger">(*)</span></label>
                    @if (isset($tour->tour_dates))
                        @foreach ($tour->tour_dates as $key => $val)
                            <div class="form-row formDate mb15">
                                <div class="deleteDate"><i class="fa fa-trash"></i></div>
                                <input type="date" name="time[]" value="{{ old('time', $val) }}"
                                    class="form-control" placeholder="" autocomplete="off">
                            </div>
                        @endforeach
                    @else
                        <input type="date" name="time[]" value="" class="form-control mb15" placeholder=""
                            autocomplete="off">
                    @endif
                </div>
                <p class="addDate">Thêm ngày khởi hành</p>
            </div>
        </div>
    </div>
</div>
