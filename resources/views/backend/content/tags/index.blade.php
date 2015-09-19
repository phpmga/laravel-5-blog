@extends('backend.content.common')

@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">Gerenciamento de Conteúdo</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ URL::route('backend.tags.create')}}">Nova Tag</a>

                    <table class="table table-hover table-top">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Criado em</th>
                            <th class="text-right">Ação</th>
                        </tr>

                        @foreach($tags as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->number }}</td>
                            <td class="text-right">




                                {!! Form::open([
                                'route' => array('backend.tags.destroy', $v->id),
                                'method' => 'delete',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    删除
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'route' => array('backend.tags.edit', $v->id),
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
                {!! $tags->render() !!}
            </div>
        </div>
@endsection
