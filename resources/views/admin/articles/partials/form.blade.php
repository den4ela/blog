<label for="">Статус</label>
<select name="published" id="" class="form-control">
    @if(isset($article->id))
        <option value="0" @if($article->published == 0) selected @endif>Не опубликовано</option>
        <option value="1" @if($article->published == 1) selected @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" name="title" class="form-control" placeholder="Заголовок" value="{{ $article->title or "" }}" required>

<label for="">Ссылка поста</label>
<input type="text" class="form-control" name="slug" value="{{ $article->slug or "" }}" placeholder="Автогенерация" readonly>

<label for="">Родительская категория</label>
<select name="categories[]" id="" class="form-control" multiple>
    <option value="0">Без родительской категории</option>
    @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="description_short">Краткое описание</label>
<textarea name="description_short" id="description_short" cols="30" rows="10" class="form-control">{{ $article->description_short or "" }}</textarea>

<label for="description">Полное описание</label>
<textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $article->description or "" }}</textarea>

<hr>

<label for="">Мета заголовок</label>
<input type="text" name="meta_title" class="form-control" placeholder="Мета заголовок" value="{{ $article->meta_title or "" }}" required>

<label for="">Мета описание</label>
<input type="text" name="meta_description" class="form-control" placeholder="Мета описание" value="{{ $article->meta_description or "" }}" required>

<label for="">Мета теги</label>
<input type="text" name="meta_keyword" class="form-control" placeholder="Мета теги" value="{{ $article->meta_keyword or "" }}" required>

<hr>

<input type="submit" class="btn btn-success" value="Сохранить">