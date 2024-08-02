<form method="post" action="{{ route('article.detail.add.comment', $article->id) }}">
    @csrf
    <div class="row">
        <div class="form-group col-md-12">
            <textarea class="form-control shadow-none" name="content" rows="7" required>{{ old('content') }}</textarea>
        </div>

    </div>
    <button class="btn btn-primary" type="submit">Comment Now</button>
</form>