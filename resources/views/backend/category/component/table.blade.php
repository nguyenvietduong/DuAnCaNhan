<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Hình ảnh</th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th class="text-center">Trạng thái </th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($categories) && is_object($categories))
            @foreach ($categories as $category)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $category->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <img src="{{ $category->image }}" width="50px" height="50px" alt="">
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->slug }}
                    </td>
                    <td>
                        {{ $category->description }}
                    </td>
                    <td class="text-center js-switch-{{ $category->id }}">
                        <input type="checkbox" value="{{ $category->publish }}" class="js-switch status"
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $category->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $category->id }}" />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $categories->links('pagination::bootstrap-4') }}
