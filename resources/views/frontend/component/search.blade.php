<div class="widget">
    <h4 class="widget-title"><span>Search</span></h4>
    <form action="{{ route('search') }}" class="widget-search">
        <input class="mb-3" id="search-query" name="search" type="search" placeholder="Type &amp; Hit Enter...">
        <i class="ti-search"></i>
        <button type="submit" class="btn btn-primary btn-block">Search</button>
    </form>
</div>