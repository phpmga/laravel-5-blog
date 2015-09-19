@extends('backend.app')

@section('modules')
<div class="container-fluid">


	<div class="row">

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Navegação</div>


                    <div class="panel-body text-center">

                        <ul class="nav nav-list">
                            <li>
                                <a href="{{ URL::route('backend.user.index')}}">Lista de Administradores</a>
                            </li>
                        </ul>

                    </div>


            </div>
        </div>

		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					Bem-vindo!
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
