@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrums')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent
    </div>
    <hr>

    <div class="container">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-5">Создать категорию</a>

        <table class="table">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Публикация</th>
                <th class="text-right">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as  $category)
                <tr><td>{{ $category->title }}</td><td>{{ $category->published }}</td><td>
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-info">Редактировать</a>

                        <form action="{{ route('admin.category.destroy', $category) }}" onsubmit="if (confirm('Удалить категорию?')){return true} else{return false}" method="post">
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
                        {{ $categories->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection