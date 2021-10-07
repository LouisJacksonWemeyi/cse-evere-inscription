@extends('layouts.app')

@section('title', "Inscriptions activités durant les congés scolaires.  |  Asbl Cohésion Sociale d'Evere - Actions Communautaires")

@section('content')
<div id="title">
	<div class="inner">
		<div class="container">
			<div class="span7">
				<h1>INSCRIPTIONS AIDE SCOLAIRE SECONDAIRE</h1>
			</div>
			<div class="span5">
				<div id="breadcrumbs">
					<div id="crumbs"><a href="http://csevere.be">Home</a>  /  <span class="	current">Inscriptions Aide scolaire secondaire</span> / </div>							
				</div>
			</div>
		</div>
	</div>
</div>
<div id="page-wrap">
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
	<div id="content" class="post-5274 page type-page status-publish hentry">
		<div class="vc_row wpb_row vc_row-fluid">
			<div class="container">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div class="wpb_single_image wpb_content_element vc_align_center">
								<figure class="wpb_wrapper vc_figure">
									<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="1024" height="458" src="http://csevere.be/wp-content/uploads/2017/05/soutien_scolaire-1024x458.jpg" class="vc_single_image-img attachment-large" alt="" srcset="http://csevere.be/wp-content/uploads/2017/05/soutien_scolaire-1024x458.jpg 1024w, http://csevere.be/wp-content/uploads/2017/05/soutien_scolaire-300x134.jpg 300w, http://csevere.be/wp-content/uploads/2017/05/soutien_scolaire-768x343.jpg 768w" sizes="(max-width: 1024px) 100vw, 1024px">
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="vc_row wpb_row vc_row-fluid">
			<div class="container">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div class="wpb_text_column wpb_content_element ">
								<div class="wpb_wrapper">
									<p>Le soutien scolaire débute le lundi 02 octobre 2017.</p>
									<p>les pré-inscriptions des nouveaux élèves pour l'année scolaire 2017/2018 se font via notre formulaire en ligne ci-dessous.&nbsp; <u>Personne n’est réinscrit de façon systématique</u>.</p>
									<p>Attention, suite à votre pré-inscription en ligne, vous serez contacté par téléphone pour fixer un rendez-vous individuel. Les parents et l'enfant devront être présents à l'entretien avec la carte d'identité et le dernier bulletin de l'élève. Cet entretien a pour objectif de cibler le plus objectivement possible les difficultés de votre enfant.</p>
									<p>Il s'agit bien d'une pré-inscription, l'inscription définitive se fera après l'entretien avec les parents et l'élève et suite à l'évaluation de ses difficultés. La priorité est laissée aux everois en difficulté scolaire.</p>
									<div class="wpforms-container wpforms-container-full" id="wpforms-5500">
										<form method="post" enctype="multipart/form-data" id="wpforms-form-5500" action="" class="wpforms-validate wpforms-form">
											 {{ csrf_field() }}
											<div class="wpforms-field-container">
												<div id="wpforms-5500-field_1-container" class="wpforms-field wpforms-field-name" data-field-id="1">
													<label class="wpforms-field-label" for="wpforms-5500-field_1">Nom du parent <span class="wpforms-required-label">*</span></label>
													<div class="wpforms-field-row wpforms-field-medium">
														<div class="wpforms-field-row-block wpforms-first wpforms-one-half">
															<input type="text" id="parent_firstname" class="wpforms-field-name-first wpforms-field-required" name="parent_firstname" required="" aria-required="true">
															<label for="wpforms-5500-field_1" class="wpforms-field-sublabel after ">First</label>
														</div>
														<div class="wpforms-field-row-block wpforms-one-half">
															<input type="text" id="parent_lastname" class="wpforms-field-name-last wpforms-field-required" name="parent_lastname" required="" aria-required="true">
															<label for="wpforms-5500-field_1-last" class="wpforms-field-sublabel after ">Last</label>
														</div>
													</div>
												</div>
												<div id="wpforms-5500-field_2-container" class="wpforms-field wpforms-field-email" data-field-id="2">
													<label class="wpforms-field-label" for="wpforms-5500-field_2">Adresse email du parent <span class="wpforms-required-label">*</span></label>
													<input type="email" id="parent_mail" class="wpforms-field-medium wpforms-field-required" name="parent_mail" required="" aria-required="true">
												</div>
												<div id="wpforms-5500-field_4-container" class="wpforms-field wpforms-field-text" data-field-id="4">
													<label class="wpforms-field-label" for="parent_phone">Numéro de GSM du parent</label>
													<input type="text" id="parent_phone" class="wpforms-field-medium" name="parent_phone">
												</div>
												<div id="wpforms-5500-field_3-container" class="wpforms-field wpforms-field-name" data-field-id="3">
													<label class="wpforms-field-label" for="wpforms-5500-field_3">Nom de l'enfant <span class="wpforms-required-label">*</span></label>
													<div class="wpforms-field-row wpforms-field-medium">
														<div class="wpforms-field-row-block wpforms-first wpforms-one-half">
															<input type="text" id="child_firstname" class="wpforms-field-name-first wpforms-field-required" name="child_firstname" required="" aria-required="true">
															<label for="child_firstname" class="wpforms-field-sublabel after ">First</label>
														</div>
														<div class="wpforms-field-row-block wpforms-one-half">
															<input type="text" id="child_lastname" class="wpforms-field-name-last wpforms-field-required" name="child_lastname" required="" aria-required="true">
															<label for="child_lastname" class="wpforms-field-sublabel after ">Last</label>
														</div>
													</div>
												</div>
												<div id="wpforms-5500-field_5-container" class="wpforms-field wpforms-field-text" data-field-id="5">
													<label class="wpforms-field-label" for="adress">Adresses</label>
													<input type="text" id="adress" class="wpforms-field-medium" name="adress">
												</div>
												<div id="wpforms-5500-field_6-container" class="wpforms-field wpforms-field-number" data-field-id="6">
													<label class="wpforms-field-label" for="postal_code">Code postal</label>
													<input type="number" id="postal_code" class="wpforms-field-medium" name="postal_code">
												</div>
												<div id="wpforms-5500-field_7-container" class="wpforms-field wpforms-field-checkbox" data-field-id="7">
													<label class="wpforms-field-label" for="child_gender">Genre</label>
													<select name="child_gender" id="child_gender" class="wpforms-field-medium wpforms-field-required" required="" aria-required="true">
														<option value="Fille">Fille</option>
														<option value="Garçon">Garçon</option>
													</select>
												</div>
												<div id="wpforms-5500-field_8-container" class="wpforms-field wpforms-field-text" data-field-id="8">
													<label class="wpforms-field-label" for="wpforms-5500-field_8">Nom de l'école</label>
													<input type="text" id="school_name" class="wpforms-field-medium" name="school_name">
												</div>
												<div id="wpforms-5500-field_12-container" class="wpforms-field wpforms-field-number" data-field-id="12">
													<label class="wpforms-field-label" for="school_postal_code">Code postal de l'école</label>
													<input type="number" id="school_postal_code" class="wpforms-field-medium" name="school_postal_code">
												</div>
												<div id="wpforms-5500-field_10-container" class="wpforms-field wpforms-field-select" data-field-id="10">
													<label class="wpforms-field-label" for="education_type">Type d'enseignement</label><select name="education_type" id="education_type" class="wpforms-field-medium">
														<option value="1ère dif.">1ère dif.</option>
														<option value="général">général</option>
														<option value="Technique de qualification">Technique de qualification</option>
														<option value="Technique de transition">Technique de transition</option>
														<option value="Professionnel">Professionnel</option>
													</select>
												</div>
												<div id="wpforms-5500-field_11-container" class="wpforms-field wpforms-field-select" data-field-id="11">
													<label class="wpforms-field-label" for="scholar_year">Année scolaire </label>
													<select name="scholar_year" id="scholar_year" class="wpforms-field-medium">
														<option value="1ère année secondaire">1ère année secondaire</option>
														<option value="2ème année secondaire">2ème année secondaire</option>
														<option value="3ème année secondaire">3ème année secondaire</option>
														<option value="4ème année secondaire">4ème année secondaire</option>
														<option value="5ème année secondaire">5ème année secondaire</option>
														<option value="6ème année secondaire">6ème année secondaire</option>
														<option value="7ème année sedcondaire">7ème année sedcondaire</option>
													</select>
												</div>
												<div id="wpforms-5500-field_13-container" class="wpforms-field wpforms-field-checkbox" data-field-id="13">
													<label class="wpforms-field-label" for="supports">Votre enfant a besoin d'un soutien scolaire en </label><ul id="supports" class="">
														<li class="choice-1">
															<input type="checkbox" id="wpforms-5500-field_13_1" name="supports[]" value="Mathématiques">
															<label class="wpforms-field-label-inline" for="wpforms-5500-field_13_1">Mathématiques</label>
														</li>
														<li class="choice-2">
															<input type="checkbox" id="wpforms-5500-field_13_2" name="supports[]" value="Sciences">
															<label class="wpforms-field-label-inline" for="wpforms-5500-field_13_2">Sciences</label>
														</li>
														<li class="choice-3">
															<input type="checkbox" id="wpforms-5500-field_13_3" name="supports[]" value="Français">
															<label class="wpforms-field-label-inline" for="wpforms-5500-field_13_3">Français</label>
														</li>
														<li class="choice-4">
															<input type="checkbox" id="wpforms-5500-field_13_4" name="supports[]" value="Néerlandais">
															<label class="wpforms-field-label-inline" for="wpforms-5500-field_13_4">Néerlandais</label>
														</li>
														<li class="choice-5">
															<input type="checkbox" id="wpforms-5500-field_13_5" name="supports[]" value="Autres (précisez dans remarque)">
															<label class="wpforms-field-label-inline" for="wpforms-5500-field_13_5">Autres (précisez dans remarque)</label>
														</li></ul>
													</div>
													<div id="wpforms-5500-field_14-container" class="wpforms-field wpforms-field-textarea" data-field-id="14">
														<label class="wpforms-field-label" for="notes">Remarques</label>
														<textarea id="notes" class="wpforms-field-medium" name="notes"></textarea>
													</div>
												</div>
												<div class="wpforms-submit-container">
													<button type="submit" name="wpforms[submit]" class="wpforms-submit " id="wpforms-submit-5500" value="wpforms-submit" data-alt-text="Sending...">Envoyer</button>
												</div>
											</form>
										</div>
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