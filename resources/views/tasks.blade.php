@extends('layouts.main')
@section('content')

  <style>
      .mask-custom {
        background: rgba(24, 24, 16, 0.2);
        border-radius: 2em;
        backdrop-filter: blur(25px);
        border: 2px solid rgba(255, 255, 255, 0.05);
        background-clip: padding-box;
        box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
      }

      * {
          color: #000;
      }

      body {
        background-color: #f8f9fa;
      }

      .task-form-container {
          max-width: 500px;
          margin: 50px auto;
          padding: 30px;
          background: #fff;
          border-radius: 10px;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      .form-control {
          border-radius: 5px;
      }
      .btn-primary {
          width: 100%;
          border-radius: 5px;
      }
      .gap-15 {
          gap: 15px;
      }

      @media(max-width: 768px) {
          .d-flex {
              flex-direction: column;
          }
      }
  </style>

  @livewire('add-task')

  @livewire('tasks')
@endsection