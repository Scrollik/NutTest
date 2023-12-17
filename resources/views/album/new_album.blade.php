@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('albumcreate.store')}}" method="post">
            @csrf
            <h4 class="text-center">Создание нового альбома</h4>
            <div class="mb-3 mt-5">
                <label for="name" class="form-label"> Название альбома:</label>
                <input type="text" class="form-control"  autofocus name="name" id="name_album">
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">Исполнитель:</label>
                <input type="text" class="form-control" id="artist" name="artist">
            </div>
            <div class="mb-3">
                <label for="descr" class="form-label">Описание:</label>
                <input type="descr" class="form-control" id="descr" name="descr" >
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ссылка на обложку:</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Создать альбом</button>
        </form>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function() {
            $('#name_album').change(function(){
                var value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('albumcreate.find')}}",
                        method: "GET",
                        data:{value:value, _token:_token},
                        success:function(data){
                            $('#artist').val(data.artist);
                            $('#descr').val(data.descr);
                            $('#image').val(data.image);
                        }
                    });
                })
        })
</script>
@endsection
