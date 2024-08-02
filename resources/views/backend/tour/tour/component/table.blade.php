<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Mã Tour</th>
            <th class="text-center">Tên</th>
            <th>Điểm đến</th>
            <th>Giá tiền</th>
            <th>Danh mục</th>
            <th class="text-center">Trạng thái </th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($tours) && is_object($tours))
            @foreach ($tours as $tour)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $tour->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{$tour->code}}
                    </td>
                    <td>
                        {{ $tour->name }}
                    </td>
                    <td>
                        {{ $tour->destination->name }}
                    </td>
                    <td>
                        {{ number_format($tour->price, 0, ',', '.') }}
                    </td>
                    <td>
                        {{ $tour->tour_category->name }}
                    </td>
                    <td class="text-center js-switch-{{ $tour->id }}">
                        <input type="checkbox" value="{{ $tour->publish }}" class="js-switch status"
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $tour->publish == 2 ? 'checked' : '' }} data-modelId="{{ $tour->id }}" />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('tour.edit', $tour->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('tour.delete', $tour->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $tours->links('pagination::bootstrap-4') }}
