@extends('backend.setting.common')

@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Criar navegação</div>

                @if ($errors->has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong>
                    {{ $errors->first('error', ':message') }}
                    <br />
                    Entre em contato com o desenvolvedor！
                </div>
                @endif

                <div class="panel-body">
                    {!! Form::open(['route' => 'backend.nav.store', 'method' => 'post','class'=>'form-horizontal']) !!}

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Navegação superior</label>
                            <div class="col-sm-3">
                               {{ App\Model\Navigation::getNavNameByNavId($parent_id) }}
                                {!! Form::hidden('parent_id',$parent_id) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Sequência</label>
                            <div class="col-sm-3">
                                {!! Form::text('sequence', '', ['class' => 'form-control','placeholder'=>'sequência']) !!}
                                <font color="red">{{ $errors->first('sequence') }}</font>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Nome da navegação</label>
                            <div class="col-sm-3">
                                {!! Form::text('name', '', ['class' => 'form-control','placeholder'=>'nome']) !!}
                                <font color="red">{{ $errors->first('name') }}</font>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Endereço de ligação</label>
                            <div class="col-sm-3">
                                {!! Form::text('url', '', ['class' => 'form-control','placeholder'=>'url']) !!}
                                <font color="red">{{ $errors->first('url') }}</font>
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
@endsection
