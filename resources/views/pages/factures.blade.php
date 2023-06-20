@extends('layouts.master')
@section('css')

@section('title')
	Factures
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
	<div class="row">
		<div class="col-sm-6 text-right">
			<ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
				<li class="breadcrumb-item active">Liste des Factures</li>
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
			<button id="openFormButton" class="btn btn-primary ml-2">Ajouter Facture</button>

			<!-- search form -->
			<form action="{{ route('facture.index') }}" method="GET" class="mb-3">
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
					<h5 class="modal-title">Ajouter Facture</h5>
					<button type="button" class="close" data-dismiss="modal">
					  <span>&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form action="{{ route('facture.store') }}" method="POST">
					  @csrf
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
						<input name="date" type="date" class="form-control" id="name" value="{{ date('Y-m-d') }}">
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
							<option selected>Statut</option>
							<option value="Payé">Payé</option>
							<option value="Non Payé">Non Payé</option>
						</select>
					  </div>
					  <div class="form-group">
						<label for="inputName">Déscription</label>
						<input name="description" type="text" class="form-control" id="description">
					  </div>
					  <div class="modal-footer">
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						  <button type="submit" class="btn btn-primary">Ajouter Facture</button>
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
			  <th scope="col">Cout</th>
			  <th scope="col">Statut</th>
			  <th scope="col">Déscription</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach ($factures as $facture)
			<?php $i++; ?>

			<tr class="text-center">
			  <td>{{ $i }}</td>
			  <td>{{ $facture->etudiant->nom." ".$facture->etudiant->prenom }}</td>
			  <td>{{ $facture->date}}</td>
			  <td>{{ $facture->cout->montant}}</td>
			  <td>{{ $facture->statut}}</td>
			  <td>{{ $facture->description}}</td>
			  <td>

				<!-- start modal edit form -->
				<div id="editformModal{{ $facture->id }}" class="modal fade">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title">Modifier Facture</h5>
						<button type="button" class="close" data-dismiss="modal">
						  <span>&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form action="{{ route('facture.update', $facture->id) }}" method="POST">
						  @csrf
						  @method('PUT')
						  <div class="form-group">
							<label for="inputName">Nom d'Etudiant(e)</label>
							<select class="fancyselect form-control" name="etudiant_id">
							  @foreach ($etudiants as $etudiant)
								<option value="{{ $etudiant->id }}" {{ $etudiant->id == $facture->etudiant_id ? 'selected' : '' }}>
								  {{ $etudiant->nom." ".$etudiant->prenom }}
								</option>                             
							  @endforeach
							</select>
						  </div> 
						  <div class="form-group">
							<label for="inputName">Date</label>
							<input name="date" type="date" class="form-control" id="name{{ $facture->id }}" value="{{ $facture->date ?? '' }}">
						  </div>
						  <div class="form-group">
							<label for="inputName">Cout</label>
							<select class="fancyselect form-control" name="cout_id">
							  @foreach ($couts as $cout)
								<option value="{{ $cout->id }}" {{ $cout->id == $facture->cout_id ? 'selected' : '' }}>
								  {{ $cout->nom." : ".$cout->montant }}
								</option>                             
							  @endforeach
							</select>
						  </div>
						  <div class="form-group">
							<label for="inputName">Statut</label>
							<select name="statut" class="form-control" id="inputName{{ $facture->id }}">
								<option selected>Statut</option>
								<option value="Payé" {{ $facture->statut === 'Payé' ? 'selected' : '' }}>Payé</option>
								<option value="Non payé" {{ $facture->statut === 'Non Payé' ? 'selected' : '' }}>Non Payé</option>
							</select>
						</div>						  
						  <div class="form-group">
							<label for="inputName">Déscription</label>
							<input name="description" type="text" class="form-control" id="name{{ $facture->id }}" value="{{ $facture->description ?? '' }}">
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							<button type="submit" class="btn btn-primary">Modifier Facture</button>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
				<!-- end modal edit form -->


				<div style="display: inline;">
				  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editformModal{{ $facture->id }}" title="Edit">
					<i class="fa fa-edit"></i>
				  </button>
				
				  <form style="display: inline;" action="{{ route('facture.destroy', $facture->id) }}" method="POST">
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
  {!! $factures->appends(['search' => request('search')])->links() !!}
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
