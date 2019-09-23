$("document").ready(function() {

	var jobID = $('#card1 > div').attr('id');

	//alert(jobID);

	//var jobID = 'default';
if (jobID) {
	
	//alert(jobID); //DEBUG

	$.post("jobdetail.php", {jobCode: jobID}, function(data, status){
			$("#jobInfo").html(data);
	});

}
else{
	alert("No Results. Try another search.");
}

	$(":button").click(function() {
      	event.preventDefault();
    });
//================================================================================================JOB CLICK=================================================================================================				

	$(document).on('click', 'div.jobcard',  function(){

		var jobCode = $(this).attr("id");
		
		$(".jobcard").css( "background-color", "white" ); //Reset all cards to white bg
		
		$("#"+jobCode).css( "background-color", "#f1f1f1" ); //Highlight selected card

		//console.log(jobCode);

	    $.post("jobdetail.php", { jobCode: jobCode }, function(data,status){
	    	$("#jobInfo").html(data);
		});
		$('#jobInfo').animate({
			scrollTop: 0
		 }, 'slow');

	});

	$(document).on('click', '#searchbtn',  function(){
		
		var jobQuery = $('input[name="job"]').val();
	    var locationQuery = $('input[name="location"]').val();

		if (jobQuery != '' || locationQuery != '') {

			$("#defaultfeed").hide();

		    $.post("getjobs.php", { internal: 'yes', jobQuery: jobQuery, locationQuery: locationQuery }, function(data,status){
		    	$("#jobfeed").html(data);
			});

		}

	});

});