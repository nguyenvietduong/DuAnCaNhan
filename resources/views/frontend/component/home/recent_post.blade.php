<div class="col-lg-8  mb-5 mb-lg-0">
    <h2 class="h5 section-title">Recent Post</h2>
    @foreach ($recentPosts as $recentPost)
    <article class="card mb-4">
        <div class="post-slider">
            <img src="{{ $recentPost->articlesImage->image_url }}" class="card-img-top" alt="post-thumb">
        </div>
        <div class="card-body">
            <h3 class="mb-3"><a class="post-title" href="{{ route('article.detail', $recentPost->id) }}">{{ $recentPost->name }}</a></h3>
            <ul class="card-meta list-inline">
                <li class="list-inline-item">
                    <a href="author-single.html" class="card-meta-author">
                        <img src="{{ $recentPost->user->image }}" alt="">
                        <span>{{ $recentPost->user->name }}</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <i class="ti-timer"></i>{{ date('H:i:s', strtotime($recentPost->created_at)) }}
                </li>
                <li class="list-inline-item">
                    <i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($recentPost->created_at)) }}
                </li>
                <li class="list-inline-item">
                    <ul class="card-meta-tag list-inline">
                        @if ($recentPost->tags && $recentPost->tags->count())
                        @foreach ($recentPost->tags as $tag)
                        <li class="list-inline-item"><a href="tags.html">{{ $tag['name'] }}</a></li>
                </li>
                @endforeach
                @else
                <li class="list-inline-item"><a href="tags.html"><b>No tags</b></a></li>
                @endif
            </ul>
            </li>
            </ul>
            <p>{{ $recentPost->summary }}</p>
            <a href="{{ route('article.detail', $recentPost->id) }}" class="btn btn-outline-primary">Read More</a>
        </div>
    </article>
    @endforeach

    <ul class="pagination justify-content-center">
        {{ $recentPosts->links() }}
    </ul>

</div>