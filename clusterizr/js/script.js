$( document ).ready(function() {
    $( "#registerButtonForward" ).click(function() {
        $(".login").hide( "slide", { direction: "left"  }, 1000 );
        $(".register").show( "slide", { direction: "right"  }, 1000 );
    });
    $( "#loginButtonBack" ).click(function() {
        $(".register").hide( "slide", { direction: "right"  }, 1000 );
        $(".login").show( "slide", { direction: "left"  }, 1000 );
    });
});