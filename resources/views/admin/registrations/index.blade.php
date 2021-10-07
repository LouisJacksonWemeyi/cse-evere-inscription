@extends('layouts.admin')

@section('title', "Inscriptions")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Inscriptions</h1>
                    </div>
                </div>
            </div>
        </div>
        @foreach($sessions as $session)
            <div class="content mt-3">

                <div class="animated fadeIn">
                    <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            @foreach($centers as $center)
                            <div class="card-header">
                                    <a href="{{ route('registrations.export', ["session_id" => $session->id,"center_id" => $center->id]) }}">
                                        <button type="button" class="btn btn-secondary"><i class="fa fa-table"></i> Exporter</button>
                                    </a>  
                              <h2>Session "{{ $session->title }}" pour "{{ $center->title }}"</h2>                      
                            </div>
                            <div class="card-body">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Adresse</th>
                            <th>N° / Boite</th>
                            <th>CP</th>
                            <th>GSM Parent</th>
                            <th>Remarques</th>
                            @foreach($session->session_dates as $session_date)
                                <th>{{ $session_date->abbreviation }}</th>
                            @endforeach
                            <th>Garderie</th>
                            <th>Maladies</th>
                            <th>Groupe sanguin</th>
                            <th>Médication</th>
                            <th>Allergie</th>
                            <th>Date paiement</th>
                            <th>Payé</th>
                            <th>Montant</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($session->registrations as $registration)
                            @if($registration->community_center_id == $center->id)
                                <?php 
                                    $total_session_date = 0;


                                    foreach($registration->session_dates as $session_date){
                                         
                                        if($registration->postal_code == 1140){
                                            $total_session_date += $session_date->price; 
                                        }else{
                                                $total_session_date += $session_date->full_price;
                                        } 
                                    }
                                ?>
                            <tr id="reg-{{ $registration->id }}">
                                <td>{{ $registration->child_lastname }}</td>
                                <td>{{ $registration->child_firstname }}</td>
                                <td>{{ $registration->child_birthday->format('d-m-Y') }}</td>
                                <td>{{ $registration->street }}</td>
                                <td>{{ $registration->street_number }}{{ $registration->postal_box != 0 ? " / ".$registration->postal_box : "" }}</td>
                                <td>{{ $registration->postal_code }}</td>
                                <td>{{ $registration->parent_phone }}</td>
                                <td>{{ $registration->note }} </td>
                                @foreach($session->session_dates as $session_date)
                                    <td>
                                        <?php $registration_in_session_date = 0; ?>
                                        @foreach($registration->session_dates as $registration_session_date)
                                        <?php 

                                            if ($registration_session_date->id == $session_date->id) {
                                                $registration_in_session_date = 1;
                                                if ($registration->checked_nursery) {
                                                    $total_session_date += 5;
                                                    
                                                }
                                            }

                                        ?>

                                        @endforeach
                                        @if($registration_in_session_date == 1)
                                            <i style="color:green;" class="fa fa-check fa-2x"></i>
                                        @else
                                            <i style="color:red;" class="fa fa-times fa-2x"></i>
                                        @endif
                                    </td>
                                @endforeach
                                <td>{{ $registration->checked_nursery == 1 ? 'Oui' : 'Non' }}</td>
                                <td>{{ $registration->child_disease }}</td>
                                <td>{{ $registration->child_bloodgroup }}</td>
                                <td>{{ $registration->child_medicine }}</td>
                                <td>{{ $registration->child_allergy }}</td>
                                <td>{{  isset($registration->paid_date)? $registration->paid_date->format('d/m/Y') : '' }}</td>
                                <td>{{ $registration->paid_amount }}</td>
                                <td>{{ $total_session_date }}</td>

                                <td class="text-right">
                                    <a href="{{ route('registrations.edit', ['id' => $registration->id]) }}"><button class="btn btn-outline-warning"><i class="fa fa-edit"></i></button></a>
                                    <button data-id="{{ $registration->id }}"
                                            data-token="{{ csrf_token() }}" 
                                            data-url="{{ route('registration.destroy', ['id' => $registration->id]) }}"
                                            class="btn btn-outline-danger registration_destroy">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                              </tr>
                            @endif
                            @endforeach   
                        </tbody>
                      </table>
                            </div>
                        @endforeach   
                        </div>
                    </div>


                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
        @endforeach
    </div>

    <!-- Right Panel -->
@endsection