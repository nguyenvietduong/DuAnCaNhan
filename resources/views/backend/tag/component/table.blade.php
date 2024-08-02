<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên nhãn</th>
            <th>Slug</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($tags) && is_object($tags))
            @foreach ($tags as $tag)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $tag->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $tag->name }}
                    </td>
                    <td>
                        {{ $tag->slug }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('tag.delete', $tag->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $tags->links('pagination::bootstrap-4') }}
