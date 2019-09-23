$(function(){

$("#spinner").hide();
$("#jumbodata").hide();

//Loading Spinner Code================
	$(document).ajaxStart(function(){	//whenever an ajax method starts on anything in the document
		$("#spinner").show();	//shows loading spinner
	});

	$(document).ajaxComplete(function(){	//whenever an ajax method completes on anything in the document
		$("#spinner").hide();
	});

//================================================================================================PARK CLICK=================================================================================================
var key = '2bde54397a69678190a1792fb55def9b'; //My API key for the OpenWeather API		

$(document).on('click', 'a.beachtitle', function(){

	$("#surfmap").hide();

	$('#jumbodata').contents().remove();

	$('#jumbodata').fadeIn(1000);

	var beachNum = $(this).attr("id");
	var beachNum = beachNum.substring(1);
	//console.log(beachNum);

	var floridaSpots = ["Miami","West Palm Beach","Cocoa Beach","New Smyrna Beach","Jacksonville Beach","Daytona Beach","Ponce Inlet","Clearwater","Naples","Panama City Beach","Pensacola","Sarasota","Siesta Key","St. Petersburg"];
	var floridaLat = ["25.7907","26.7153","28.3200","29.073397","30.2841","29.2108","29.0964","27.983320","26.132626","30.192743","30.319834","27.310777","27.265516","27.759367"];
	var floridaLong = ["-80.1300","-80.0534","-80.6076","-80.910255","-81.3961","-81.0228","-80.9370","-82.832839","-81.809979","-85.870879","-87.138679","-82.581446","-82.556802","-82.773887"];
	var floridaImages = ["miami.jpg","wpb.jpg","cocoa.jpg","newsmyrna.jpg","jacksonville.jpg","daytona.jpg","ponce.jpg","clearwater.jpg","naples.jpg","panama.jpg","pensacola.jpg","sarasota.jpg","siesta.jpg","stpete.jpg"];

	//var floridaWestSpots = ["Clearwater","Naples","Panama City Beach","Pensacola","Sarasota","Siesta Key","St. Petersburg"];
	//var floridaWestLat = ["27.983320","26.132626","30.192743","30.319834","27.310777","27.265516","27.759367"];
	//var floridaWestLong = ["-82.832839","-81.809979","-85.870879","-87.138679","-82.581446","-82.556802","-82.773887"];
	//var floridaWestImages = [".jpg","wpb.jpg",".jpg",".jpg",".jpg",".jpg",".jpg"];

	var beachName = floridaSpots[beachNum];
	//var imgName = floridaEastImages[beachNum];

	lat = floridaLat[beachNum];
	long = floridaLong[beachNum];

	$.ajax({
			url: 'https://api.openweathermap.org/data/2.5/weather?lat='+ lat +'&lon='+ long, //Gets the data for the given geo coords
			dataType: 'json',
			type: 'get',
			cache: false,
			data: {appid: key, units: 'imperial'}, //Passes in API key, tells it to use Imperial measurements
			success: function(data){
									
				var curTemp = '';

				$(data.weather).each(function(index, value){

					curConditions = data.weather[0].description;
					var curTemp = data.main.temp + ' &#8457';
					var curHumid = data.main.humidity + ' %';
					var curHigh = data.main.temp_max + ' &#8457';
					var curLow = data.main.temp_min + ' &#8457';
					var curWind = data.wind.speed + ' MPH';



					$('#jumbodata').append('<h1 class="display-4 cursive">'+beachName+'</h1><p class="lead">Currently: '+curConditions+'</p><hr class="my-4"><div class="row"><div class="col"><h5>Temperature: '+curTemp+'</h5></div><div class="col"><h5>Humidity: '+curHumid+'</h5></div><div class="col"><h5>Wind Speed: '+curWind+'</h5></div><div class="col"><h5>Low: '+curLow+', High: '+curHigh+'</h5></div></div>');
				});
			}
	}); //END OF AJAX

}); //END OF CLICK FUNCTION

}); 