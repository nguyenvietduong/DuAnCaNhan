<div class="widget widget-author">
    <h4 class="widget-title">Authors</h4>
    @foreach ($authors as $author)
    <div class="media align-items-center">
        <div class="mr-3">
            <img class="widget-author-image" src="{{ $author->image }}">
        </div>
        <div class="media-body">
            <h5 class="mb-1"><a class="post-title" href="author-single.html">{{ $author->name }}</a></h5>
            <span>{{ $author->last_name . ' ' . $author->first_name }}</span>
        </div>
    </div>
    @endforeach
</div>