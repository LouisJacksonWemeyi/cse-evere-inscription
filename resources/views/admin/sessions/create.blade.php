@extends('layouts.admin')

@section('title', "Ajouter une session")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
      <div class="breadcrumbs">
          <div class="col-sm-12">
              <div class="page-header float-left">
                  <div class="page-title">
                      <h1>Ajouter une session</h1>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
               <div class="card-body">
                  <form action="{{ route('sessions.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group has-success">
                        <label for="title" class="control-label mb-1">Nom de la session</label>
                        <input id="title" name="title" type="text" class="form-control title" required>
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