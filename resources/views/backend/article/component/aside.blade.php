<div class="ibox w">
    <div class="ibox-title">
        <h5>Thêm ảnh đại diện </h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image-target"><img src="{{ old('image', $article->articlesImage->image_url ?? '') ? old('image', $article->articlesImage->image_url ?? '') : 'backend/img/not-found.png' }}" alt=""></span>
                    <input type="hidden" name="image" value="{{ old('image', $article->articlesImage->image_url ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn danh mục bài viết</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="category_id" class="form-control" id="">
                            @foreach ($categories as $key => $val)
                            <option {{ isset($article->category_id) && $val['id'] == $article->category_id ? 'selected' : '' }} {{ $val['id'] == old('category_id') ? 'selected' : '' }} value="{{ $val['id'] }}">
                                {{ $val['name'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn thẻ bài viết</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <label for="tags">Chọn thẻ:</label>
                        <select id="tags" name="tags[]" multiple="multiple" style="width: 100%" class="form-select form-select-sm">
                            @if (isset($tags))
                            @foreach ($article->tags as $item)
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $item['id'] == $tag->id ? "selected" : "" }}>{{ $tag->name }}</option>
                            @endforeach
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn tình trạng</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="publish" class="form-control setupSelect2" id="">
                            @foreach (config('apps.setup.publish') as $key => $val)
                            <option {{ $key == old('publish', isset($article->publish) ? $article->publish : '') ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>