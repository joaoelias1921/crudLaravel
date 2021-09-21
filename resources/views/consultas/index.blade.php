@extends('consultas.layout')    <!-- herda o layout do layout.blade -->

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
                        <span>@lang('Listagem de Consultas')</span>   <!-- criar uma tela -->
                        <a href="{{ url('consultas/create') }}" class="btn-primary btn-sm"> <!-- caminho do arquivo para esta tela, rota em web.php -> ConsultaController.php -> create; Laravel -->
                            <i class="fa fa-plus"></i> @lang('Nova Consulta')  <!-- criar um botão -->
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
                                <td>@lang('Paciente')</td>
                                <td>@lang('Médico Responsável')</td>
                                <td>@lang('Data da Consulta')</td>
                                <td>@lang('Hora da Consulta')</td>
                                <td colspan="5" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultas as $consulta) <!-- vem da function index no Controller -->
                            <tr>
                                <td>{{$consulta->id}}</td>
                                <td>{{$consulta->paciente->nome}}</td>
                                <td>{{$consulta->medico->nome}}</td>
                                <td>{{$consulta->data}}</td>
                                <td>{{$consulta->hora}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('consultas.show', $consulta->id)}}" 
                                        class="btn btn-info btn-sm">@lang('Abrir') <!-- outra forma de mostrar caminho do arquivo -->
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('consultas.edit', $consulta->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('consultas.destroy', $consulta->id)}}" method="post">
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