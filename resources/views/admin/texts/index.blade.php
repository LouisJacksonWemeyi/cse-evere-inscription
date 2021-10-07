@extends('layouts.admin')

@section('title', "Configuration des textes")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-lg-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Configuration des textes</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <small>Variables disponibles</small>
              </div>
              <div class="card-body card-block">
                  <div class="row form-group">
                    <div class="col-12 col-md-12">           
                        [NOM ENFANT], [PRENOM ENFANT], [MAISON DE QUARTIER], [MONTANT TOTAL], [PERIODES]
                    </div>
                  </div>
              </div>
            </div>
        </div>

        @foreach($datas as $data)
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    {{ $data->title }}
                  </div>
                  <div class="card-body card-block">
                      <div class="row form-group">
                        <div class="col-12 col-md-12">
                            <textarea id="text_{{ $data->id }}" name="textarea-input"  rows="5" placeholder="Texte" class="form-control" style="resize: none;">{{ $data->text }}</textarea>
                            <button data-id="{{ $data->id }}"
                                    data-token="{{ csrf_token() }}" 
                                    data-url="{{ route('texts.update', ['id' => $data->id]) }}"
                                    type="button" 
                                    class="btn btn-lg btn-info btn-block text_update">
                                    <i class="fa fa-edit fa-lg"></i> Modifier
                            </button>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Right Panel -->
@endsection