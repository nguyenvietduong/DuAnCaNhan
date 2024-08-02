<div class="col-lg-4 mb-5">
    <h2 class="h5 section-title">Hot Post</h2>
    @foreach($hotPosts as $post)
        <article class="card">
            <div class="post-slider slider-sm">
                <img src="{{ $post->articlesImage->image_url }}" class="card-img-top" alt="post-thumb">
            </div>

            <div class="card-body">
                <h3 class="h4 mb-3"><a class="post-title" href="{{ route('article.detail', $post->id) }}">{{ $post->name }}</a></h3>
                <ul class="card-meta list-inline">
                    <li class="list-inline-item">
                        <a href="author-single.html" class="card-meta-author">
                            <img src="{{ $post->user->image }}">
                            <span>{{ $post->user->name }}</span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <i class="ti-calendar"></i>{{ date('d/m/Y', strtotime($post->created_at)) }}
                    </li>
                    <li class="list-inline-item">
                        <i class="ti-timer"></i>{{ date('H:i:s', strtotime($post->created_at)) }}
                    </li>
                    <li class="list-inline-item">
                        <ul class="card-meta-tag list-inline">
                            @foreach ($post->tags as $tag)
                                <li class="list-inline-item"><a href="tags.html">{{ $tag['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <p>{{ $post->summary }}</p>
                <a href="{{ route('article.detail', $post->id) }}" class="btn btn-outline-primary">Read More</a>
            </div>
        </article>
    @endforeach

</div>