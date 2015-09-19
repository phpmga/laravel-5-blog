@extends('backend.content.common')

@section('content')

    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">Ver Comentários</div>

            {!! Notification::showAll() !!}
            @if ($errors->has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong>
                    {{ $errors->first('error', ':message') }}
                    <br />
                    Entre em contato com o desenvolvedor!
                </div>
            @endif


                <div class="panel-body">
                    <table class="detail-view table table-striped table-condensed" id="yw0">
                        <tr>
                            <th>id</th>
                            <td>{{ $commentInfo->id }}</td>
                        </tr>
                        <tr>
                            <th>Usuário</th>
                            <td>{{ $commentInfo->username }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $commentInfo->email }}</td>
                        </tr>
                        <tr>
                            <th>Enviado em</th>
                            <td>{{ $commentInfo->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Sobre</th>
                            <td>
                                {{ $commentInfo->article->title }}
                                <a href="{{ url(route('article.show',['id'=>$commentInfo->el_id])) }}" target="_blank" > Ver</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Responder</th>
                            <td>
                                {{ $commentInfo->parent_id == 0?'Crítica':'Responder：'.\App\model\Comment::getCommentReplyUserNameByCommentId($commentInfo->parent_id).'， Comentários' }}
                                @if($commentInfo->parent_id != 0)
                                    <a href="{{ url(route('backend.comment.show',['id'=>$commentInfo->parent_id])) }}" target="_blank" > Ver</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Conteúdo</th>
                            <td>
                                {{ $commentInfo->content }}
                                <br />
                            </td>
                        </tr>

                    </table>
                    <a href="{{ url(route('backend.comment.create',['id'=>$commentInfo->id])) }}" target="_blank" class="btn btn-info" >
                        Responder
                    </a>
                </div>


    </div>
@endsection
