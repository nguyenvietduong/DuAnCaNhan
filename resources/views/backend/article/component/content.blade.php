@if (!isset($offTitle))
    <div class="row mb15">
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-label text-left">Tiêu đề <span
                        class="text-danger">(*)</span></label>
                <input type="text" name="name" value="{{ old('name', $article->name ?? '') }}" class="form-control"
                    placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
            </div>
        </div>
    </div>
@endif
@if (!isset($offCanonical))
    <div class="row mb30">
        <div class="col-lg-12">
            <div class="form-row">
                <label for="" class="control-label text-left">Đường dẫn<span
                        class="text-danger">(*)</span></label>
                <input type="text" name="slug" value="{{ old('slug', $article->slug ?? '') }}"
                    class="form-control inputSlug" placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
            </div>
        </div>
    </div>
@endif
<div class="row mb30">
    <div class="col-lg-12">
        <div class="form-row">
            <label for=""
                class="control-label text-left">Tóm tắt <span
                class="text-danger">(*)</span></label>
            <textarea name="summary" class="custom-area form-control" {{ isset($disabled) ? 'disabled' : '' }}
                data-height="100">{{ old('summary', $article->summary ?? '') }}</textarea>
        </div>
    </div>
</div>
@if (!isset($offContent))
    <div class="row mb30">
        <div class="col-lg-12">
            <div class="form-row">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <label for=""
                        class="control-label text-left">Nội dung <span
                            class="text-danger">(*)</span> </label>
                </div>
                <textarea name="content" class="form-control ck-editor" placeholder="" autocomplete="off" id="ckContent"
                    data-height="500" {{ isset($disabled) ? 'disabled' : '' }}>{{ old('content', $article->content ?? '') }}</textarea>
            </div>
        </div>
    </div>
@endif

