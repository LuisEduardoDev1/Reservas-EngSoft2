@extends('layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="mt-5">Salas</h2>
        <ul class="list-group">
            @foreach ($salas as $sala)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-map-marker-alt"></i> Número {{ $sala->numero }}<br>
                        <i class="fas fa-users"></i> Capacidade {{ $sala->quantidade }}<br> 
                        <i class="fas fa-expand-arrows-alt"></i> Tamanho {{ $sala->tamanho }} m²<br>
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