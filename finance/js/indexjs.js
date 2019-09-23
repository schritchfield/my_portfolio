$("document").ready(function() {
    $("#tableview").hide(); //default hide
    $("#pieview").hide(); //default hide

    //Show or hide table when icon clicked
    $("#table").click(function() {
      $("#tableview").toggle(500); //show table
      $("#breakdowns").hide(500); //hide icons
    });

    //Hide table when it is clicked again
    $("#tableview").click(function() {
      $("#tableview").toggle(); //hide table
      $("#breakdowns").toggle(); //show icons
    });

    //Show or hide pie chart when icon clicked
    $("#piechart").click(function() { 
      $("#pieview").css({
        'display' : 'block',
        'width' : '1000px',
        'height' : '800px',
        'margin-left' : 'auto',
        'margin-right' : 'auto'
      });

      $("#breakdowns").hide(500); //hide icons
    });

    //Hide pie when it is clicked again
    $("#pieview").click(function() {
      $("#pieview").css("display", "none");
      $("#breakdowns").toggle(); //show icons
    });

//=============CALENDAR AREA============================================================
    $("#calendar").mouseover(function() {
        $("#calendar").attr('src',"img/calendar_flip.png");
    })

    $("#calendar").mouseout(function() {
        $("#calendar").attr('src',"img/calendar.png");
    })
            
    //--YEAR
    $("#year").mouseover(function() {
      $("#year").css('background-color', '#6ECC5F');
    });

    $("#year").mouseout(function() {
      $("#year").css('background-color', '#BEEDAA');
    });

    //--JAN
    $("#jan").mouseover(function() {
      $("#jan").css('background-color', '#6ECC5F');
    });

    $("#jan").mouseout(function() {
      $("#jan").css('background-color', '#BEEDAA');
    });

    $("#jan").click(function() {
      $("#jan").css('background-color', 'red');
    });

    //--FEB
    $("#feb").mouseover(function() {
      $("#feb").css('background-color', '#6ECC5F');
    });

    $("#feb").mouseout(function() {
      $("#feb").css('background-color', '#BEEDAA');
    });

    $("#feb").click(function() {
      $("#feb").css('background-color', 'red');
    });

    //--MARCH
    $("#march").mouseover(function() {
      $("#march").css('background-color', '#6ECC5F');
    });

    $("#march").mouseout(function() {
      $("#march").css('background-color', '#BEEDAA');
    });

    $("#march").click(function() {
       $("#march").css('background-color', 'red');
    });

    //--APRIL
    $("#april").mouseover(function() {
      $("#april").css('background-color', '#6ECC5F');
    });

    $("#april").mouseout(function() {
      $("#april").css('background-color', '#BEEDAA');
    });

    $("#april").click(function() {
       $("#april").css('background-color', 'red');
    });
//------------------------------------------------------------------------------------------
    //DEFAULT TO YEAR ON PAGE LOAD  
 
    $.post("indexupdate.php", { whatmonth: '00' }, function(data,status){
      $("#glancedata").html(data);
    });
    /*$.post("piechart.php", { whatmonth: '00' }, function(data,status){
        $("#piearea").html(data);
    });*/

    //CALENDAR BUTTON CLICK FUNCTIONS

    $("#year").click(function(){
      $.post("indexupdate.php", { whatmonth: '00' }, function(data,status){
        $("#glancedata").html(data);
      });
      $.post("piechart.php", { whatmonth: '00' }, function(data,status){
        $("#piearea").html(data);
      });
    });

    $("#jan").click(function(){
      $.post("indexupdate.php", { whatmonth: '01' }, function(data,status){
        $("#glancedata").html(data);
      });
      $.post("piechart.php", { whatmonth: '01' }, function(data,status){
        $("#piearea").html(data);
      });
    });

    $("#feb").click(function(){
      $.post("indexupdate.php", { whatmonth: '02' }, function(data,status){
        $("#glancedata").html(data);
      });
      $.post("piechart.php", { whatmonth: '02' }, function(data,status){
        $("#piearea").html(data);
      });
    });

    $("#march").click(function(){
      $.post("indexupdate.php", { whatmonth: '03' }, function(data,status){
        $("#glancedata").html(data);
      });
      $.post("piechart.php", { whatmonth: '03' }, function(data,status){
        $("#piearea").html(data);
      });
    });

    $("#april").click(function(){
      $.post("indexupdate.php", { whatmonth: '04' }, function(data,status){
        $("#glancedata").html(data);
      });
      $.post("piechart.php", { whatmonth: '04' }, function(data,status){
        $("#piearea").html(data);
      });
    });
    
});