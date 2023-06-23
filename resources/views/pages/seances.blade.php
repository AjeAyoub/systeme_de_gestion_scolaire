@extends('layouts.master')
@section('css')

@section('title')
    Seances
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
    <div class="row">
        <div class="col-sm-6 text-right">
            <ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Liste des Seances</li>
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
            <button id="openFormButton" class="btn btn-primary ml-2">Ajouter Seance</button>

            <!-- search form -->
            <form action="{{ route('seance.index') }}" method="GET" class="mb-3">
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
                    <h5 class="modal-title">Ajouter Seance</h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span>&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('seance.store') }}" method="POST">
                      @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName">Nom de Séance</label>
                                    <input name="nom" type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Déscription</label>
                                    <textarea name="description"  class="form-control" id="name"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Durée</label>
                                    <input name="duree" type="number" step="0.1" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName">Enseignant</label>
                                    <select class="fancyselect form-control" name="enseignant_id">
                                        <option selected>Sélectionnez Enseignant</option>
                                        @foreach ($enseignants as $enseignant)
                                            <option value="{{ $enseignant->id }}">{{ $enseignant->nom." ".$enseignant->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="inputName">Matière</label>
                                    <select class="fancyselect form-control" name="matiere_id">
                                        <option selected>Sélectionnez une Matière</option>
                                        @foreach ($matieres as $matiere)
                                            <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="inputName">Salle</label>
                                    <select class="fancyselect form-control" name="salle_id">
                                        <option selected>Sélectionnez une Salle</option>
                                        @foreach ($salles as $salle)
                                            <option value="{{ $salle->id }}">{{ $salle->numero }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div> 
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                          <button type="submit" class="btn btn-primary">Ajouter Seance</button>
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
              <th scope="col">Nom</th>
              <th scope="col">Déscription</th>
              <th scope="col">Durée</th>
              <th scope="col">Enseignant</th>
              <th scope="col">Matière</th>
              <th scope="col">Salle</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($seances as $seance)
            <?php $i++; ?>

            <tr class="text-center">
              <td>{{ $i }}</td>
              <td>{{ $seance->nom }}</td>
              <td>{{ $seance->description }}</td>
              <td>{{ $seance->duree }}</td>
              <td>{{ $seance->enseignant->nom." ".$enseignant->prenom }}</td>
              <td>{{ $seance->matiere->nom }}</td>
              <td>{{ $seance->salle->numero }}</td>
              <td>

                <!-- start modal edit form -->
                <div id="editformModal{{ $seance->id }}" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier Seance</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('seance.update', $seance->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Nom de Seance</label>
                                        <input name="nom" type="text" class="form-control" id="name{{ $seance->id }}" value="{{ $seance->nom ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Déscription</label>
                                        <textarea name="description" class="form-control" id="name{{ $seance->id }}">{{ $seance->description ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Durée</label>
                                        <input name="duree" type="number" step="0.1" class="form-control" id="name{{ $seance->id }}" value="{{ $seance->duree ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Enseignant</label>
                                        <select class="fancyselect form-control" name="enseignant_id">
                                        @foreach ($enseignants as $enseignant)
                                            <option value="{{ $enseignant->id }}" {{ $enseignant->id == $seance->enseignant_id ? 'selected' : '' }}>
                                            {{ $enseignant->nom." ".$enseignant->prenom }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputName">Matière</label>
                                        <select class="fancyselect form-control" name="matiere_id">
                                        @foreach ($matieres as $matiere)
                                            <option value="{{ $matiere->id }}" {{ $matiere->id == $seance->matiere_id ? 'selected' : '' }}>
                                            {{ $matiere->nom }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputName">Salle</label>
                                        <select class="fancyselect form-control" name="salle_id">
                                        @foreach ($salles as $salle)
                                            <option value="{{ $salle->id }}" {{ $salle->id == $seance->salle_id ? 'selected' : '' }}>
                                            {{ $salle->numero }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                </div>
                            </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Modifier Seance</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end modal edit form -->


                <div style="display: inline;">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editformModal{{ $seance->id }}" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                
                  <form style="display: inline;" action="{{ route('seance.destroy', $seance->id) }}" method="POST">
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
  {!! $seances->appends(['search' => request('search')])->links() !!}
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
