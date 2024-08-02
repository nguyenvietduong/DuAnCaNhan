<div class="col-lg-9 col-md-12">
    <div class="mb-5 border-top mt-4 pt-5">
        <h3 class="mb-4">Comments</h3>

        @foreach ($comments as $comment)
        <div class="media d-block d-sm-flex mb-4 pb-4">
            <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                <img src="{{ $comment->user->image }}" class="mr-3 rounded-circle" alt="" width="70px" height="auth">
            </a>
            <div class="media-body">
                <a href="#!" class="h4 d-inline-block mb-3">{{ $comment->user->name }}</a>

                <p>{{ $comment->content }}</p>

                <span class="text-black-800 mr-3 font-weight-600">{{ date('d/m/Y H:i:s', strtotime($comment->created_at)) }}</span>
                <!-- <a class="text-primary font-weight-600" href="#!">Reply</a> -->
            </div>
        </div>
        @endforeach

        <ul class="pagination justify-content-center">
            {{ $comments->links() }}
        </ul>
    </div>

    <div>
        <h3 class="mb-4">Comment on the article</h3>
        @include('frontend.component.article_detail.form_comment')
    </div>
</div>