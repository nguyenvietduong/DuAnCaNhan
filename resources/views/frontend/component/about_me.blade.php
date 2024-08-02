@if (Auth::check())
<div class="widget widget-about">
    <h4 class="widget-title">{{ Auth::user()->name }}</h4>
    <img class="img-fluid" src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}">
    <p><b>{{ Auth::user()->email }}</b></p>

    <a href="about-me.html" class="btn btn-primary mb-2">About me</a>
</div>
@endif