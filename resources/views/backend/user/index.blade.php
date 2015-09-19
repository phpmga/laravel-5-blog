@extends('backend.user.common')

@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">Gerenciar Administradores</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ URL::route('backend.user.create')}}">Novo Usuário</a>

                    <table class="table table-hover table-top">
                        <tr>
                            <th>#</th>
                            <th>Nome completo</th>
                            <th>Email</th>
                            <th>Data de criação</th>
                            <th class="text-right">Ação</th>
                        </tr>

                        @foreach($users as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->email }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">

                                {!! Form::open([
                                'route' => array('backend.user.destroy', $v->id),
                                'method' => 'delete',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Excluir
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'route' => array('backend.user.edit', $v->id),
                                    'method' => 'get',
                                    'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    Editar
                                </button>
                                {!! Form::close() !!}

                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
                {!! $users->render() !!}
            </div>
        </div>
@endsection
