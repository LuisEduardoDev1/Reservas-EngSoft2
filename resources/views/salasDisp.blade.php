@extends('layout.master')

@section('content')

<div class="container mt-5">
    <h2 class="mt-5">Salas</h2>
        <ul class="list-group">
            @foreach ($salas as $sala)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-user"></i> {{ $sala->numero }}
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