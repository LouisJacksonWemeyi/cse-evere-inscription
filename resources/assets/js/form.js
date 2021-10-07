$(function() {

  $("#postal_code").on("keyup", function (e) {
    $(this).val(this.value.substr(0,4));
  });  

  $(".session_dates_list").each(function(e) {
  	getSessionDates(this);
  })

  $("#community_center_id").on("change", function(e) {
  	getSessionDates($(".session_dates_list"));
  })

});

function getSessionDates(el) {
  	$.ajax({
	  type: "POST",
	  url: $(el).data("url"),
	  data: {
	  	community_center_id : $("#community_center_id").val()
	  },
	  success: function(response){

	  	$(el).html("");
	  	response.datas.forEach(function(element) {

	  		var toAdd = '<input type="checkbox" id="session_date_ids_'+element.id+'" name="session_date_ids[]" value="'+element.id+'">'+
						'<label class="wpforms-field-label-inline" for="session_date_ids_'+element.id+'">'+element.title+' ('+element.remaining_places+' places restantes)</label>';


	  	  $(el).append("<li class='choice-4'>"+toAdd+"</li>")
	  	});
	  },
	  dataType: "json"
	});	
}