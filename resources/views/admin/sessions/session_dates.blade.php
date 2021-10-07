@extends('layouts.admin')

@section('title', "Sessions")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Infos de la session "<a href="{{ route('sessions.index') }}">{{ $data->title }}</a>"</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 animated fadeIn">
          <div class="card">
              <div class="card-header">
                  <h2 style="display: inline-block;">Dates</h2>
                  <a href="{{ route('session.dates.create', ['id' => $data->id]) }}">
                    <button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Ajouter</button>
                  </a>  
              </div>
              <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Titre</th>
                        <th>Abréviation</th>
                        <th>Prix</th>
                        <th>Prix (non Everois)</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data->session_dates as $sessionDate)
                        <tr id="{{ $sessionDate->id }}">
                          <td>
                            <div class="session_date_title" 
                              data-id="{{ $sessionDate->id }}"
                              data-url="{{ route('session.dates.edit', ['id' => $sessionDate->id]) }}"
                              contenteditable >{{ $sessionDate->title }}</div>
                          </td>
                          <td>
                            <div class="session_date_abbreviation" 
                              data-id="{{ $sessionDate->id }}"
                              data-url="{{ route('session.dates.edit', ['id' => $sessionDate->id]) }}"
                              contenteditable >{{ $sessionDate->abbreviation }}</div>
                          </td>                          
                          <td>
                            <div class="session_date_price" 
                              data-id="{{ $sessionDate->id }}"
                              data-url="{{ route('session.dates.edit', ['id' => $sessionDate->id]) }}"
                              contenteditable >{{ $sessionDate->price }}</div>
                          </td>
                          <td>
                            <div class="session_date_full_price" 
                              data-id="{{ $sessionDate->id }}"
                              data-url="{{ route('session.dates.edit', ['id' => $sessionDate->id]) }}"
                              contenteditable >{{ $sessionDate->full_price }}</div>
                          </td>                          
                          <td>
                            <a href="{{ route('centers.edit', ['session_date_id' => $sessionDate->id]) }}"><button class="btn btn-outline-warning"><i class="fa fa-edit"></i></button></a>
                            <button data-id="{{ $data->id }}"
                                    data-token="{{ csrf_token() }}" 
                                    data-url="{{ route('session.date.destroy', ['id' => $sessionDate->id]) }}"
                                    class="btn btn-outline-danger session_date_destroy">
                              <i class="fa fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
        </div>
       
    </div>

    <!-- Right Panel -->
@endsection