@extends('layout')
  
@section('head') 

{{ HTML::style('css/custom-index.css') }}

@stop

@section('container')
  <div class="starter-template">
    <!--<h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>-->

    <div class="alert alert-success" id="sort-success">  
      <a class="close" data-dismiss="alert">×</a>  
      <strong>The list was sucessfully sorted</strong>
    </div>  

    <div class="alert alert-danger alert-error" id="sort-error">
        <strong>Please enter numbers separated by coma</strong>
    </div>

    <form id="form-sort" method="post" method="POST" action="/sort" accept-charset="UTF-8">

      <input type="hidden" id="token" name="token" value="{{ $token }}">

      <div class="input-group">
        <input type="text" class="form-control" id="input-sort" placeholder="Enter numbers separated by comma">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>

      <div class="progress">
        <div class="progress-bar" id="sort-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        <!--<span class="sr-only">60% Complete</span>-->
        </div>
      </div>

    </form>


    <!--<div class="" id="sort-output"></div>-->
  </div>
  	
  <!--<footer>
    <p>&copy; Company 2014</p>
  </footer>-->
@stop
