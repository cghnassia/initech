@extends('layout')

@section('container')
  <div class="starter-template">
    <!--<h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>-->

    <input type="text" class="form-control" id="sort-input" placeholder="Enter numbers separated by comma">

    <div class="progress progress-striped active">
      <div class="progress-bar" role="progressbar" arial-valuebow="45", aria-valuemin="0" aria-valuemax="100" style="width:45%;"> </div>
      <!--<span clas="sr-only">45% Complete</span>-->
    </div>

    <div class="" id="sort-output">
    </div>
  </div>
  	
  <!--<footer>
    <p>&copy; Company 2014</p>
  </footer>-->
@stop
