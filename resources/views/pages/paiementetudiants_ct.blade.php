@extends('layouts.master')

@section('css')
    <!-- Additional CSS styles -->
@endsection

@section('title')
    Frais
@endsection

@section('page-header')
    <!-- Breadcrumb and page title code -->
@endsection

@section('content')
  <!-- search form -->

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-10">
            <div class="card card-statistics h-40">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchInput" placeholder="Recherche">
                    </div>
                    <?php $i = 0; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- end search form -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <?php $i = 0; ?>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">id</th>
                                <th scope="col">Etudiant(e)</th>
                                <th scope="col">Paiement</th>
                                <th scope="col">Cout</th>
                                <th scope="col">Date de paiement</th>
                                <th scope="col">Statut de paiement</th>
                                <th scope="col">Mode de paiement</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Function to filter table rows based on search input
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
