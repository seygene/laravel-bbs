@extends('layouts.app')

@section('content')

    <div class="page-header">
        <h4>게시판 글 쓰기</h4>
    </div>

    <form action="{{ route('articles.store') }}" method="POST">
        {!! csrf_field() !!}

        @include('articles.partial.form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">저장하기</button>
        </div>
    </form>
@endsection