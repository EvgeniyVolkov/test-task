@extends('app')

@section('description')
    Описание главной страницы
@stop

@section('keywords')
    Ключевые слова главной страницы
@stop

@section('title')
    Главная страница блога
@stop

@section('content')

    <h1 class="my-4">Блог
        <small>Полезные статьи</small>
    </h1>

    @if(count($articles) > 0)

        @foreach($articles as $article)

            <?php $qty = 0; ?>

            @if(count($commentsQty) > 0)

                @foreach($commentsQty as $articleCommentsQty)
                    @if($articleCommentsQty->article_id == $article->id)
                        <?php $qty = $articleCommentsQty->commentsQty;
                        break; ?>
                    @endif
                @endforeach

            @endif

            <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title"><a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a></h2>
                    <p class="card-text">
                        Дата публикации: {{ Carbon\Carbon::parse($article->published_at)->format('d.m.Y H:i') }}
                    </p>
                    <a href="{{ url('/articles', $article->id) }}" class="btn btn-primary">Читать статью &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Количество комментариев: {{ $qty }}
                </div>
            </div>

        @endforeach

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Более старые</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Более новые &rarr;</a>
            </li>
        </ul>

    @endif

@stop

@section('footer')
    <p class="m-0 text-center text-white">Футер главной страницы</p>
@stop