<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
	<img width="25%" src="http://csevere.be/wp-content/uploads/2018/04/logo_ASBL_La_Coh%C3%A9sion_Sociale_Evere.png" />
	<br/>
	<br/>	
	<?php 
		$total_session_date = 0;
		foreach($registration->session_dates as $session_date){

			if($registration->postal_code == 1140){
				$total_session_date += $session_date->price; 
			}else{
				$total_session_date += $session_date->full_price;
			} 

			if ($registration->checked_nursery) {
				$total_session_date += 5;
			}
		}
		$session_dates_array = [];
		foreach($registration->session_dates as $session_date){
			$session_dates_array[] = $session_date->title;
		}
		$session_dates_text = implode(", ", $session_dates_array);

		$vars1 = ["[NOM ENFANT]", 
				  "[PRENOM ENFANT]", 
				  "[MAISON DE QUARTIER]", 
				  "[MONTANT TOTAL]", 
				  "[PERIODES]",
				  ' '
				];

		$vars2 = [$registration->child_lastname, 
				  $registration->child_firstname,
				  $registration->community_center->center->title,
				  $total_session_date,
				  $session_dates_text,
				  '&nbsp;'
				]
				  ;


		$text_1 = str_replace($vars1, $vars2, $mail_custom_text_1);
		$text_1 = nl2br($text_1);

		$text_2 = str_replace($vars1, $vars2, $mail_custom_text_2);		
		$text_2 = nl2br($text_2);
		
	?>
	{!! $text_1 !!}
	<br/>
	<br/>
	Voici les informations que vous avez encodées dans le formulaire :
	<br/>
	<table>
	  <tbody>
	      <tr>
	      	<td>Nom du parent</td>
	      	<td>{{ $registration->parent_lastname }}</td>
	      </tr>
	      <tr>
	      	<td>Prénom du parent</td>
	      	<td>{{ $registration->parent_firstname }}</td>
	      </tr>	     
	      <tr>
	      	<td>Nom de l'enfant</td>
	      	<td>{{ $registration->child_lastname }}</td>
	      </tr>
	      <tr>
	      	<td>Prénom de l'enfant</td>
	      	<td>{{ $registration->child_firstname }}</td>
	      </tr>
	      <tr>
	      	<td>Date de naissance</td>
	      	<td>{{ $registration->child_birthday->format('d/m/Y') }}</td>
	      </tr>
	      <tr>
	      	<td>Adresse</td>
	      	<td>{{ $registration->street }}</td>
	      </tr>
	      <tr>
	      	<td>N°</td>
	      	<td>{{ $registration->street_number }}</td>
	      </tr>		      
	      <tr>
	      	<td>Boite</td>
	      	<td>{{ $registration->postal_box }}</td>
	      </tr>	      
	      <tr>
	      	<td>CP</td>
	      	<td>{{ $registration->postal_code }}</td>
	      </tr>
	      <tr>
	      	<td>GSM Parent</td>
	      	<td>{{ $registration->parent_phone }}</td>
	      </tr>
	      <tr>
	      	<td>Remarques</td>
	      	<td>{{ $registration->note }}</td>
	      </tr>	      
	      <tr>
	      	<td>Maison de quartier</td>
	      	<td>{{ $registration->community_center->center->title }}</td>
	      </tr>
	      <tr>
	        <td>Dates</td>
	      	<td>{{ $session_dates_text }}</td>
	      </tr>
	      <tr>
	      	<td>Montant</td>
	      	<td>{{ $total_session_date }} €</td>
	      </tr>
	      <tr>
	      	<td></td>
	      	<td></td>
	      </tr>

	  </tbody>
	</table>
	<br/>
	<br/>
	{!! $text_2 !!}
</body>
</html>

