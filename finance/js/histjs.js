        $(function(){


          $("#year").click(function(){
            $.post("chartcreator.php", { whatmonth: '00' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#chartarea").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("detailtable.php", { whatmonth: '00' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#bdtable").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("histupdate.php", { whatmonth: '00' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#versus").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
          });

          $("#jan").click(function(){ //when user clicks the item with id "grab-data"...
            $.post("chartcreator.php", { whatmonth: '01' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#chartarea").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("detailtable.php", { whatmonth: '01' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#bdtable").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("histupdate.php", { whatmonth: '01' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#versus").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
          });
          
          $("#feb").click(function(){ //when user clicks the item with id "grab-data"...
            $.post("chartcreator.php", { whatmonth: '02' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#chartarea").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("detailtable.php", { whatmonth: '02' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#bdtable").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("histupdate.php", { whatmonth: '02' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#versus").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
          });


          $("#march").click(function(){
            $.post("chartcreator.php", { whatmonth: '03' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#chartarea").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("detailtable.php", { whatmonth: '03' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#bdtable").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("histupdate.php", { whatmonth: '03' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#versus").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
          });

          $("#april").click(function(){
            $.post("chartcreator.php", { whatmonth: '04' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#chartarea").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("detailtable.php", { whatmonth: '04' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#bdtable").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
            $.post("histupdate.php", { whatmonth: '04' }, function(data,status){  //get data from mysql-ajax.php file.
              $("#versus").html(data); //replace the html in the item with id "result" with the data returned by the .get ajax call.
            });
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
            
            $("#bdtable").hide(); //default hide
            var visible = 0;
            console.log(visible);

            //Show or hide table when icon clicked
            $("#dailybd").click(function() {
                
                if(visible==1){
                    $("#bdtable").hide(); //
                    visible = 0;
                    console.log(visible);
                }
                else{
                    $("#bdtable").show(); //
                    visible = 1; 
                    console.log(visible);
                }
            });

        });