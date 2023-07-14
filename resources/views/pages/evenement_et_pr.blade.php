@extends('layouts.master')
@section('css')

@section('title')
  Evénements
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->


<!-- breadcrumb -->
@endsection
@section('content')


<!-- row -->
<div class="row">
  <div class="col-md-12 mb-30">
    <div class="card card-statistics h-100">
      <div class="card-body">
        <?php $i = 0; ?>         
          <thead class="thead-light">
          </thead>
          <tbody> 
            
            <!-- calendar -->
            <iframe src="/getevent" frameborder="0" width="100%" height="600"></iframe>
            <!-- calendar -->
          </tbody>
      </div>
    </div>
  </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

@section('js')



@endsection


