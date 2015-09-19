@extends('backend.content.common')

@section('content')


<!-- Tokenfield CSS -->
<link href="{{ asset('/plugin/tags/css/bootstrap-tokenfield.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('/plugin/tags/css/jquery-ui.css ') }}" type="text/css" rel="stylesheet">

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Novo Artigo</div>

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
                    {!! Form::open(['route' => 'backend.article.store', 'method' => 'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Título</label>
                            <div class="col-sm-7">
                                {!! Form::text('title', '', ['class' => 'form-control','placeholder'=>'título']) !!}
                                <font color="red">{{ $errors->first('title') }}</font>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
                            <div class="col-sm-7">
                                {!! Form::select('cate_id', $catArr , null , ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tags</label>
                            <div class="col-sm-7">
                                {!! Form::text('tags', '', ['class' => 'form-control','placeholder'=>'Digite aqui','id'=>'tags']) !!}
                                <font color="red">{{ $errors->first('tags') }}</font>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Foto da capa</label>
                            <div class="col-sm-3">
                                {!! Form::file('pic') !!}
                                <font color="red">{{ $errors->first('pic') }}</font>
                            </div>
                        </div>

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
                                {!! Form::submit('Criar', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>



<script type="text/javascript" src="{{ asset('/plugin/tags/jquery-ui.js ') }}"></script>
<script type="text/javascript" src="{{ asset('/plugin/tags/bootstrap-tokenfield.js ') }}" charset="UTF-8"></script>

<script type="text/javascript">
    $('#tags').tokenfield({
        autocomplete: {
            source: <?php echo  \App\Model\Tag::getTagStringAll()?>,
            delay: 100
        },
        showAutocompleteOnFocus: !0,
        delimiter: [","]
    })
</script>
@endsection
