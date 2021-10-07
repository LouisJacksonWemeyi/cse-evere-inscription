@extends('layouts.admin')

@section('title', "Maisons de quartier")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Maisons de quartier pour la date de session "<a href="{{ route('sessions.show', ['id' => $data->session->id]) }}">{{ $data->title }}</a>"</h1>
                    </div>
                </div>
            </div>
        <div class="col-lg-12 animated fadeIn">
          <div class="card">
              <div class="card-header">
                  <h2 style="display: inline-block;">Maisons de quartier</h2>
              </div>
              <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Places <small>(cliquez sur une valeur pour la modifier)</small></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data->centers as $center)
                        <tr id="center_{{ $center->id }}">
                            <td>
                              <div class="center_title" 
                              data-id="{{ $center->id }}"
                              data-token="{{ csrf_token() }}" 
                              data-url="{{ route('center.update', ['id' => $center->id]) }}" >{{ $center->center->title }}</div>
                            </td>                           
                            <td>
                              <div class="center_places" 
                              data-id="{{ $center->id }}"
                              data-token="{{ csrf_token() }}" 
                              data-url="{{ route('center.update', ['id' => $center->id]) }}"
                              contenteditable >{{ $center->places  }}</div>
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