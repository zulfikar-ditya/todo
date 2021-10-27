@extends('base')

@section('content')
    @guest
        @include('auth.login')
    @endguest
    @auth
        <div class="row justify-content-center mt-5 py-5">
            <div class="col-md-4">
                @include('components.alert')
                <form action="{{route('todo.store')}}" method="post">
                    @csrf
                    <div class="d-flex">
                        <input type="text" name="todo" placeholder="Insert Your To Do Here..." id="" class="form-control" required autofocus>
                        <input type="submit" value="Submit" class="btn btn-outline-info">
                    </div>
                </form>

                <ul class="list-group mt-5">
                    @foreach ($data as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{$item->todo}}</span>
                        <form action="{{route('todo.destroy', $item)}}" method="post" id="form-delete-{{$item->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                        </form>
                        <a href="" class="btn btn-outline-danger" id="btn-delete-{{$item->id}}">Delete</a>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    @endauth
@endsection

@section('js')
    @foreach ($data as $item)
    <script>
        $('#btn-delete-{{$item->id}}').click((e) => {
            e.preventDefault();
            $('#form-delete-{{$item->id}}').submit();
        });
    </script>
    @endforeach
@endsection