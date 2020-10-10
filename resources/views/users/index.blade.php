@extends("adminlte::page")

@section("title", "Users")

@section("content_header")
    <h1>Users</h1>
@endsection

@section("content")
    <a href="" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Adicionar</a>

    <table class="table my-2">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                        @if($user->id == Auth::id())
                            <button class="btn btn-sm" disabled>Me</button>
                        @else 
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        @endif
                    </td>
                </tr>
            @empty
                <p>Nenhum registro encontrado.</p>
            @endforelse
        </tbody>
    </table>
@endsection