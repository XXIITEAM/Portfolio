$(document).ready( function () {
	$("#contact-form").submit( function() {
		$.ajax({ 
		   type: "POST", 
		   url: "php/contact.php", 	   
		   data: { 
				NomPrenom: $('input[type=text][name=nom]').val(),
				Email: $('input[type=email][name=email]').val(),
				Sujet: "Nouveau message sur PortFolio",
				Message: $('#message').val()
		   }, 
		   success: function(msg) { 
				if(msg === 'Validation') {
					$("div#retourForm").html('Message envoyé avec succès !');
                                        $("div#retourForm").fadeIn(1000);
                                        setTimeout(function(){
                                            $("div#retourForm").fadeOut(1000);
                                        }, 3000);
				} else {
					$("div#retourForm").html(msg); 
				}
		   }
		});
 
		return false; 
	});
});

$(window).load(function() {
	$(".loader").fadeOut("1000");
})