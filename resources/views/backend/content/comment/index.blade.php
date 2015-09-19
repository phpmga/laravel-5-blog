@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            {!! Notification::showAll() !!}
            <div class="panel-heading">Gestão de Comentários</div>

            <div class="panel-body">

                <table class="table table-hover table-top">
                    <tr>
                        <th>#</th>
                        <th>Autor</th>
                        <th>Email</th>
                        <th>Para</th>
                        <th>Nível</th>
                        <th>Enviado em</th>
                        <th class="text-right">Ações</th>
                    </tr>

                    @foreach($commentList as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->username }}</td>
                            <td>{{ $v->email }}</td>
                            <td>{{ $v->article->title }}</td>
                            <td>{{ $v->parent_id == 0?'Crítica':'Responder 《'.\App\model\Comment::getCommentReplyUserNameByCommentId($v->parent_id).'》Comentários' }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right" width="20%">

                                {!! Form::open([
                                'route' => array('backend.comment.destroy', $v->id),
                                'method' => 'delete',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Excluir
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                'route' => array('backend.comment.show', $v->id),
                                'method' => 'get',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-info">
                                    Modificar
                                </button>
                                {!! Form::close() !!}

                            </td>

                        </tr>
                    @endforeach
                </table>

            </div>
            {!! $commentList->render() !!}
        </div>

    </div>
@endsection
