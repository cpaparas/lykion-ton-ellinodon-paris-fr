jQuery(document).ready(function() {
    jQuery(".mobile-nav").click(function() {
        if (jQuery("nav .greybox").css('display') == "none") {
            jQuery("nav .greybox").show();
        } else {
        	jQuery("nav .greybox").hide();
        }
    })
    var date = new Date();
    jQuery("#year").html(date.getFullYear());

    //Formulaire de contact
    jQuery("#contact_form").submit(function() {
    	var lastname = jQuery("#contact_form #lastname").val();
        var firstname = jQuery("#contact_form #firstname").val();
    	var email = jQuery("#contact_form #email").val();
    	var message = jQuery("#contact_form #message").val();
    	var message_ok = false;
    	if (typeof lastname != "undefined" && lastname != "" && typeof firstname != "undefined" && firstname != "" && typeof email != "undefined" && email != "" && typeof message != "undefined" && message != "") {
    		message_ok = true;
    		jQuery("#contact_form #error_msg").hide();
    	} else {
    		jQuery("#contact_form #error_msg").show();
    	}
    	
    	return message_ok;
    });

    jQuery("#single_costume img").click(function() {
        var img = this.getAttribute("src");
        jQuery("#slide img").attr("src",img);
        jQuery("#slide").removeClass('slideshow').addClass('slideshow_open');
    });

    jQuery("#slide").click(function() {
        jQuery("#slide img").attr("src",'');
        jQuery("#slide").removeClass('slideshow_open').addClass('slideshow');
    });
});


function displayManif(id) {
    jQuery("#grands_rdv").hide();
    jQuery("#presta_privees").hide();
    jQuery("#medias").hide();
    jQuery("#manifs_culturelles").hide();
    jQuery("#nos_spectacles").hide();
    jQuery("#ong_grands_rdv").removeClass("current");
    jQuery("#ong_presta_privees").removeClass("current");
    jQuery("#ong_medias").removeClass("current");
    jQuery("#ong_manifs_culturelles").removeClass("current");
    jQuery("#ong_nos_spectacles").removeClass("current");
    jQuery("#ong_"+id).addClass("current");
    jQuery("#"+id).css('display','block');
}