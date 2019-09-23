$("document").ready(function() {

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
              //$("#exampleModal").hide();
            });

            //--FEB
            $("#feb").mouseover(function() {
              //$("#jan").toggleClass("highlightedIcon");
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
          $.post("goalsupdate.php", { whatmonth: '00' }, function(data,status){
            $("#goaldata").html(data);
          });

          $("#year").click(function(){
            $.post("goalsupdate.php", { whatmonth: '00' }, function(data,status){
              $("#goaldata").html(data);
            });
          });

          $("#jan").click(function(){
            $.post("goalsupdate.php", { whatmonth: '01' }, function(data,status){
              $("#goaldata").html(data);
            });
          });

          $("#feb").click(function(){
            $.post("goalsupdate.php", { whatmonth: '02' }, function(data,status){
              $("#goaldata").html(data);
            });
          });

          $("#march").click(function(){
            $.post("goalsupdate.php", { whatmonth: '03' }, function(data,status){
              $("#goaldata").html(data);
            });
          });

          $("#april").click(function(){
            $.post("goalsupdate.php", { whatmonth: '04' }, function(data,status){
              $("#goaldata").html(data);
            });
          });
//==================================================================================================

});