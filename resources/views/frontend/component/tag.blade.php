<div class="widget">
    <h4 class="widget-title"><span>Tags</span></h4>
    <ul class="list-inline widget-list-inline widget-card">
        @foreach ($tags as $tag)
        <li class="list-inline-item"><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
</div>