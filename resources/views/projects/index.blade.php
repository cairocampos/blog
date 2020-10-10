@extends("adminlte::page")

@section("title", "Projects")

@section("content_header")
    <h1>My Projects</h1>
@endsection

@section("content")
    <a href="{{route('projects.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Adicionar</a>

    <table class="table my-2 table__projects">
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>
                        <a href="{{route('projects.edit', ["id" => $project->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger btn-remove__project" id="{{$project->id}}"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <p>Nenhum registro encontrado.</p>
            @endforelse
        </tbody>
    </table>
@endsection