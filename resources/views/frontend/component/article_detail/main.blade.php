<div class=" col-lg-9   mb-5 mb-lg-0">
    <article>
        <div class="post-slider mb-4">
            <img src="{{ $article->articlesImage->image_url }}" class="card-img" alt="">
        </div>

        <h1 class="h2">{{ $article->name }}</h1>
        <ul class="card-meta my-3 list-inline">
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
        <div class="content">
            <p>{!! $article->content !!}</p>
        </div>
    </article>

</div>