@extends('backend.content.common')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Modificar a Categoria</div>

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
            {!! Form::model($cate, ['route' => ['backend.cate.update', $cate->id], 'method' => 'put','class'=>'form-horizontal']) !!}

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Voltar</label>
                <div class="col-sm-3">
                    {!! Form::select('parent_id', App\Model\Category::getCategoryTree() , $cate->parent_id , ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-3">
                    {!! Form::text('cate_name', $cate->cate_name, ['class' => 'form-control','placeholder'=>'category_name']) !!}
                    <font color="red">{{ $errors->first('cate_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Aliases</label>
                <div class="col-sm-3">
                    {!! Form::text('as_name', $cate->as_name, ['class' => 'form-control','placeholder'=>'as_name']) !!}
                    <font color="red">{{ $errors->first('as_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo título</label>
                <div class="col-sm-3">
                    {!! Form::text('seo_title', $cate->seo_title, ['class' => 'form-control','placeholder'=>'seo_title']) !!}
                    <font color="red">{{ $errors->first('seo_title') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo palavras-chave</label>
                <div class="col-sm-3">
                    {!! Form::text('seo_key', $cate->seo_key, ['class' => 'form-control','placeholder'=>'seo_key']) !!}
                    <font color="red">{{ $errors->first('seo_key') }}</font>
                </div>
            </div>


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo descrição</label>
                <div class="col-sm-3">
                    {!! Form::textarea('seo_desc', $cate->seo_desc, ['class' => 'form-control']) !!}
                    <font color="red">{{ $errors->first('seo_desc') }}</font>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection