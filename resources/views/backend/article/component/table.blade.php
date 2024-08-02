<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:50px;">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên bài viết</th>
            <th>Người viết bài</th>
            <th>Danh mục</th>
            <th>Nhãn</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Tùy chọn</th>

        </tr>
    </thead>
    <tbody>
        @if (isset($articles) && is_object($articles))
        @foreach ($articles as $article)
        <tr id="{{ $article->id }}">
            <td>
                <input type="checkbox" value="{{ $article->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td>
                <div class="uk-flex uk-flex-middle">
                    <div class="image mr5">
                        <div class="img-cover image-article"><img src="{{ $article->articlesImage->image_url }}" alt="" width="35px"></div>
                    </div>
                    <div class="main-info">
                        <div>{{ $article->name }}</div>
                    </div>
                </div>
            </td>
            <td>
                <h6>
                    <b>
                        @if ($article->user)
                        @if ($article->user->role == 'admin')
                        ADMIN:
                        @elseif($article->user->role == 'editor')
                        EDITOR:
                        @elseif($article->user->role == 'reader')
                        Người dùng:
                        @endif
                        @else
                        Không có người dùng
                        @endif
                    </b>
                    @if ($article->user)
                    <span class="badge text-bg-info"><b>{{ $article->user->name }}</b></span>
                    @endif
                </h6>

                <ul>
                    @if ($article->user)
                    <li style="margin-bottom: 5px;">
                        <img src="{{ $article->user->image }}" alt="" width="35px" height="35px">
                    </li>
                    <li style="margin-bottom: 5px;">Họ và tên:
                        <b>{{ "{$article->user->first_name} {$article->user->last_name}" }}</b>
                    </li>
                    <li style="margin-bottom: 5px;">Email: <b>{{ $article->user->email }}</b></li>
                    <li>Số điện thoại: <b>{{ $article->user->phone }}</b></li>
                    @else
                    <li>Không có thông tin người dùng</li>
                    @endif
                </ul>
            </td>

            <td>
                <h6><span class="badge text-bg-info"><b>{{ $article->category->name }}</b></span></h6>
                <ul>
                    <li style="margin-bottom: 5px;">
                        <img src="{{ $article->category->image }}" alt="" width="35px" height="35px">
                    </li>
                    <li style="margin-bottom: 5px;">Đường dẫn: {{ $article->category->slug }}</li>
                    <li>Mô tả: {{ $article->category->description }}</li>
                </ul>
            </td>

            <td>
                @if ($article->tags && $article->tags->count())
                <ul>
                    @foreach ($article->tags as $tag)
                    <li style="margin-bottom: 5px;"><span class="badge text-bg-success">{{ $tag['name'] }}</span></li>
                    @endforeach
                </ul>
                @else
                <span><b>No tags</b></span>
                @endif
            </td>

            <td class="text-center js-switch-{{ $article->id }}">
                <input type="checkbox" value="{{ $article->publish }}" class="js-switch status " data-field="publish" data-model="{{ $config['model'] }}" {{ $article->publish == 2 ? 'checked' : '' }} data-modelId="{{ $article->id }}" />
            </td>
            <td class="text-center">
                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{ route('article.delete', $article->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

{{ $articles->links('pagination::bootstrap-4') }}