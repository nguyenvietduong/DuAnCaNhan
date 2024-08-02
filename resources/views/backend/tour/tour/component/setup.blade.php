<div class="ibox">
    <div class="ibox-title">
        <h5>Cài đặt đường dẫn</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-left">Link bản đồ <span
                            class="text-danger">(*)</span></label>
                    <input type="text" name="link" value="{{ old('link', $tour->link ?? '') }}" class="form-control"
                        placeholder="" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="row mb30">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-left">Đường dẫn <span
                            class="text-danger">(*)</span></label>
                    <input type="text" name="slug" value="{{ old('slug', $tour->slug ?? '') }}"
                        class="form-control inputSlug" placeholder="" autocomplete="off">
                </div>
            </div>
        </div>
    </div>
</div>
