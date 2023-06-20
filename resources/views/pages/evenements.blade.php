@extends('layouts.master')
@section('css')

@section('title')
    Evénements
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
    <div class="row">
        <div class="col-sm-6 text-right">
            <ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Liste des Evénements</li>
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
            <button id="openFormButton" class="btn btn-primary ml-2">Ajouter Evénement</button>

            <!-- search form -->
            <form action="{{ route('evenement.index') }}" method="GET" class="mb-3">
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
                <h5 class="modal-title">Ajouter Evénement</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('evenement.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">Nom</label>
                                <input name="nom" type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Date</label>
                                <input name="date" type="date" class="form-control" id="inputName">
                            </div>
                            <div class="form-group">
                                <label for="inputtelephone">Déscription</label>
                                <input name="description" type="text" class="form-control" id="inputtelephone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">Niveau</label>
                                <select class="fancyselect form-control" name="niveau_id">
                                    <option selected>Sélectionnez un Niveau</option>
                                    @foreach ($niveaux as $niveau)
                                    <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Classe</label>
                                <select class="fancyselect form-control" name="classe_id">
                                    <option selected>Sélectionnez une Classe</option>
                                    @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Section</label>
                                <select class="fancyselect form-control" name="section_id">
                                    <option selected>Sélectionnez une Section</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Coût</label>
                                <select class="fancyselect form-control" name="cout_id">
                                    <option selected>Sélectionnez un Coût</option>
                                    @foreach ($couts as $cout)
                                    <option value="{{ $cout->id }}">{{ $cout->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter Evénement</button>
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
              <th scope="col">date</th>
              <th scope="col">Déscription</th>
              <th scope="col">Niveau</th>
              <th scope="col">classe</th>
              <th scope="col">Section</th>
              <th scope="col">Coût</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($evenements as $evenement)
            <?php $i++; ?>

            <tr class="text-center">
                <td>{{ $i }}</td>
                <td>{{ $evenement->nom }}</td>
                <td>{{ $evenement->date }}</td>
                <td>{{ $evenement->description }}</td>
                <td>{{ $evenement->niveau->nom }}</td>
                <td>{{ $evenement->classe->nom }}</td>
                <td>{{ $evenement->section->nom }}</td>
                <td>{{ $evenement->cout->montant }}</td>
                <td>
                <!-- start modal edit form -->
                <div id="editformModal{{ $evenement->id }}" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier Evénement</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('evenement.update', $evenement->id) }}" method="POST">
                          @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="inputName">Nom</label>
                                        <input name="nom" type="text" class="form-control" id="inputName{{ $evenement->id }}" value="{{ $evenement->nom ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Date</label>
                                        <input name="prenom" type="date" class="form-control" id="inputName{{ $evenement->id }}" value="{{ $evenement->date ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputtelephone">Déscription</label>
                                        <input name="description" type="text" class="form-control" id="inputtelephone{{ $evenement->id }}" value="{{ $evenement->description ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Niveau</label>
                                        <select class="fancyselect form-control" name="niveau_id">
                                        @foreach ($niveaux as $niveau)
                                            <option value="{{ $niveau->id }}" {{ $niveau->id == $evenement->niveau_id ? 'selected' : '' }}>
                                            {{ $niveau->nom }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputName">Classe</label>
                                        <select class="fancyselect form-control" name="classe_id">
                                        @foreach ($classes as $classe)
                                            <option value="{{ $classe->id }}" {{ $classe->id == $evenement->classe_id ? 'selected' : '' }}>
                                            {{ $classe->nom }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputName">Section</label>
                                        <select class="fancyselect form-control" name="section_id">
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}" {{ $section->id == $evenement->section_id ? 'selected' : '' }}>
                                            {{ $section->nom }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputName">Coût</label>
                                        <select class="fancyselect form-control" name="cout_id">
                                        @foreach ($couts as $cout)
                                            <option value="{{ $cout->id }}" {{ $cout->id == $evenement->cout_id ? 'selected' : '' }}>
                                            {{ $cout->montant }}
                                            </option>                             
                                        @endforeach
                                        </select>
                                    </div> 
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Modifier Evénement</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    </div>
                </div>
                </div>
                <!-- end modal edit form -->


                    <div style="display: inline;">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editformModal{{ $evenement->id }}" title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                        
                        <form style="display: inline;" action="{{ route('evenement.destroy', $evenement->id) }}" method="POST">
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
  {!! $evenements->appends(['search' => request('search')])->links() !!}
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
