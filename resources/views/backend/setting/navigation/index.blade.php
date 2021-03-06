@extends('backend.setting.common')

@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">Gerenciamento de Conteúdo</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ URL::route('backend.nav.create')}}">Adicionar navegação</a>

                    <table class="table table-hover table-top">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Criado em</th>
                            <th class="text-right">Ação</th>
                        </tr>

                        @foreach($list as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->html }}{{ $v->name }}</td>
                            <td>{{ $v->url }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">


                                @if($v->parent_id == 0)
                                    <a href="{{ url(route('backend.nav.create',['parentId'=>$v->id])) }} " style="margin-right: 10px;" class="btn btn-info"  >
                                        Adicionar navegação
                                    </a>
                                @endif

                                {!! Form::open([
                                    'route' => array('backend.nav.destroy', $v->id),
                                    'method' => 'delete',
                                    'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Excluir
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'route' => array('backend.nav.edit', $v->id),
                                    'method' => 'get',
                                    'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    Modificar
                                </button>
                                {!! Form::close() !!}

                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
@endsection
