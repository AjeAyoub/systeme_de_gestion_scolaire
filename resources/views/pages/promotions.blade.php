@extends('layouts.master')
@section('css')

@section('title')
    Promotions
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
    <div class="row">
        <div class="col-sm-6 text-right">
            <ol class="breadcrumb pt-0 pr-0 float-right float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Accueil</a></li>
                <li class="breadcrumb-item active">promouvoir les étudiants</li>
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


<!-- promouvoir les étudiants form -->
<h2>promouvoir les étudiants</h2>
<br><br>
    <form  action="{{ route('promotion.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputName">Etudiant(e)</label>
            <select class="fancyselect form-control" style="padding: 10px 0;" name="etudiant_ids[]" multiple>
                <option selected disabled>Sélectionnez Etudiant(e)</option>
                @foreach ($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}">{{ $etudiant->prenom." ".$etudiant->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName">De Niveau</label>
                    <select class="fancyselect form-control" style="padding: 10px 0;" name="niveau_id">
                        <option selected>Sélectionnez un Niveau</option>
                        @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">De Classe</label>
                    <select class="fancyselect form-control" style="padding: 10px 0;" name="classe_id">
                        <option selected>Sélectionnez une Classe</option>
                        @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">De Section</label>
                    <select class="fancyselect form-control" style="padding: 10px 0;" name="section_id">
                        <option selected>Sélectionnez une Section</option>
                        @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->nom }}</option>
                        @endforeach
                    </select>
                </div>                             
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName">Vers Niveau</label>
                    <select class="fancyselect form-control" style="padding: 10px 0;" name="vers_niveau_id">
                        <option selected>Sélectionnez un Niveau</option>
                        @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">Vers Classe</label>
                    <select class="fancyselect form-control" style="padding: 10px 0;" name="vers_classe_id">
                        <option selected>Sélectionnez une Classe</option>
                        @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">Vers Section</label>
                    <select class="fancyselect form-control" style="padding: 10px 0;" name="vers_section_id">
                        <option selected>Sélectionnez une Section</option>
                        @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->nom }}</option>
                        @endforeach
                    </select>
                </div>
                

            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Promouvoir</button>
    </form>
    <br><br>

<!--end  promouvoir les étudiants -->

      </div>
    </div>
  </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@section('js')
@endsection
