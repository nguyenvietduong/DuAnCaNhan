@if (!empty($articles) && $articles->count())
<div class="col-lg-10">
    @foreach ($articles as $article)
    <article class="card mb-4">
        <div class="row card-body">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="post-slider slider-sm">
                    <img src="{{ $article->articlesImage->image_url }}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="h4 mb-3"><a class="post-title" href="post-elements.html">{{ $article->name }}</a></h3>
                <ul class="card-meta list-inline">
                    <li class="list-inline-item">
                        <a href="author-single.html" class="card-meta-author">
                            <img src="{{ $article->user->image }}" alt="{{ $article->user->name }}">
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
                <a href="post-elements.html" class="btn btn-outline-primary">Read More</a>
            </div>
        </div>
    </article>
    @endforeach
</div>
@else
<div class="col-lg-10 text-center">
    <img class="mb-5" src="\frontend\images/no-search-found.svg" alt="">
    <h3>No Search Found</h3>
</div>
@endif