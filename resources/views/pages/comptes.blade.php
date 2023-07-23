@extends('layouts.master')
@section('css')

@section('title')
  Comptes
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->


<div class="page-title">
    <div class="row">
        <div class="col-sm-6 text-right">
            <ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">Liste des Comptes</li>
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
            <button id="openFormButton" class="btn btn-primary ml-2">Ajouter Compte</button>

            <!-- search form -->
            <form action="{{ route('compte.index') }}" method="GET" class="mb-3">
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
                    <h5 class="modal-title">Ajouter Compte</h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span>&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('compte.store') }}" method="POST">
                      @csrf
                      <div class="form-group">
                          <label for="inputName">Nom</label>
                          <input name="name" type="text" class="form-control" id="nom">
                      </div>
                      <div class="form-group">
                          <label for="inputName">Email</label>
                          <input name="email" type="email" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                          <label for="inputName">Password</label>
                          <input name="password" type="password" class="form-control" id="password">
                      </div>
                      <div class="form-group">
                        <label for="inputName">Role</label>
                        <select name="role" class="form-control" id="role">
                            <option selected>Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Enseignant">Enseignant</option>
                            <option value="Comptable">Comptable</option>
                            <option value="Etudiant">Etudiant</option>
                            <option value="Parent">Parent</option>
                        </select>
                    </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                          <button type="submit" class="btn btn-primary">Ajouter Compte</button>
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
              <th scope="col">Email</th>
              <th scope="col">Password</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($comptes as $compte)
            <?php $i++; ?>

            <tr class="text-center">
              <td>{{ $i }}</td>
              <td>{{ $compte->name }}</td>
              <td>{{ $compte->email }}</td>
              <td>{{ $compte->password }}</td>
              <td>{{ $compte->role }}</td>
              <td>

                <!-- start modal edit form -->
                <div id="editformModal{{ $compte->id }}" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier compte</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('compte.update', $compte->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                            <label for="inputNom">Nom</label>
                            <input name="name" type="text" class="form-control" id="name{{ $compte->id }}" value="{{ $compte->name ?? '' }}">
                          </div>
                          <div class="form-group">
                            <label for="inputNom">Email</label>
                            <input name="email" type="email" class="form-control" id="email{{ $compte->id }}" value="{{ $compte->email ?? '' }}">
                          </div>
                          <div class="form-group">
                            <label for="inputNom">Password</label>
                            <input name="password" type="password" class="form-control" id="password{{ $compte->id }}" value="{{ $compte->password ?? '' }}">
                          </div>
                          <div class="form-group">
                            <label for="inputName">Role</label>
                            <select name="role" class="form-control" id="role{{ $compte->id }}">
                                <option value="Super Admin" {{ $compte->role === 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="Admin" {{ $compte->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Enseignant" {{ $compte->role === 'Enseignant' ? 'selected' : '' }}>Enseignant</option>
                                <option value="Comptable" {{ $compte->role === 'Comptable' ? 'selected' : '' }}>Comptable</option>
                                <option value="Etudiant" {{ $compte->role === 'Etudiant' ? 'selected' : '' }}>Etudiant</option>
                                <option value="Parent" {{ $compte->role === 'Parent' ? 'selected' : '' }}>Parent</option>
                            </select>
                           </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Modifier Compte</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end modal edit form -->


                <div style="display: inline;">
                  <button type="button" class="btn btn-info btn-lg mb-1" data-toggle="modal" data-target="#editformModal{{ $compte->id }}" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                
                  <form style="display: inline;" action="{{ route('compte.destroy', $compte->id) }}" method="POST">
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
  {!! $comptes->appends(['search' => request('search')])->links() !!}
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
