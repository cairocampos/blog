@extends("adminlte::page")

@section("title", "Meus Posts")

@section("content_header")
    <h1>Meus Posts</h1>
@endsection

@section("content")
    
    <a href="{{route('posts.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Adicionar</a>

    <table class="table my-2">
        <thead>
            <th>#</th>
            <th>Titulo</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @forelse($posts as $post) 
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a href="{{route('posts.edit', ["id" => $post->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @empty 
                <p>Nenhum registro encontrado</p>
            @endforelse
        </tbody>
    </table>
    
@endsection