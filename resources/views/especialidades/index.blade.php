@extends('especialidades.layout')    <!-- herda o layout do layout.blade -->

@section('title',__('(CRUD Laravel)'))  <!-- modifica o titulo para essa tela em especifico -->

@push('css')    <!-- posso ter definições css proprias para essa tela, tag style abaixo -->
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')   <!-- vem do @yield('content') dentro do layout.blade -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Listagem de Especialidades')</span>   <!-- criar uma tela -->
                        <a href="{{ url('especialidades/create') }}" class="btn-primary btn-sm"> <!-- caminho do arquivo para esta tela, rota em web.php -> EspecialidadeController.php -> create; Laravel -->
                            <i class="fa fa-plus"></i> @lang('Nova Especialidade')  <!-- criar um botão -->
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success')) <!-- vem do Controller, função store -->
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Nome')</td>
                                <td>@lang('Sigla')</td>
                                <td>@lang('Observação')</td>
                                <td colspan="4" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($especialidades as $especialidade) <!-- vem da function index no Controller -->
                            <tr>
                                <td>{{$especialidade->id}}</td>
                                <td>{{$especialidade->nome_esp}}</td>
                                <td>{{$especialidade->sigla_esp}}</td>
                                <td>{{$especialidade->obs_esp}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('especialidades.show', $especialidade->id)}}" 
                                        class="btn btn-info btn-sm">@lang('Abrir') <!-- outra forma de mostrar caminho do arquivo -->
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('especialidades.edit', $especialidade->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('especialidades.destroy', $especialidade->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js') <!-- igual ao push css, script js personalizado para esta tela -->
<script>
    // Script personalizado
</script>
@endpush