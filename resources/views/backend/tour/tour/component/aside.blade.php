<div class="ibox w">
    <div class="ibox-title">
        <h5>Thông tin chi tiết</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label class="control-label">Chọn danh mục cha </label>
                    <select name="category_id" class="form-control setupSelect2" id="">
                        @foreach ($tourCategories as $tourCategory)
                            <option
                                {{ $tourCategory->id == old('category_id', isset($tour->category_id) ? $tour->category_id : '') ? 'selected' : '' }}
                                value="{{ $tourCategory->id }}">{{ $tourCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label class="control-label">Chọn điểm đến </label>
                    <select name="destination_id" class="form-control setupSelect2" id="">
                        @foreach ($destinations as $destination)
                            <option
                                {{ $destination->id == old('destination_id', isset($tour->destination_id) ? $tour->destination_id : '') ? 'selected' : '' }}
                                value="{{ $destination->id }}">{{ $destination->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="">Mã tour </label>
                    <input type="text" name="code" value="{{ old('code', $tour->code ?? null) }}"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="">Giá</label>
                    <input type="text" name="price"
                        value="{{ old('price', isset($tour) ? number_format($tour->price, 0, ',', '.') : '') }}"
                        class="form-control int">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <label class="control-label">Dịch vụ đi kèm </label>
                    <select multiple name="service[]" class="form-control setupSelect2" id="">
                        @foreach ($services as $service)
                            <option @if (is_array(old('service', isset($tours->service) ? $tours->service : [])) &&
                                    in_array($service->id, old('service', isset($tour->service) ? $tour->service : []))) selected @endif value="{{ $service->id }}">
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.tour.tour.component.date')

@include('backend.tour.tour.component.publish')
