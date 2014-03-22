@extends('layout')
  
@section('head') 

{{ HTML::style('css/custom-index.css') }}

@stop

@section('container')
  <div class="starter-template">
    <!--<h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>-->

    <div class="alert alert-danger alert-error" id="sort-error">
        <strong>Please enter numbers separated with coma</strong>
    </div>
    <input type="text" class="form-control" id="sort-input" placeholder="Enter numbers separated by comma">

   <div class="progress">
      <div class="progress-bar" id="sort-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
      <!--<span class="sr-only">60% Complete</span>-->
    </div>
  </div>

    <div class="" id="sort-output">
    </div>
  </div>
  	
  <!--<footer>
    <p>&copy; Company 2014</p>
  </footer>-->
@stop
