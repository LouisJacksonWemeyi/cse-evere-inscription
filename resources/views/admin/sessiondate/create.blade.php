@extends('layouts.admin')

@section('title', "Ajouter une date")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
      <div class="breadcrumbs">
          <div class="col-sm-12">
              <div class="page-header float-left">
                  <div class="page-title">
                      <h1>Ajouter une date pour "<a href="{{ route('sessions.show', ['id' => $data->id]) }}">{{ $data->title }}</a>"</h1>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
               <div class="card-body">
                  <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group has-success">
                        <label for="title" class="control-label mb-1">Nom</label>
                        <input id="title" name="title" type="text" class="form-control title" required>
                    </div>
                    <div class="form-group has-success">
                        <label for="abbreviation" class="control-label mb-1">Abréviation</label>
                        <input id="abbreviation" name="abbreviation" type="text" class="form-control abbreviation" required>
                        <small>Cette abréviation sera utilisée à la génération du document excel.</small>
                    </div>                    
                    <div class="form-group has-success">
                        <label for="price" class="control-label mb-1">Prix</label>
                        <input id="price" name="price" type="number" step="0.01" class="form-control abbreviation" required>
                    </div>                    
                    <div class="form-group has-success">
                        <label for="full_price" class="control-label mb-1">Prix (non Everois)</label>
                        <input id="full_price" name="full_price" type="number" step="0.01" class="form-control abbreviation" required>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <span id="button-amount">Envoyer</span>
                            <span id="button-sending" style="display:none;">Envoi…</span>
                        </button>
                    </div>
                  </form>
               </div>
            </div>
        </div> <!-- .card -->

      </div>
    </div>

    <!-- Right Panel -->
@endsection