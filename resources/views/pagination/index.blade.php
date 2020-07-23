@extends('layouts.app')

@section('content')
@section('css')
  <style>
      .loading {
          background: lightgrey;
          padding: 50px;
          position: fixed;
          border-radius: 4px;
          left: 50%;
          top: 50%;
          text-align: center;
          margin: -40px 0 0 -50px;
          z-index: 2000;
          display: none;
      }
  </style>
@endsection

@include('pagination.main')

@stop


