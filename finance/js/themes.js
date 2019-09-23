$("document").ready(function() {

    $("#techtheme_btn").click(function() { 
        $("#techtheme_btn,#greentheme_btn").toggleClass("mycolor5");
        
        
        //$("#mainhead").attr('src',"img/banner2.jpg");
    });
//---------------------------------------------------------------------------------------------------------------

/*
    $("#techtheme_btn").click(function(){
        $.post("indexupdate.php", { whatmonth: '00' }, function(data,status){
            $("#glancedata").html(data);






        });
    });
*/
});