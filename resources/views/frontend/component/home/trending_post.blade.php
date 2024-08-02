<div class="col-lg-4 mb-5">
    <h2 class="h5 section-title">Trending Post</h2>

    @foreach($trendingPosts as $post)
        <article class="card mb-4">
            <div class="card-body d-flex">
                <img class="card-img-sm" src="{{ $post->articlesImage->image_url }}">
                <div class="ml-3">
                    <h4><a href="{{ route('article.detail', $post->id) }}" class="post-title">{{ $post->name }}</a>
                    </h4>
                    <ul class="card-meta list-inline mb-0">
                        <li class="list-inline-item mb-0">
                            <i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($post->created_at)) }}
                        </li>
                        <li class="list-inline-item mb-0">
                            <i class="ti-timer"></i>{{ date('H:i:s', strtotime($post->created_at)) }}
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    @endforeach
</div>