<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên</th>
            <th class="text-center" style="width: 300px">Địa chỉ</th>
            <th>Mô tả</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($destinations) && is_object($destinations))
            @foreach ($destinations as $destination)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $destination->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $destination->name }}
                    </td>
                    <td  class="text-center">
                        {{ $destination->ward->name }}, {{ $destination->district->name }},
                        {{ $destination->province->name }}
                    </td>
                    <td>
                        {{ $destination->description }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('destination.edit', $destination->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('destination.delete', $destination->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $destinations->links('pagination::bootstrap-4') }}
