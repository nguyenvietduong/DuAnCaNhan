<div class="container">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <h1 class="mb-5">What Would You <br> Like To Read Today?</h1>
            <ul class="list-inline widget-list-inline">
                @foreach ($categories as $category)
                <li class="list-inline-item"><a href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>