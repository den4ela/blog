@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrums')
            @slot('title') Список новостей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent
    </div>
    <hr>

    <div class="container">
        <a href="{{ route('admin.article.create') }}" class="btn btn-primary mb-5">Создать новость</a>

        <table class="table">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Публикация</th>
                <th class="text-right">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($articles as  $article)
                <tr><td>{{ $article->title }}</td><td>{{ $article->published }}</td><td>
                        <a href="{{ route('admin.article.edit', $article) }}" class="btn btn-info">Редактировать</a>

                        <form action="{{ route('admin.article.destroy', $article) }}" onsubmit="if (confirm('Удалить новость?')){return true} else{return false}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form>
                    </td></tr>
            @empty
                <tr>
                    <td colspan="3">Данные отсутствуют</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">

                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection