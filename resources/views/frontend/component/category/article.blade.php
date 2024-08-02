<h1 class="h2 mb-4">Hiển thị mục theo danh mục : <mark>{{ $category->name }}</mark></h1>

@foreach ($articles as $article)
<article class="card mb-4">
    <div class="post-slider">
        <img src="{{ $article->articlesImage->image_url }}" class="card-img-top" alt="post-thumb">
    </div>
    <div class="card-body">
        <h3 class="mb-3"><a class="post-title" href="post-details.html">{{ $article->name }}</a></h3>
        <ul class="card-meta list-inline">
            <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                    <img src="{{ $article->user->image }}">
                    <span>{{ $article->user->name }}</span>
                </a>
            </li>
            <li class="list-inline-item">
                <i class="ti-timer"></i>{{ date('H:i:s', strtotime($article->created_at)) }}
            </li>
            <li class="list-inline-item">
                <i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($article->created_at)) }}
            </li>
            <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                    @foreach ($article->tags as $tag)
                    <li class="list-inline-item"><a href="tags.html">{{ $tag['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <p>{{ $article->summary }}</p>
        <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
    </div>
</article>
@endforeach
<ul class="pagination justify-content-center">
    {{ $articles->links() }}
</ul>