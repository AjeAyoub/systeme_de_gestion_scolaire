@extends('layouts.master')

@section('css')
    <!-- Additional CSS styles -->
@endsection

@section('title')
    Emplois
@endsection

@section('page-header')
    <!-- Breadcrumb and page title code -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <?php $i = 0; ?>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">id</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Section</th>
                                <th scope="col">Fichié</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emplois as $emploi)
                                <?php $i++; ?>
                                <tr class="text-center">
                                    <td>{{ $i }}</td>
                                    <td>{{ $emploi->niveau->nom }}</td>
                                    <td>{{ $emploi->classe->nom }}</td>
                                    <td>{{ $emploi->section->nom }}</td>
                                    <td>
                                      <button class="btn btn-success"><a href="{{ asset('storage/pdf/' . $emploi->file) }}" target="_blank">Voir Emploi</a></button>  
                                    </td>
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
    <!-- Additional JavaScript code -->
@endsection
