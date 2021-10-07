@extends('layouts.admin')

@section('title', "Sessions")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Sessions</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">

            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <a href="{{ route('sessions.create') }}">
                            <button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Ajouter</button>
                          </a>                        
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>
                          <label class="switch switch-text switch-primary switch-pill">
                            <input id="unactive_sessions" 
                                   type="checkbox" 
                                   data-url="{{ route('sessions.unactive') }}" 
                                   data-token="{{ csrf_token() }}"
                                   class="switch-input" {{ $datas->activated }}> 
                            <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
                          </label>
                        </th>
                        <th width="40%">Titre</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        @if($data->active == 1)
                           <?php $data->checked = "checked"; ?>
                        @else
                           <?php $data->checked = ""; ?>
                        @endif
                          <tr>
                            <td>
                                <label class="switch switch-text switch-primary">
                                    <input type="radio" 
                                           data-id="{{ $data->id }}" 
                                           data-url="{{ route('sessions.active', ['id' => $data->id]) }}" 
                                           data-token="{{ csrf_token() }}" 
                                           name="active_session" 
                                           class="switch-input active_session" 
                                           {{ $data->checked }}> 
                                           <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
                                </label>
                            </td>
                            <td>
                              <div class="session_title" 
                              data-id="{{ $data->id }}"
                              data-token="{{ csrf_token() }}" 
                              data-url="{{ route('session.editfield', ['id' => $data->id]) }}"
                              contenteditable >{{ $data->title }}</div>
                            </td>
                            <td>{{ $data->created->format('d/m/Y') }}</td>
                            <td>{{ $data->modified->format('d/m/Y') }}</td>
                            <td class="text-right">
                                <a href="{{ route('sessions.show', ['id' => $data->id]) }}"><button class="btn btn-outline-warning"><i class="fa fa-edit"></i></button></a>
                                <button data-id="{{ $data->id }}"
                                        data-token="{{ csrf_token() }}" 
                                        data-url="{{ route('session.destroy', ['id' => $data->id]) }}"
                                        class="btn btn-outline-danger session_destroy">
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
            </div><!-- .animated -->
        </div><!-- .content -->

    </div>

    <!-- Right Panel -->
@endsection