@extends('layouts.master')
@section('css')

@section('title')
    Résultats
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
    <div class="row">
        <div class="col-sm-6 text-right">
            <ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Liste des Résultats</li>
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
            <button id="openFormButton" class="btn btn-primary ml-2">Ajouter Résultat</button>

            <!-- search form -->
            <form action="{{ route('resultat.index') }}" method="GET" class="mb-3">
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
                    <h5 class="modal-title">Ajouter Résultat</h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span>&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('resultat.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="inputName">Etudiant(e)</label>
                            <select class="fancyselect form-control" name="etudiant_id">
                            <option selected>Sélectionnez Etudiant(e)</option>
                            @foreach ($etudiants as $etudiant)
                                <option value="{{ $etudiant->id }}">{{ $etudiant->prenom.' '.$etudiant->nom }}</option>
                            @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                          <label for="inputName">Résultat</label>
                          <input name="file" type="file" class="form-control" id="file">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter Résultat</button>
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
              <th scope="col">Résultat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($resultats as $resultat)
            <?php $i++; ?>

            <tr class="text-center">
              <td>{{ $i }}</td>
              <td>{{ $resultat->etudiant->prenom.' '.$resultat->etudiant->nom }}</td>
              <td>{{ 'PDF' }}</td>

              <td>

                <!-- start modal edit form -->
                <div id="editformModal{{ $resultat->id }}" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier Résultat</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('resultat.update', $resultat->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Etudiant(e)</label>
                                <select class="fancyselect form-control" name="etudiant_id">
                                @foreach ($etudiants as $etudiant)
                                    <option value="{{ $etudiant->id }}" {{ $etudiant->id == $resultat->etudiant_id ? 'selected' : '' }}>
                                    {{ $resultat->etudiant->prenom.' '.$resultat->etudiant->nom }}
                                    </option>                             
                                @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                              <label for="inputNom">Résultat</label>
                              <input name="file" type="file" class="form-control" id="file{{ $resultat->id }}" value="{{ $resultat->file ?? '' }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Modifier Résultat</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end modal edit form -->


                <div style="display: inline;">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editformModal{{ $resultat->id }}" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>

                  <button class="btn btn-success"><a href="{{ asset('storage/pdf/' . $resultat->file) }}" target="_blank">Voir Résultat</a></button>  

                
                  <form style="display: inline;" action="{{ route('resultat.destroy', $resultat->id) }}" method="POST">
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
  {!! $resultats->appends(['search' => request('search')])->links() !!}
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
