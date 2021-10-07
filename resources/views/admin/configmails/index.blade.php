@extends('layouts.admin')

@section('title', "Adresse mails")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Adresse mails</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">

            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <small>Cette ou ces adresse(s) mail servent à recevoir une copie du mail envoyé lors d'une inscription aux activités.</small>
                    <div class="card">
                        <div class="card-header">
                          <a href="{{ route('configmails.create') }}">
                            <button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Ajouter</button>
                          </a>                        
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Active</th>
                        <th width="80%">Mails</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datas as $data)
                          <tr>
                            <td>
                                <label class="switch switch-text switch-primary">
                                    <input type="checkbox" 
                                           data-id="{{ $data->id }}" 
                                           data-url="{{ route('configmails.active', ['id' => $data->id]) }}" 
                                           data-token="{{ csrf_token() }}" 
                                           name="active_mail" 
                                           class="switch-input active_mail" 
                                           {{ $data->active == 1 ? "checked" : "" }}> 
                                           <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span>
                                </label>
                            </td>
                            <td>
                              <div class="configmail_mail" 
                              data-id="{{ $data->id }}"
                              data-token="{{ csrf_token() }}" 
                              data-url="{{ route('configmails.edit', ['id' => $data->id]) }}"
                              contenteditable >{{ $data->mail }}</div>
                            </td>
                            <td class="text-right">
                                <button data-id="{{ $data->id }}"
                                        data-token="{{ csrf_token() }}" 
                                        data-url="{{ route('configmails.destroy', ['id' => $data->id]) }}"
                                        class="btn btn-outline-danger mail_destroy">
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