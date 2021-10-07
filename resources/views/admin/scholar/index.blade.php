@extends('layouts.admin')

@section('title', "Inscriptions")

@section('content')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Soutien scholaire</h1>
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
	                	  <a href="{{ route('scholar.export') }}">
	                	    <button type="button" class="btn btn-secondary"><i class="fa fa-table"></i> Exporter</button>
	                	  </a>                        
	                	</div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nom parent</th>
                        <th>Prénom parent</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Nom enfant</th>
                        <th>Prénom enfant</th>
                        <th>Adresse</th>
                        <th>CP</th>
                        <th>Genre</th>
                        <th>Nom école</th>
                        <th>CP école</th>
                        <th>Educ.</th>
                        <th>Année scolaire</th>
                        <th>Soutiens</th>
                        <th>Remarques</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                          <tr>
                            <td>{{ $data->parent_lastname }}</td>
                            <td>{{ $data->parent_firstname }}</td>
                            <td>{{ $data->parent_mail }}</td>
                            <td>{{ $data->parent_phone }}</td>
                            <td>{{ $data->child_lastname }}</td>
                            <td>{{ $data->child_firstname }}</td>
                            <td>{{ $data->adress }}</td>
                            <td>{{ $data->postal_code }}</td>
                            <td>{{ $data->child_gender }}</td>
                            <td>{{ $data->school_name }}</td>
                            <td>{{ $data->school_postal_code }}</td>
                            <td>{{ $data->education_type }}</td>
                            <td>{{ $data->scholar_year }}</td>
                            <td>{{ $data->supports }}</td>
                            <td>{{ $data->notes }}</td>
                            <td class="text-right">
                                <button data-id="{{ $data->id }}"
                                        data-token="{{ csrf_token() }}" 
                                        data-url="{{ route('scholars.destroy', ['id' => $data->id]) }}"
                                        class="btn btn-outline-danger scholar_destroy">
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