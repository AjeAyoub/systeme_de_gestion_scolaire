@extends('layouts.master')

@section('css')
    <!-- Additional CSS styles -->
@endsection

@section('title')
    Exams
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
                                <th scope="col">Etudiant</th>
                                <th scope="col">Matière</th>
                                <th scope="col">Note Exam</th>
                                <th scope="col">Coefficient</th>
                                <th scope="col">Remarque</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                <?php $i++; ?>
                                <tr class="text-center">
                                    <td>{{ $i }}</td>
                                    <td>{{ $exam->etudiant->prenom.' '.$exam->etudiant->nom }}</td>
                                    <td>{{ $exam->matiere->nom }}</td>
                                    <td>{{ $exam->note_exam }}</td>
                                    <td>{{ $exam->coefficient }}</td>
                                    <td>{{ $exam->remarque }}</td>
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
