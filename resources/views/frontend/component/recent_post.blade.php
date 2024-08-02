<div class="widget">
    <h4 class="widget-title">Recent Post</h4>

    <!-- post-item -->
    @foreach ($recentPosts as $recentPost)
    <article class="widget-card">
        <div class="d-flex">
            <img class="card-img-sm" src="{{ $recentPost->articlesImage->image_url }}">
            <div class="ml-3">
                <h5><a class="post-title" href="{{ route('article.detail', $recentPost->id) }}">{{ $recentPost->name }}</a></h5>
                <ul class="card-meta list-inline mb-0">
                    <li class="list-inline-item mb-0">
                        <i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($recentPost->created_at)) }}
                    </li>
                </ul>
            </div>
        </div>
    </article>
    @endforeach
</div>