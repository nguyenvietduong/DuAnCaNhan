@extends('layout.admin')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
    @include('backend.dashboard.component.formError')
    <form action="{{ route('article.destroy', $article->id) }}" method="post" class="box">
        @include('backend.dashboard.component.destroy', ['model' => $article])
    </form>
@endsection