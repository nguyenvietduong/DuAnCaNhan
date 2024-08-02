    <div class="row mb15">
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-label text-left">Tên tour <span
                        class="text-danger">(*)</span></label>
                <input type="text" name="name" value="{{ old('name', $tour->name ?? '') }}" class="form-control"
                    placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
            </div>
        </div>
    </div>

    <div class="row mb30">
        <div class="col-lg-12">
            <div class="form-row">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <label for=""
                        class="control-label text-left">Mô tả <span
                            class="text-danger">(*)</span> </label>
                </div>
                <textarea name="description" class="form-control ck-editor" placeholder="" autocomplete="off" id="ckContent"
                    data-height="500" {{ isset($disabled) ? 'disabled' : '' }}>{{ old('description', $tour->description ?? '') }}</textarea>
            </div>
        </div>
    </div>
