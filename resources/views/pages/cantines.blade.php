@extends('layouts.master')
@section('css')

@section('title')
	Cantines
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
	<div class="row">
		<div class="col-sm-6 text-right">
			<ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
				<li class="breadcrumb-item active">Liste des Cantines</li>
			</ol>
		</div>
	</div>
</div>

<!-- breadcrumb -->
@endsection
@section('content')


<!-- row -->
<div class="row">
  <div class="col-md-12 mb-30">
	<div class="card card-statistics h-100">
	  <div class="card-body">
		<?php $i = 0; ?>
	   

<!-- table code... -->


		<table class="table table-bordered table-striped">
		  <!--message error-->
		  @if ($errors->any())
		  <div class="d-flex justify-content-center">
			  <div class="alert alert-danger">
				  <ul>
					  @foreach ($errors->all() as $error)
						  <li>{{ $error }}</li>
					  @endforeach
				  </ul>
			  </div>
			</div>
		  @endif
		  <!--end message error-->
		  <!--message success-->
		  @if(session('success'))
		  <div class="d-flex justify-content-center">
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		  </div>
		  @endif
		  <!--end message success-->
		  <!--message update-->
		  @if(session('update'))
		  <div class="d-flex justify-content-center">
			  <div class="alert alert-warning">
				{{ session('update') }}
			  </div>
		  </div>
		  @endif
		  <!--end message success-->
		  <!--message delete-->
		  @if(session('delete'))
		  <div class="d-flex justify-content-center">
			<div class="alert alert-danger">
				{{ session('delete') }}
			</div>
		  </div>
		  @endif
		  <!--end message delete-->
		  <div class="d-flex">
			<button id="openFormButton" class="btn btn-primary ml-2">Ajouter Cantine</button>

			<!-- search form -->
			<form action="{{ route('cantine.index') }}" method="GET" class="mb-3">
			  <div class="input-group input-group-sm">
				<input type="text" class="form-control col-3 ml-auto" placeholder="Recherche..." name="search" value="{{ request('search') }}">
				<div class="input-group-append">
				  <button class="btn btn-primary" type="submit">
					<i class="fas fa-search"></i>
				  </button>
				</div>
			  </div>
			</form>
		  </div>
		  <br><br>

		  <!-- start modal form -->
		  <div id="formModal" class="modal fade">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title">Ajouter Cantine</h5>
					<button type="button" class="close" data-dismiss="modal">
					  <span>&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form action="{{ route('cantine.store') }}" method="POST">
					  @csrf
					 	<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputName">Nom d'Etudiant(e)</label>
									<select class="fancyselect form-control" name="etudiant_id">
										<option selected>Sélectionnez Etudiant(e)</option>
										@foreach ($etudiants as $etudiant)
											<option value="{{ $etudiant->id }}">{{ $etudiant->nom." ".$etudiant->prenom }}</option>
										@endforeach
									</select>
								</div>  
								<div class="form-group">
									<label for="inputName">Date</label>
									<input name="date" type="date" class="form-control" id="date" value="{{ date('Y-m-d') }}">
								</div>
								<div class="form-group">
									<label for="inputName">Heure</label>
									<input name="heure" type="time" class="form-control" id="heure" value="{{ date('H:i') }}">
								</div>         
							</div>
							<div class="col-md-6">             
								<div class="form-group">
									<label for="inputName">Repas</label>
									<select class="fancyselect form-control" name="repa_id">
									<option selected>Sélectionnez Repas</option>
									@foreach ($repas as $repa)
										<option value="{{ $repa->id }}">{{ $repa->nom }}</option>
									@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="inputName">Cout</label>
									<select class="fancyselect form-control" name="cout_id">
									<option selected>Sélectionnez un Cout</option>
									@foreach ($couts as $cout)
										<option value="{{ $cout->id }}">{{ $cout->nom." : ".$cout->montant }}</option>
									@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="inputName">Statut</label>
									<select name="statut" class="form-control" id="statut">
										<option value="Payé">Payé</option>
										<option value="Non Payé">Non Payé</option>
									</select>
								</div>
							</div>
						</div>
					  <div class="modal-footer">
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						  <button type="submit" class="btn btn-primary">Ajouter Cantine</button>
					  </div>
					</form>
				  </div>
				</div>
			  </div>
		  </div>
		  <script>
			$(document).ready(function() {
			  $("#openFormButton").click(function() {
				$("#formModal").modal("show");
			  });
			});
		  </script>
		  <!-- end modal form -->

		  <thead class="thead-light">
			<tr class="text-center">
			  <th scope="col">id</th>
			  <th scope="col">Nom d'Etudiant(e)</th>
			  <th scope="col">Date</th>
			  <th scope="col">Heure</th>
			  <th scope="col">Repas</th>
			  <th scope="col">Cout</th>
			  <th scope="col">Statut</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach ($cantines as $cantine)
			<?php $i++; ?>

			<tr class="text-center">
			  <td>{{ $i }}</td>
			  <td>{{ $cantine->etudiant->nom." ".$cantine->etudiant->prenom }}</td>
			  <td>{{ $cantine->date}}</td>
			  <td>{{ $cantine->heure}}</td>
			  <td>{{ $cantine->repa->nom}}</td>
			  <td>{{ $cantine->cout->montant}}</td>
			  <td>{{ $cantine->statut}}</td>
			  <td>

				<!-- start modal edit form -->
				<div id="editformModal{{ $cantine->id }}" class="modal fade">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title">Modifier Cantine</h5>
						<button type="button" class="close" data-dismiss="modal">
						  <span>&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form action="{{ route('cantine.update', $cantine->id) }}" method="POST">
						  @csrf
						  @method('PUT')
						  	<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="inputName">Nom d'Etudiant(e)</label>
										<select class="fancyselect form-control" name="etudiant_id">
										@foreach ($etudiants as $etudiant)
											<option value="{{ $etudiant->id }}" {{ $etudiant->id == $cantine->etudiant_id ? 'selected' : '' }}>
											{{ $etudiant->nom." ".$etudiant->prenom }}
											</option>                             
										@endforeach
										</select>
									</div> 
									<div class="form-group">
										<label for="inputName">Date</label>
										<input name="date" type="date" class="form-control" id="date{{ $cantine->id }}" value="{{ date('Y-m-d') }}">
									</div>                          
									<div class="form-group">
										<label for="inputName">Heure</label>
										<input name="heure" type="time" class="form-control" id="heure{{ $cantine->id }}" value="{{ date('H:i') }}">
									</div> 
								</div>
								<div class="col-md-6">                         
									<div class="form-group">
										<label for="inputName">Repas</label>
										<select class="fancyselect form-control" name="repa_id">
										@foreach ($repas as $repa)
											<option value="{{ $repa->id }}" {{ $repa->id == $cantine->repa_id ? 'selected' : '' }}>
											{{ $repa->nom }}
											</option>                             
										@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="inputName">Cout</label>
										<select class="fancyselect form-control" name="cout_id">
										@foreach ($couts as $cout)
											<option value="{{ $cout->id }}" {{ $cout->id == $cantine->cout_id ? 'selected' : '' }}>
											{{ $cout->nom." : ".$cout->montant }}
											</option>                             
										@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="inputName">Statut</label>
										<select name="statut" class="form-control" id="inputName{{ $cantine->id }}">
											<option selected>Statut</option>
											<option value="Payé" {{ $cantine->statut === 'Payé' ? 'selected' : '' }}>Payé</option>
											<option value="Non payé" {{ $cantine->statut === 'Non Payé' ? 'selected' : '' }}>Non Payé</option>
										</select>
									</div>
								</div>
						  	</div>						  
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							<button type="submit" class="btn btn-primary">Modifier Cantine</button>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
				<!-- end modal edit form -->


				<div style="display: inline;">
				  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editformModal{{ $cantine->id }}" title="Edit">
					<i class="fa fa-edit"></i>
				  </button>
				
				  <form style="display: inline;" action="{{ route('cantine.destroy', $cantine->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger btn-lg">
					  <i class="fa fa-trash"></i>
					</button>
				  </form>
				</div>
				
			  </td>
			</tr>
			@endforeach
		  </tbody>
		</table>

		<!-- pagination -->
<div class="pagination justify-content-center">
  {!! $cantines->appends(['search' => request('search')])->links() !!}
</div>
<!-- end pagination -->


	  </div>
	</div>
  </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@section('js')
@endsection
