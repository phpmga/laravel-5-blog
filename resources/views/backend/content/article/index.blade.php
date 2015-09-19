@extends('backend.content.common')

@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">Gerenciamento de Conteúdo</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ URL::route('backend.article.create')}}">Novo Artigo</a>

                    <table class="table table-hover table-top">
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>Autor</th>
                            <th>Publicado em</th>
                            <th>Criado em</th>
                            <th class="text-right">Ações</th>
                        </tr>

                        @foreach($article as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->title }}</td>
                            <td>{{ App\Model\Category::getCategoryNameByCatId($v->cate_id) }}</td>
                            <td>{{ App\User::getUserNameByUserId($v->user_id) }}</td>
                            <td>{{ $v->status->view_number }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">


                                {!! Form::open([
                                'route' => array('backend.article.destroy', $v->id),
                                'method' => 'delete',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Excluir
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'route' => array('backend.article.edit', $v->id),
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
                {!! $article->render() !!}
            </div>

        </div>
@endsection
