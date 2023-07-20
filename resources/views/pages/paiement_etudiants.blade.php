@extends('layouts.master')
@section('css')

@section('title')
Paiement des Etudiants
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
	<div class="row">
		<div class="col-sm-6 text-right">
			<ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
				<li class="breadcrumb-item active">Liste des Paiements</li>
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
			<button id="openFormButton" class="btn btn-primary ml-2">Ajouter Paiement</button>

			<!-- search form -->
			<form action="{{ route('paiement_etudiant.index') }}" method="GET" class="mb-3">
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
					<h5 class="modal-title">Ajouter Paiement</h5>
					<button type="button" class="close" data-dismiss="modal">
					  <span>&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form action="{{ route('paiement_etudiant.store') }}" method="POST">
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
                                    <label for="inputName">Cout</label>
                                    <select class="fancyselect form-control" name="cout_id">
                                    <option selected>Sélectionnez un Cout</option>
                                    @foreach ($couts as $cout)
                                        <option value="{{ $cout->id }}">{{ $cout->nom." : ".$cout->montant }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Date de paiement</label>
                                    <input name="date" type="date" class="form-control" id="inputName">
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName">Statut de paiement</label>
                                    <select name="statut" class="form-control" id="statut">
                                        <option selected>Statut</option>
                                        <option value="Payé">Payé</option>
                                        <option value="Non Payé">Non Payé</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Mode de paiement</label>
                                    <select name="mode" class="form-control" id="mode">
                                        <option selected>Mode de paiement</option>
                                        <option value="Espèces">Espèces</option>
                                        <option value="Carte bancaire">Carte bancaire</option>
                                        <option value="Virement bancaire">Virement bancaire</option>
                                        <option value="Chèque">Chèque</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Remarque</label>
                                    <input name="remarque" type="text" class="form-control" id="inputName">
                                </div>
                            </div>
                        </div>
					  <div class="modal-footer">
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						  <button type="submit" class="btn btn-primary">Ajouter Paiement</button>
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
			  <th scope="col">Etudiant(e)</th>
			  <th scope="col">Paiement</th>
			  <th scope="col">Cout</th>
			  <th scope="col">Date de paiement</th>
			  <th scope="col">Statut de paiement</th>
			  <th scope="col">Mode de paiement</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach ($paiement_etudiants as $paiement_etudiant)
			<?php $i++; ?>

			<tr class="text-center">
			  <td>{{ $i }}</td>
			  <td>{{ $paiement_etudiant->etudiant->nom." ".$paiement_etudiant->etudiant->prenom }}</td>
			  <td>{{ $paiement_etudiant->cout->nom}}</td>
			  <td>{{ $paiement_etudiant->cout->montant }}dh</td>
			  <td>{{ $paiement_etudiant->date}}</td>
			  <td>{{ $paiement_etudiant->statut}}</td>
			  <td>{{ $paiement_etudiant->mode}}</td>
			  <td>

				<!-- start modal edit form -->
				<div id="editformModal{{ $paiement_etudiant->id }}" class="modal fade">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title">Modifier Paiement</h5>
						<button type="button" class="close" data-dismiss="modal">
						  <span>&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form action="{{ route('paiement_etudiant.update', $paiement_etudiant->id) }}" method="POST">
						  @csrf
						  @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Nom d'Etudiant(e)</label>
                                        <select class="fancyselect form-control" name="etudiant_id">
                                        @foreach ($etudiants as $etudiant)
                                            <option value="{{ $etudiant->id }}" {{ $etudiant->id == $paiement_etudiant->etudiant_id ? 'selected' : '' }}>
                                            {{ $etudiant->nom." ".$etudiant->prenom }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputName">Cout</label>
                                        <select class="fancyselect form-control" name="cout_id">
                                        @foreach ($couts as $cout)
                                            <option value="{{ $cout->id }}" {{ $cout->id == $paiement_etudiant->cout_id ? 'selected' : '' }}>
                                            {{ $cout->nom." : ".$cout->montant }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Date de Paiement</label>
                                        <input name="date" type="date" class="form-control" id="name{{ $paiement_etudiant->id }}" value="{{ $paiement_etudiant->date ?? '' }}">
                                    </div>   
                                </div>
                                <div class="col-md-6">
                       
                                    <div class="form-group">
                                        <label for="inputName">Statut de Paiement</label>
                                        <select name="statut" class="form-control" id="inputName{{ $paiement_etudiant->id }}">
                                            <option selected>Statut de Paiement</option>
                                            <option value="Payé" {{ $paiement_etudiant->statut === 'Payé' ? 'selected' : '' }}>Payé</option>
                                            <option value="Non payé" {{ $paiement_etudiant->statut === 'Non Payé' ? 'selected' : '' }}>Non Payé</option>
                                        </select>
                                    </div>						  
                                    <div class="form-group">
                                        <label for="inputName">Mode de Paiement</label>
                                        <select name="mode" class="form-control" id="inputName{{ $paiement_etudiant->id }}">
                                            <option selected>Mode de Paiement</option>
                                            <option value="Espèces" {{ $paiement_etudiant->mode === 'Espèces' ? 'selected' : '' }}>Espèces</option>
                                            <option value="Carte bancaire" {{ $paiement_etudiant->mode === 'Carte bancaire' ? 'selected' : '' }}>Carte bancaire</option>
                                            <option value="Virement bancaire" {{ $paiement_etudiant->mode === 'Virement bancaire' ? 'selected' : '' }}>Virement bancaire</option>
                                            <option value="Chèque" {{ $paiement_etudiant->mode === 'Chèque' ? 'selected' : '' }}>Chèque</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Remarque</label>
                                        <input name="remarque" type="text" class="form-control" id="name{{ $paiement_etudiant->id }}" value="{{ $paiement_etudiant->remarque ?? '' }}">
                                    </div> 
                                </div>
                            </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							<button type="submit" class="btn btn-primary">Modifier Paiement</button>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
				<!-- end modal edit form -->


				<div style="display: inline;">
				  <button type="button" class="btn btn-info btn-lg mr-1" data-toggle="modal" data-target="#editformModal{{ $paiement_etudiant->id }}" title="Edit">
					<i class="fa fa-edit"></i>
					<!-- imprimer facture button -->
					<button type="button" class="btn btn-warning btn-lg" title="Imprimer Facture" onclick="printInvoice({{ $paiement_etudiant->id }}, {{ $paiement_etudiant->etudiant->id }})">
						<i class="fa fa-print"></i>
					</button>
				
				  <form style="display: inline;" action="{{ route('paiement_etudiant.destroy', $paiement_etudiant->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger btn-lg mt-1">
					  <i class="fa fa-trash"></i>
					</button>
				  </form>
				</div>
				<!-- Facture content-->
				<div id="{{ $paiement_etudiant->id }}" style="display: none; border: 1px solid #ccc; padding: 20px; max-width: 500px; margin: 0 auto; font-family: Arial, sans-serif;">
					<img src="assets/images/logo-dark.png" alt="Company Logo" style="max-width: 150px; margin-bottom: 20px;">
					<div class="container d-flex justify-content-center align-items-center vh-100">
						<div class="invoice-container  p-4" style="max-width: 500px; font-family: Arial, sans-serif;">
						
							<h2 class="text-center mt-6 mb-4">Facture</h2>
					
							<div class="row mb-3">
								<div class="text-center col-12">
									<strong>Nom Et Prénom:</strong> {{ $paiement_etudiant->etudiant->nom." ".$paiement_etudiant->etudiant->prenom }}
								</div>
								<div class="text-center col-12">
									<strong>Frais:</strong> {{ $paiement_etudiant->cout->nom.' : '.$paiement_etudiant->cout->montant }}
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="text-center col-12">
									<strong>Date de paiement:</strong> {{ $paiement_etudiant->date }}
								</div>
								<div class="text-center col-12">
									<strong>Statut de paiement:</strong> {{ $paiement_etudiant->statut}}
								</div>
							</div>
					
							<div class="row mb-3">
								<div class="text-center col-12">
									<strong>Mode de paiement:</strong> {{ $paiement_etudiant->mode}}
								</div>
								<div class="text-center col-12">
									<strong>Remarque:</strong> {{ $paiement_etudiant->remarque}}
								</div>
							</div>
	
						</div>
					</div>
					
					<div style="text-align: center; margin-top: 40px;">
						<div style="border-top: 1px solid #ccc; width: 200px; margin: 0 auto;"></div>
						<p style="margin-top: 10px; font-size: 14px;">Signature</p>
					</div>
				</div>

			  </td>
			</tr>
			@endforeach
		  </tbody>
		</table>

		<!-- pagination -->
<div class="pagination justify-content-center">
  {!! $paiement_etudiants->appends(['search' => request('search')])->links() !!}
</div>
<!-- end pagination -->


	  </div>
	</div>
  </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@section('js')

<!-- JavaScript code for printing the invoice -->
<script>
    function printInvoice(paiementEtudiantId, etudiantId) {
        var printContents = document.getElementById(paiementEtudiantId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;

        // Now, you have the etudiant ID as 'etudiantId'. You can use it to fetch data or apply any changes related to the etudiant.
        // For example, you can use AJAX to fetch data related to the specific etudiant using its ID.

        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection