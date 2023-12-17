@extends('layouts.master')
@section('content')
    @forelse($album as $item)
        <form action="{{route('album.update',$item->id)}}" METHOD="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$item->id}}">
            <h4 class="text-center">Редактирование альбома "{{$item->name}}"</h4>
            <div class="mb-3 mt-5">
                <label for="name" class="form-label"> Название альбома:</label>
                <input type="text" class="form-control"  autofocus name="name" value="{{$item->name}}">
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">Исполнитель:</label>
                <input type="text" class="form-control"  value="{{$item->artist}}" name="artist">
            </div>
            <div class="mb-3">
                <label for="descr" class="form-label">Описание:</label>
                <input type="text" class="form-control" value="{{$item->description}}" name="descr" >
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ссылка на обложку:</label>
                <input type="text" class="form-control" value="{{$item->image}}" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Подтвердить изменения</button>
        </form>
        </form>
    @empty
        <h4>Ошибка</h4>
    @endforelse
@endsection
