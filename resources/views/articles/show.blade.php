@extends('app')

@section('description')
    Описание страницы {{ $article->title }}
@stop

@section('keywords')
    Ключевые слова страницы {{ $article->title }}
@stop

@section('title')
    {{ $article->title }}
@stop

@section('content')

    <!-- Blog Post -->
    <div class="card mb-4 margin-top-24">
        <div class="card-body">
            <h1 class="card-title">{{ $article->title }}</h1>
            <p class="card-text">{!! $article->text !!}</p>
        </div>
        <div class="card-footer text-muted">
            Дата публикации: {{ Carbon\Carbon::parse($article->published_at)->format('d.m.Y H:i') }}
        </div>
    </div>

    <h2>Комментарии:</h2>

    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <hr>
            <p><strong>E-mail автора: {{ $comment->email }}</strong></p>
            <p>{{ $comment->text }}</p>
            <p>Дата добавления: {{ Carbon\Carbon::parse($comment->added_on)->format('d.m.Y H:i') }}</p>
        @endforeach
    @else
        <hr>
        Комментариев пока нет.
    @endif

    <hr>
    <h3>Добавить комментарий:</h3>
    {{ Form::open() }}
    <div class="form-group">
        {{ Form::label('email', 'Ваш e-mail:') }}
        {{ Form::email('email', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('text', 'Текст комментария:') }}
        {{ Form::textarea('text', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::button('Добавить', ['type' => 'submit', 'class' => 'btn btn-success form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::hidden('article_id', $article->id) }}
    </div>
    {{ Form::close() }}

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@stop