$("document").ready(function() {

	//Hide these by default
	$('#postjob2').hide();
	$('#postjob3').hide();
	$('#postjob4').hide();
	$('#postjob5').hide();
  $('#postjob6').hide();

	//Stop the form from getting submitted
	$(":button").click(function() {
      	event.preventDefault();
    });

  var adSkillNum = 4; //There are 3 default skills, so this starts any additional ones at 4

  //Creates a new skill div on click of the add skills button
  $("#addskillbtn").click(function() {
    $('#skills').append('<div class="form-row"><div class="col"><input type="text" name="skill'+adSkillNum+'" class="form-control jobsearchform" placeholder="Skill or Qualification"></div></div>');
    adSkillNum++; //Incerment skills
  });

//Advance to the next page
    $("#next1").click(function() {
    	$('#postjob1').hide();
      	$('#postjob2').fadeIn(500);
    });

    $("#next2").click(function() {
    	$('#postjob2').hide();
      	$('#postjob3').fadeIn(500);
    });

    $("#next3").click(function() {
    	$('#postjob3').hide();
      	$('#postjob4').fadeIn(500);
    });

    $("#next4").click(function() {
      $('#postjob4').hide();
        $('#postjob5').fadeIn(500);
    });

    $("#next5").click(function() {
    	$('#postjob5').hide();
      $('#postjob6').fadeIn(500);

      
      var jobTitle = $('input[name="jobtitle"]').val();
      var compName = $('input[name="compname"]').val();
      var city = $('input[name="city"]').val();
      var state = $('input[name="state"]').val();
      var address = $('input[name="address"]').val();
      var jobType = $('input[name="jobtype"]').val();
      var salMin = $('input[name="salmin"]').val();
      var salMax = $('input[name="salmax"]').val();
      var jobDescrip = $('textarea[name="jobdescrip"]').val();
      var receiver = $('input[name="receiver"]').val();
      var jobTags = $('input[name="jobtags"]').val();

      //Clear out whatever was in the divs
      $('#aboutDiv').contents().remove();
    	$('#summaryDiv').contents().remove();
      $('#qualiDiv').contents().remove();
    	$('#descDiv').contents().remove(); 

      //Append to About div
    	$('#aboutDiv').append('<h4>'+ jobTitle +'</h4>');
    	$('#aboutDiv').append('<p>'+ city + ', ' + state +'</p>');

      //Append to Summary
    	$('#summaryDiv').append('<p>'+ address +'</p>');
    	$('#summaryDiv').append('<p>'+ jobType +'</p>');
    	$('#summaryDiv').append('<p>'+ salMin + 'to ' + salMax +'</p>');

      //Append to descrip
    	$('#descDiv').append('<p>'+ jobDescrip +'</p>');

      var j = 1;
      var skillList = '';

      //Loops through skills and creates a comma seperated list and appends to Skills div
      while(j < adSkillNum){

          $skillValue = $('input[name="skill'+ j +'"]').val();
          
          $('#qualiDiv').append('<p>'+ $skillValue + '</p>');

          if(j < adSkillNum - 1){
            skillList += $skillValue + ',';
          }
          else{
            skillList += $skillValue;
          }

          j++;
      }

      //console.log(skillList);

      $("#postit").click(function() {
        $.post("createjob.php", { jobtitle: jobTitle, compname: compName, city: city, state: state, address: address, salmin: salMin, salmax: salMax, skills: skillList, jobdescrip: jobDescrip, jobtype: jobType, receiver: receiver, jobtags: jobTags}, function(data,status){
      });

      $(location).attr('href', 'index.php');

      });
    });

//Previous Page
    $("#back1").click(function() {
    	$('#postjob2').hide();
      	$('#postjob1').fadeIn(500);
    });

    $("#back2").click(function() {
    	$('#postjob3').hide();
      	$('#postjob2').fadeIn(500);
    });

    $("#back3").click(function() {
    	$('#postjob4').hide();
      	$('#postjob3').fadeIn(500);
    });

    $("#back4").click(function() {
    	$('#postjob5').hide();
      	$('#postjob4').fadeIn(500);
    });
    
    $("#back5").click(function() {
      $('#postjob6').hide();
        $('#postjob5').fadeIn(500);
    });

});