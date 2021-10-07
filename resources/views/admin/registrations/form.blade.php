@extends('layouts.admin')

@section('title', "Modifier inscription")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Modification de l'inscription de {{ $data->child_lastname }} {{ $data->child_firstname }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                 <div class="card-body">
                    <form action="{{ route('registrations.edit', ['id' => $data->id]) }}" method="POST">
                      {{ csrf_field() }}
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="parent_firstname" class="control-label mb-1">Nom du parent <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="parent_firstname" name="parent_firstname" type="text" class="form-control parent_firstname" value="{{ $data->parent_firstname }}" required>
                        </div>                      
                      </div>                       
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="parent_lastname" class="control-label mb-1">Prénom du parent <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="parent_lastname" name="parent_lastname" type="text" class="form-control parent_lastname" value="{{ $data->parent_lastname }}" required>
                        </div>                      
                      </div>                         
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="parent_mail" class="control-label mb-1">Mail du parent <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="parent_mail" name="parent_mail" type="text" class="form-control parent_mail" value="{{ $data->parent_mail }}" required>
                        </div>                      
                      </div>                           
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="street" class="control-label mb-1">Rue <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="street" name="street" type="text" class="form-control street" value="{{ $data->street }}" required>
                        </div>                      
                      </div>                          
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="street_number" class="control-label mb-1">N° <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="street_number" name="street_number" type="text" class="form-control street_number" value="{{ $data->street_number }}" required>
                        </div>                      
                      </div>                        
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="postal_box" class="control-label mb-1">Boite </label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="postal_cbox" name="postal_box" type="text" class="form-control postal_cbox" value="{{ $data->postal_box }}">
                        </div>                      
                      </div>                      
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="postal_code" class="control-label mb-1">Code postal <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="postal_code" name="postal_code" type="text" class="form-control postal_code" value="{{ $data->postal_code }}" required>
                        </div>                      
                      </div>                      
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="parent_phone" class="control-label mb-1">Téléphone du parent <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="parent_phone" name="parent_phone" type="text" class="form-control parent_phone" value="{{ $data->parent_phone }}" required>
                        </div>                      
                      </div>                      
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_firstname" class="control-label mb-1">Prénom de l'enfant <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="child_firstname" name="child_firstname" type="text" class="form-control child_firstname" value="{{ $data->child_firstname }}" required>
                        </div>                      
                      </div>                      
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_lastname" class="control-label mb-1">Nom de l'enfant <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="child_lastname" name="child_lastname" type="text" class="form-control child_lastname" value="{{ $data->child_lastname }}" required>
                        </div>                      
                      </div>                      
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_birthday" class="control-label mb-1">Date de naissance <i style="color: red;">*</i></label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="child_birthday" name="child_birthday" type="date" class="form-control child_birthday" value="{{ $data->child_birthday->format('Y-m-d') }}" required>
                        </div>                      
                      </div>                           
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_gender" class="control-label mb-1">Genre</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <?php $genders = ["Fille", "Garçon"]; ?>
                            <select name="child_gender" id="child_gender" class="form-control child_gender" selected="{{ $data->child_gender }}">
                              @foreach($genders as $gender)
                                <option value="{{ $gender }}" {{ $gender == $data->child_gender ? 'selected' : '' }}>{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>                      
                      </div>                      
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="doctor_phone" class="control-label mb-1">Téléphone du médecin</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="doctor_phone" name="doctor_phone" type="text" class="form-control doctor_phone" value="{{ $data->doctor_phone }}">
                        </div>                      
                      </div>                        
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_disease" class="control-label mb-1">Maladie/handicap</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <textarea id="child_disease" name="child_disease" type="text" class="form-control child_disease" rows="5">{{ $data->child_disease }}</textarea>
                        </div>                      
                      </div>  
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_bloodgroup" class="control-label mb-1">Groupe sanguin</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="child_bloodgroup" name="child_bloodgroup" type="text" class="form-control child_bloodgroup" value="{{ $data->child_bloodgroup }}">
                        </div>                      
                      </div>    
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_medicine" class="control-label mb-1">Traitement</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <textarea id="child_medicine" name="child_medicine" type="text" class="form-control child_medicine">{{ $data->child_medicine }}</textarea>
                        </div>                      
                      </div>                          
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="child_allergy" class="control-label mb-1">Allergies</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="child_allergy" name="child_allergy" type="text" class="form-control child_allergy" value="{{ $data->child_allergy }}">
                        </div>                      
                      </div>    
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="note" class="control-label mb-1">Remarques</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <textarea id="note" name="note" type="text" class="form-control note">{{ $data->note }}</textarea>
                        </div>                      
                      </div> 
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="checked_nursery" class="control-label mb-1">Garderie</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <label class="switch switch-default switch-pill switch-primary mr-2">
                              <input type="checkbox" id="checked_nursery" name="checked_nursery" class="switch-input checked_nursery" 
                              {{ $data->checked_nursery == 1 ? 'checked' : '' }} value="1"> <span class="switch-label"></span> <span class="switch-handle"></span>
                            </label>

                            <input id="nursery" name="nursery" type="text" class="form-control nursery" value="{{ $data->nursery }}">
                        </div>                      
                      </div> 
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="community_center_id" class="control-label mb-1">Maison de quartier</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                          <label for="community_center_id" class="control-label mb-1">{{ $data->community_center->center->title }}</label>
                        </div>                      
                      </div> 
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="paid_amount" class="control-label mb-1">Montant reçu</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="paid_amount" name="paid_amount" type="number" step="0.01" class="form-control paid_amount" value="{{ $data->paid_amount }}">
                        </div>                      
                      </div>   
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="bank_info" class="control-label mb-1">Informations bancaire</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="bank_info" name="bank_info" type="text" class="form-control bank_info" value="{{ $data->bank_info }}">
                        </div>                      
                      </div>                       
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="op" class="control-label mb-1">N° OP</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="op" name="op" type="text" class="form-control op" value="{{ $data->op }}">
                        </div>                      
                      </div>                       
                      <div class="form-group col-lg-12">
                        <div class="form-group col-lg-3">
                            <label for="bank_info" class="control-label mb-1">Date de paiement</label>
                        </div>                      
                        <div class="form-group col-lg-9">
                            <input id="paid_date" name="paid_date" type="date" class="form-control paid_date" value="{{ isset($data->paid_date) ? $data->paid_date->format('Y-m-d') : '' }}">
                        </div>
                        <div class="form-group col-lg-12">
                          <small>Si vous entrez une date, un mail de confirmation sera envoyé à {{ $data->parent_firstname }} {{ $data->parent_lastname }}</small>                    
                        </div>
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