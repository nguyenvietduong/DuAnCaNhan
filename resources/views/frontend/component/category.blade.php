<div class="widget widget-categories">
    <h4 class="widget-title"><span>Categories</span></h4>
    <ul class="list-unstyled widget-list">
        @foreach ($categories as $category)
            <li><a href="{{ route('category', $category->id) }}" class="d-flex">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>