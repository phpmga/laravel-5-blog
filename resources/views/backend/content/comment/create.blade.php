@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">Responder Comentário</div>

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
                {!! Form::open(['route' => 'backend.comment.store', 'method' => 'post','class'=>'form-horizontal']) !!}


                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Conteúdo</label>
                    <div class="col-sm-7 editor">
                        @include('editor::head')
                        {!! Form::textarea('content', '', ['class' => 'form-control','id'=>'myEditor']) !!}
                        <font color="red">{{ $errors->first('content') }}</font>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::hidden('parent_id', $id,['id'=>'parent_id']) !!}
                        {!! Form::submit('Responder', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
