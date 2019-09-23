$(function(){

	$("#logo").hide();
	$("#logo").delay(300).fadeIn(1000);

	var floridaSpots = ["Miami","West Palm Beach","Cocoa Beach","New Smyrna Beach","Jacksonville Beach","Daytona Beach","Ponce Inlet","Clearwater","Naples","Panama City Beach","Pensacola","Sarasota","Siesta Key","St. Petersburg"];
	var floridaLat = ["25.7907","26.7153","28.3200","29.073397","30.2841","29.2108","29.0964","27.983320","26.132626","30.192743","30.319834","27.310777","27.265516","27.759367"];
	var floridaLong = ["-80.1300","-80.0534","-80.6076","-80.910255","-81.3961","-81.0228","-80.9370","-82.832839","-81.809979","-85.870879","-87.138679","-82.581446","-82.556802","-82.773887"];
	var floridaImages = ["miami.jpg","wpb.jpg","cocoa.jpg","newsmyrna.jpg","jacksonville.jpg","daytona.jpg","ponce.jpg","clearwater.jpg","naples.jpg","panama.jpg","pensacola.jpg","sarasota.jpg","siesta.jpg","stpete.jpg"];

	//https://api.worldweatheronline.com/premium/v1/marine.ashx?key=3a5790d254e64591aab194612191004&q=29.073397,%20-80.910255&format=json

	var key = '2bde54397a69678190a1792fb55def9b'; //My API key for the OpenWeather API

	function slowLoop( count, interval, callback ) {
	    var i = 0;
	    next();
	    function next() {
	        if( callback( i ) !== false ) {
	            if( ++i < count ) {
	                setTimeout( next, interval );
	            }
	        }
	    }
	}

	//Numbe generator, makes 3 seperate numbers that are different
	var numberOne = 1; 
	var numberTwo = 1; 
	var numberThree = 1; 

	// run this loop until numberOne is different than numberThree
	do {
	    numberOne = Math.floor(Math.random() * 14);
	} while(numberOne === numberThree);

	// run this loop until numberTwo is different than numberThree and numberOne
	do {
	    numberTwo = Math.floor(Math.random() * 14);
	} while(numberTwo === numberThree || numberTwo === numberOne);


	console.log(numberOne);
	console.log(numberTwo);
	console.log(numberThree);



	slowLoop( 3, 200, function( i ) {
    	
    	if(i == 0)
    		var whatRand = numberOne;
    	else if(i == 1)
    		var whatRand = numberTwo;
    	else if(i == 2)
    		var whatRand = numberThree;

		//var beachCoords = floridaCoords[i];
		var beachName = floridaSpots[whatRand];
		var imgName = floridaImages[whatRand];

		lat = floridaLat[whatRand];
		long = floridaLong[whatRand];

		//console.log(lat);
		//console.log(long);

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

					$('#maincards').append('<div class="col-md" id="card'+i+'"><img class="pt-3 pb-3 pl-3 pr-3 rounded-circle img-fluid text-center mx-auto" src="img/'+imgName+'" alt="beach"><div class="text-center"><h2 class="cursive">'+beachName+'</h2><p class="card-text">Currently: '+curConditions+', '+curTemp+'</p><h6 class="mt-4">Humidity: '+curHumid+'</h6><h6 class="">Wind: '+curWind+'</h6><p class="card-text">Low: '+curLow+', High: '+curHigh+'</p></div></div>');
					
					var delayInt = i*100;
					$("#card"+i).hide();
					$("#card"+i).fadeIn(1000);
				});
			}
		}); //END OF AJAX
		

	});//END OF SLOW LOOP
	
});