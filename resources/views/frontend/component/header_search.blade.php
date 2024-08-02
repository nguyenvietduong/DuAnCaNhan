<div class="order-2 order-lg-3 d-flex align-items-center">
    <!-- search -->
    <form class="search-bar" action="{{ route('search') }}">
        <input id="search-query" name="search" type="search" placeholder="Type &amp; Hit Enter...">
    </form>

    <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
        <i class="ti-menu"></i>
    </button>

    @include('frontend.component.header_auth')
</div>