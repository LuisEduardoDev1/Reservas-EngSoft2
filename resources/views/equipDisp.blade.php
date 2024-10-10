@extends('layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="mt-5">Equipamentos</h2>
        <ul class="list-group">
            @foreach ($equipamentos as $equipamento)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-user"></i> {{ $equipamento->nome }}<br>
                        <i class="fas fa-chalkboard"></i> {{ $equipamento->marca }}<br>
                        <i class="fas fa-sliders-h"></i> {{ $equipamento->descricao }}
                    </div>
                    <div>
                        <a href="#" class="btn btn-warning btn-sm text-white mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
</div>

@endsection