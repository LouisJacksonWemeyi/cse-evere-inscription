$(function() {

	// ===================Sessions=================================

	$('#unactive_sessions').on("change", function() {
		if (!$(this).is(':checked')) {
			$.ajax({
			  type: "POST",
			  url: $(this).data("url"),
			  success: function(response){
			  },
			  dataType: "json"
			});		
		}

		$('.active_session').prop('checked', false);
		
	});

	$('.active_session').on("click", function(){

		$('#unactive_sessions').prop('checked', true);

		var value = $(this).is(':checked') ? 1 : 0;

		$.ajax({
		  type: "POST",
		  headers: {
		  	'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	value : value
		  },
		  url: $(this).data("url"),
		  success: function(response){
		  },
		  dataType: "json"
		});
	});

	$(".session_title").on("blur", function(){
		$.ajax({
		  type: "POST",
		  headers: {
	    	'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	field : "title",
		  	value : $(this).text()
		  },
		  url: $(this).data("url"),
		  success: function(response){
		  },
		  dataType: "json"
		});
	});

	$(".session_destroy").on("click", function(){
		$this = $(this);
		swal({
		  title: "Êtes-vous sûr(e) ?",
		  text: "Une fois suprimé, il sera impossible de revenir en arrière.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			$.ajax({
			  type: "POST",
			  headers: {
		    	'X-CSRF-Token':$(this).data("token"),
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  	if (response.response == "success") {
				    swal("L'élément a bien été supprimé.", {
				      icon: "success",
				    });
			  		$this.closest('tr').remove();
			  	}
			  },
			  dataType: "json"
			});
		  }
		});
	});

	// !==================Sessions=================================

	// ===================SessionDates=============================

	$(".session_date_title").on("blur", function(){
		$.ajax({
		  type: "POST",
		  headers: {
	    	'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	field : "title",
		  	value : $(this).text()
		  },
		  url: $(this).data("url"),
		  success: function(response){
		  	console.log(response);
		  },
		  dataType: "json"
		});
	});

	$(".session_date_abbreviation").on("blur", function(){
		$.ajax({
		  type: "POST",
		  headers: {
	    	'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	field : "abbreviation",
		  	value : $(this).text()
		  },
		  url: $(this).data("url"),
		  success: function(response){
		  	console.log(response);
		  },
		  dataType: "json"
		});
	});

	$(".session_date_price").on("blur", function(){
		$this = $(this);
			$.ajax({
			  type: "POST",
			  headers: {
	    		'X-CSRF-Token':$(this).data("token"),
			  },
			  data:{
			  	field : "price",
			  	value : $(this).text()
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  },
			  error: function(){
				swal("Veuillez entrer une valeur numérique", {
				  icon: "error",
				});
			  },
			  dataType: "json"
			});
	});

	$(".session_date_full_price").on("blur", function(){
		$this = $(this);
			$.ajax({
			  type: "POST",
			  headers: {
	    		'X-CSRF-Token':$(this).data("token"),
			  },
			  data:{
			  	field : "full_price",
			  	value : $(this).text()
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  },
			  error: function(){
				swal("Veuillez entrer une valeur numérique", {
				  icon: "error",
				});
			  },
			  dataType: "json"
			});
	});

	$(".session_date_destroy").on("click", function(){
		$this = $(this);
		swal({
		  title: "Êtes-vous sûr(e) ?",
		  text: "Une fois suprimé, il sera impossible de revenir en arrière.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			$.ajax({
			  type: "POST",
			  headers: {
		    	'X-CSRF-Token':$(this).data("token"),
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  	if (response.response == "success") {
				    swal("L'élément a bien été supprimé.", {
				      icon: "success",
				    });
			  		$this.closest('tr').remove();
			  	}
			  },
			  dataType: "json"
			});
		  }
		});
	});

	// !==================SessionDates=============================

	// ===================CommunityCenters=============================

	$('.active_center').on("click", function(){

		var value = $(this).is(':checked') ? 1 : 0;

		$.ajax({
		  type: "POST",
		  headers: {
		  	'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	value : value
		  },
		  url: $(this).data("url"),
		  success: function(response){
		  },
		  dataType: "json"
		});
	});

	$(".center_title").on("blur", function(){
		$.ajax({
		  type: "POST",
		  headers: {
	    	'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	field : "title",
		  	value : $(this).text()
		  },
		  url: $(this).data("url"),
		  success: function(response){
		  },
		  dataType: "json"
		});
	});

	$(".center_places").on("blur", function(){
		$this = $(this);
		if (Number.isInteger(parseInt($(this).text()))) {
			$this.text(parseInt($(this).text()));
			$.ajax({
			  type: "POST",
			  headers: {
	    		'X-CSRF-Token':$(this).data("token"),
			  },
			  data:{
			  	field : "places",
			  	value : $(this).text()
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  },
			  dataType: "json"
			});
		}else{
		swal("Veuillez entrer un nombre entier", {
		  icon: "error",
		});
		}
	});

	$(".center_destroy").on("click", function(){
		$this = $(this);
		swal({
		  title: "Êtes-vous sûr(e) ?",
		  text: "Une fois suprimé, il sera impossible de revenir en arrière.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			$.ajax({
			  type: "POST",
			  headers: {
		    	'X-CSRF-Token':$(this).data("token"),
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  	if (response.response == "success") {
				    swal("L'élément a bien été supprimé.", {
				      icon: "success",
				    });
			  		$this.closest('tr').remove();
			  	}
			  },
			  dataType: "json"
			});
		  }
		});
	});

	// !==================CommunityCenters=============================

	// ===================Registrations=============================

	$(".registration_destroy").on("click", function(){
		$this = $(this);
		swal({
		  title: "Êtes-vous sûr(e) ?",
		  text: "Une fois suprimé, il sera impossible de revenir en arrière.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			$.ajax({
			  type: "POST",
			  headers: {
		    	'X-CSRF-Token':$(this).data("token"),
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  	if (response.response == "success") {
				    swal("L'élément a bien été supprimé.", {
				      icon: "success",
				    });
			  		$this.closest('tr').remove();
			  	}
			  },
			  dataType: "json"
			});
		  }
		});
	});

	// !==================Registrations=============================
	
	// ===================Registrations=============================

	$(".scholar_destroy").on("click", function(){
		$this = $(this);
		swal({
		  title: "Êtes-vous sûr(e) ?",
		  text: "Une fois suprimé, il sera impossible de revenir en arrière.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			$.ajax({
			  type: "POST",
			  headers: {
		    	'X-CSRF-Token':$(this).data("token"),
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  	if (response.response == "success") {
				    swal("L'élément a bien été supprimé.", {
				      icon: "success",
				    });
			  		$this.closest('tr').remove();
			  	}
			  },
			  dataType: "json"
			});
		  }
		});
	});

	// !==================Registrations=============================
	
	// ===================ConfigTexts=============================

	$(".text_update").on("click", function(){
		var id = $(this).data('id');
		$this = $(this);

		$.ajax({
		  type: "POST",
		  headers: {
			'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	field : "text",
		  	value : $("#text_"+id).val()
		  },
		  url: $(this).data("url"),
		  success: function(response){
			swal("Le texte a bien été modifié", {
			  icon: "success",
			});
		  },
		  dataType: "json"
		});
	});

	// !==================ConfigTexts=============================


	// ===================ConfigMails=============================

	$('.active_mail').on("click", function(){

		var value = $(this).is(':checked') ? 1 : 0;

		$.ajax({
		  type: "POST",
		  headers: {
		  	'X-CSRF-Token':$(this).data("token"),
		  },
		  data:{
		  	value : value
		  },
		  url: $(this).data("url"),
		  success: function(response){
		  },
		  dataType: "json"
		});
	});

	$(".configmail_mail").on("blur", function(){

		if(validateEmail($(this).text())){

			$.ajax({
			  type: "POST",
			  headers: {
	    		'X-CSRF-Token':$(this).data("token"),
			  },
			  data:{
			  	field : "mail",
			  	value : $(this).text()
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  },
			  dataType: "json"
			});
		}else{
			swal("Veuillez entrer une adresse email valide", {
			  icon: "error",
			});
		}
	});

	$(".mail_destroy").on("click", function(){
		$this = $(this);
		swal({
		  title: "Êtes-vous sûr(e) ?",
		  text: "Une fois suprimé, il sera impossible de revenir en arrière.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			$.ajax({
			  type: "POST",
			  headers: {
		    	'X-CSRF-Token':$(this).data("token"),
			  },
			  url: $(this).data("url"),
			  success: function(response){
			  	if (response.response == "success") {
				    swal("L'élément a bien été supprimé.", {
				      icon: "success",
				    });
			  		$this.closest('tr').remove();
			  	}
			  },
			  dataType: "json"
			});
		  }
		});
	});

	// !==================ConfigMails=============================
	

	// ==================AssestsFunctions=============================

	function validateEmail(email) {
	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(String(email).toLowerCase());
	}

	// !=================AssestsFunctions=============================



});