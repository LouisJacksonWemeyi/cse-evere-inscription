@extends('layouts.app')

@section('title', "Inscriptions activités durant les congés scolaires.  |  Asbl Cohésion Sociale d'Evere - Actions Communautaires")

@section('content')
	<div id="title">
		<div class="inner">
			<div class="container">
				<div class="span7">
					<h1>Inscriptions activités durant les congés scolaires.</h1>
				</div>
				<div class="span5">
					<div id="breadcrumbs">
						<div id="crumbs"><a href="http://csevere.be">Home</a>  /  <span class="	current">Inscriptions activités durant les congés scolaires.</span> / </div>									
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-wrap">
		<div id="content" class="post-5266 page type-page status-publish hentry">
			<div class="vc_row wpb_row vc_row-fluid">
				<div class="container">
					<div class="wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper">
		<div class="wpb_text_column wpb_content_element ">
			<div class="wpb_wrapper">
				@if($data == NULL || empty($data->session_dates[0]))
					<p style="text-align: center;"><strong>Il n'est plus possible de s'inscrire via notre site internet. Inscriptions clôturées.</strong></p>
				@else
				@if(Session::has('msg'))
					<br/>
					<br/>
					<div style="position: relative;
					            padding: .75rem 1.25rem;
					            margin-bottom: 1rem;
					            border: 1px solid transparent;
					            border-radius: .25rem;
					            color: #155724;
					            background-color: #d4edda;
					            border-color: #c3e6cb;">{{Session::get('msg')}}</div>
				@endif				
				@if(Session::has('error'))
					<br/>
					<br/>
					<div style="position: relative;
					            padding: .75rem 1.25rem;
					            margin-bottom: 1rem;
					            border: 1px solid transparent;
					            border-radius: .25rem;
					            color: #721c24;
					            background-color: #f8d7da;
					            border-color: #f5c6cb;">{{Session::get('error')}}</div>
				@endif
	<p style="text-align: center;"></p>
	<div class="wpforms-container wpforms-container-full" id="wpforms-5272">
		<form method="post" enctype="multipart/form-data" id="" action="" class="wpforms-validate wpforms-form">
			{{ csrf_field() }}
			<small style="color:red;">(* champs obligatoires)</small>
		<div class="wpforms-field-container">
		<div id="wpforms-5272-field_1-container" class="wpforms-field wpforms-field-name" data-field-id="1">
			<label class="wpforms-field-label" for="wpforms-5272-field_1">Nom du parent <span class="wpforms-required-label">*</span></label>
		<div class="wpforms-field-row wpforms-field-medium">
		<div class="wpforms-field-row-block wpforms-first wpforms-one-half">
			<input type="text" id="parent_firstname" class="wpforms-field-name-first wpforms-field-required" name="parent_firstname" required="" aria-required="true" value="{{ old('parent_firstname') }}">
			<label for="wpforms-5272-field_1" class="wpforms-field-sublabel after ">Prénom</label>
		</div>
	<div class="wpforms-field-row-block wpforms-one-half">
		<input type="text" id="parent_lastname" class="wpforms-field-name-last wpforms-field-required" name="parent_lastname" required="" aria-required="true" value="{{ old('parent_lastname') }}">
		<label for="wpforms-5272-field_1-last" class="wpforms-field-sublabel after ">Nom</label>
	</div>
	</div>
	</div>
	<div id="wpforms-5272-field_2-container" class="wpforms-field wpforms-field-email" data-field-id="2">
		<label class="wpforms-field-label" for="wpforms-5272-field_2">Adresse email du parent <span class="wpforms-required-label">*</span></label>
		<input type="email" id="parent_mail" class="wpforms-field-medium wpforms-field-required" name="parent_mail" required aria-required="true" value="{{ old('parent_mail') }}">
	</div>
	<div id="wpforms-5272-field_3-container" class="wpforms-field wpforms-field-text" data-field-id="3">
		<label class="wpforms-field-label" for="wpforms-5272-field_3">Rue <span class="wpforms-required-label">*</span></label>
		<input type="text" id="street" class="wpforms-field-medium wpforms-field-required" name="street" required="" aria-required="true" value="{{ old('street') }}">
	</div>
	<div id="wpforms-5272-field_30-container" class="wpforms-field wpforms-field-text" data-field-id="30">
		<label class="wpforms-field-label" for="wpforms-5272-field_30">n° de rue  <span class="wpforms-required-label">*</span></label>
		<input type="number" id="street_number" class="wpforms-field-medium wpforms-field-required" name="street_number" required="" aria-required="true" value="{{ old('street_number') }}">
	</div>	
	<div id="wpforms-5272-field_30-container" class="wpforms-field wpforms-field-text" data-field-id="30">
		<label class="wpforms-field-label" for="wpforms-5272-field_30">Boite </label>
		<input type="text" id="postal_box" class="wpforms-field-medium wpforms-field-required" name="postal_box" value="{{ old('postal_box') }}">
	</div>
	<div id="wpforms-5272-field_31-container" class="wpforms-field wpforms-field-text" data-field-id="31">
		<label class="wpforms-field-label" for="wpforms-5272-field_31">code postal <span class="wpforms-required-label">*</span></label>
		<input type="number" id="postal_code" class="wpforms-field-medium wpforms-field-required" name="postal_code" required aria-required="true" maxlength="4" value="{{ old('postal_code') }}">
	</div>
	<div id="wpforms-5272-field_19-container" class="wpforms-field wpforms-field-text" data-field-id="19">
		<label class="wpforms-field-label" for="wpforms-5272-field_19">Numéro de GSM du parent <span class="wpforms-required-label">*</span></label>
		<input type="text" id="parent_phone" class="wpforms-field-medium wpforms-field-required" name="parent_phone" required="" aria-required="true" value="{{ old('parent_phone') }}">
	</div>
	<div id="wpforms-5272-field_7-container" class="wpforms-field wpforms-field-name" data-field-id="7">
		<label class="wpforms-field-label" for="wpforms-5272-field_7">Nom de l'enfant <span class="wpforms-required-label">*</span></label>
		<div class="wpforms-field-row wpforms-field-medium">
		<div class="wpforms-field-row-block wpforms-first wpforms-one-half">
			<input type="text" id="child_firstname" class="wpforms-field-name-first wpforms-field-required" name="child_firstname" required="" aria-required="true" value="{{ old('child_firstname') }}">
			<label for="wpforms-5272-field_7" class="wpforms-field-sublabel after ">Prénom</label>
		</div>
	<div class="wpforms-field-row-block wpforms-one-half">
		<input type="text" id="child_lastname" class="wpforms-field-name-last wpforms-field-required" name="child_lastname" required="" aria-required="true" value="{{ old('child_lastname') }}">
		<label for="wpforms-5272-field_7-last" class="wpforms-field-sublabel after ">Nom</label>
	</div>
	</div>
	</div>
	<div id="wpforms-5272-field_11-container" class="wpforms-field wpforms-field-text" data-field-id="11">
		<label class="wpforms-field-label" for="wpforms-5272-field_11">Date de naissance <span class="wpforms-required-label">*</span></label>
		<input type="date" id="child_birthday" class="wpforms-field-medium wpforms-field-required" name="child_birthday" required aria-required="true" min="{{ (date("Y")-11) }}-01-01" max="{{ (date("Y")-5) }}-12-31" value="{{ old('child_birthday') }}">
	</div>
	<div id="wpforms-5272-field_10-container" class="wpforms-field wpforms-field-select" data-field-id="10">
		<label class="wpforms-field-label" for="wpforms-5272-field_10">Sexe <span class="wpforms-required-label">*</span></label>
		<select name="child_gender" id="child_gender" class="wpforms-field-medium wpforms-field-required" required="" aria-required="true">
			<option value="Fille"  {{ old("child_genderchild_gender") == "Fille" ? "selected" : "" }}>Fille</option>
			<option value="Garçon" {{ old("child_gender") == "Garçon" ? "selected" : "" }}>Garçon</option>
		</select>
	</div>
	<div id="wpforms-5272-field_12-container" class="wpforms-field wpforms-field-text" data-field-id="12">
		<label class="wpforms-field-label" for="wpforms-5272-field_12">Nom et téléphone du médecin traitant  <span class="wpforms-required-label">*</span></label>
		<input type="text" id="doctor_phone" class="wpforms-field-medium wpforms-field-required" name="doctor_phone" required="" aria-required="true" value="{{ old('doctor_phone') }}">
	</div>
	<div id="wpforms-5272-field_5-container" class="wpforms-field wpforms-field-checkbox" data-field-id="5">
		<label class="wpforms-field-label" for="wpforms-5272-field_5">Votre enfant est-il atteint de (cocher si nécessaire)</label>
		<ul id="wpforms-5272-field_5" class="">
			<?php 
				$diseases = [0 => "diabète", 
							 1 => "affection cardiaque",
							 2 => "rhumatisme",
							 3 => "affection cutanée",
							 4 => "asthme",
							 5 => "épilepsie",
							 6 => "handicap moteur"];
				$i = 0;
			?>

			@foreach($diseases as $disease)
				<li class="choice-{{ $i }}">
					<input type="checkbox" id="disease_{{ $i }}" name="child_disease[]" value="{{ $disease }}">
					<label class="wpforms-field-label-inline" for="disease_{{ $i }}">{{ $disease }}</label>
				</li>
				<?php $i++; ?>
			@endforeach
		</ul>
	</div>
	<div id="wpforms-5272-field_15-container" class="wpforms-field wpforms-field-text" data-field-id="15">
		<label class="wpforms-field-label" for="wpforms-5272-field_15">Groupe sanguin (+Rhésus)</label>
		<select name="child_bloodgroup" id="child_bloodgroup" class="wpforms-field-medium wpforms-field-required">
			<?php $bloodgroups = [0 => "Inconnu", 1 => "O+", 2 => "A+", 3 => "B+", 4 => "O-", 5 =>"A-", 6 => "AB+", 7 => "B-", 8 => "AB-"] ?>
			@foreach($bloodgroups as $bloodgroup)
				<option {{ old("child_bloodgroup") == $bloodgroup ? "selected" : "" }} value="{{ $bloodgroup }}">{{ $bloodgroup }}</option>
			@endforeach
		</select>
	</div>
	<div id="wpforms-5272-field_16-container" class="wpforms-field wpforms-field-textarea" data-field-id="16">
		<label class="wpforms-field-label" for="wpforms-5272-field_16">Doit-il prendre des médicaments ? Si oui, pourquoi, lesquels et, en quelle quantité ? (prescription du médecin obligatoire)</label><textarea id="child_medicine" class="wpforms-field-medium" name="child_medicine">{{ old('child_medicine') }}</textarea>
	</div>
	<div id="wpforms-5272-field_29-container" class="wpforms-field wpforms-field-text" data-field-id="29">
		<label class="wpforms-field-label" for="wpforms-5272-field_29">Votre enfant est-il allergique ? si oui, à quoi ? </label>
		<input type="text" id="child_allergy" class="wpforms-field-medium" name="child_allergy" value="{{ old('child_allergy') }}">
	</div>
	<div id="wpforms-5272-field_17-container" class="wpforms-field wpforms-field-textarea" data-field-id="17">
		<label class="wpforms-field-label" for="note">Autres remarques à communiquer aux animateurs ?</label><textarea id="note" class="wpforms-field-medium" name="note">{{ old('note') }}</textarea>
		<div class="wpforms-field-description">Par exemple : Niveau de natation, comportement, ... </div>
	</div>
	<div id="wpforms-5272-field_21-container" class="wpforms-field wpforms-field-select" data-field-id="21">
		<label class="wpforms-field-label" for="community_center_id">Lieux d’activités ( choisir la maison de quartier de votre choix) <span class="wpforms-required-label">*</span></label>
		<select name="community_center_id" id="community_center_id" class="wpforms-field-medium wpforms-field-required" required="" aria-required="true">
			@foreach($centers as $center)
				<option value="{{ $center->id }}" {{ old("community_center_id") == $center->id ? "selected" : "" }} >{{ $center->title }}</option>
			@endforeach
		</select>
	</div>	
	<div id="wpforms-5272-field_20-container" class="wpforms-field wpforms-field-checkbox" data-field-id="20">
		<label class="wpforms-field-label" for="wpforms-5272-field_20">Semaine(s) d'activités de votre choix</label>
		<ul id="wpforms-5272-field_20" class="session_dates_list" data-url="{{ route('session.dates.get', ['session_id' => $data->id]) }}"></ul>
	</div>

	<div id="wpforms-5272-field_27-container" class="wpforms-field wpforms-field-checkbox" data-field-id="27">
		<label class="wpforms-field-label" for="wpforms-5272-field_27">Option Garderie</label>
		<ul id="wpforms-5272-field_27" class="">
			<li class="choice-1">
				<input type="checkbox" id="checked_nursery" name="checked_nursery" value="1">
		<label class="wpforms-field-label-inline" for="wpforms-5272-field_27_1">le matin de 09h00 à 10h00 et/ou le soir de 16h00 à 17h00 - 5€ supplémentaire par semaine . </label></li></ul>
	</div>
	</div>
	<div class="wpforms-field wpforms-field-hp" id="wpform-field-hp">
		<label for="wpforms-field_hp" class="wpforms-field-label">Website</label>
		<input type="text" name="wpforms[hp]" id="wpforms-field_hp" class="wpforms-field-medium">
	</div>
	<div class="wpforms-submit-container">
		<input type="hidden" id="session_id" name="session_id" value="{{ $data->id }}">
		<button type="submit" name="wpforms[submit]" class="wpforms-submit " id="wpforms-submit-5272" value="wpforms-submit" data-alt-text="Sending...">Envoyer</button>
	</div>
</form>
</div>

			@endif
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

								
						</div> <!-- end content -->
		</div>
@endsection