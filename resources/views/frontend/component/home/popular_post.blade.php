<div class="col-lg-4 mb-5">
    <h2 class="h5 section-title">Popular Post</h2>

    @foreach ($popularPosts as $popularPost)
    <article class="card">
        <div class="post-slider slider-sm">
            <img src="{{ $popularPost->articlesImage->image_url }}" class="card-img-top" alt="post-thumb">
        </div>
        <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('article.detail', $popularPost->id) }}">{{ $popularPost->name }}</a></h3>
            <ul class="card-meta list-inline">
                <li class="list-inline-item">
                    <a href="" class="card-meta-author">
                        <img src="{{ $popularPost->user->image }}" alt="Kate Stone">
                        <span>{{ $popularPost->user->name }}</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <i class="ti-timer"></i>{{ date('H:i:s', strtotime($popularPost->created_at)) }}
                </li>
                <li class="list-inline-item">
                    <i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($popularPost->created_at)) }}
                </li>
                <li class="list-inline-item">
                    <ul class="card-meta-tag list-inline">
                        @foreach ($popularPost->tags as $tag)
                        <li class="list-inline-item"><a href="tags.html">{{ $tag['name'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <p>{{ $popularPost->summary }}</p>
            <a href="{{ route('article.detail', $popularPost->id) }}" class="btn btn-outline-primary">Read More</a>
        </div>
    </article>
    @endforeach
</div>