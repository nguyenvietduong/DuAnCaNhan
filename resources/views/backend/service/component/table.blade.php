<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên</th>
            <th>Biểu tượng</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($service) && is_object($service))
            @foreach ($service as $item)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $item->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>

                    <td>
                        <i class="{{ $item->icon }}"></i>
                    </td>

                    <td>
                        {{ $item->description }}
                    </td>

                    <td>
                        <img src="{{ $item->image }}" width="50px" height="50px" alt="">
                    </td>

                    <td class="text-center">
                        <a href="{{ route('service.edit', $item->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('service.delete', $item->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $service->links('pagination::bootstrap-4') }}
