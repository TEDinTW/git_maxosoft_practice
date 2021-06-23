var $ = jQuery.noConflict();

function postSiteData() {
    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: { 
            action:'post_site_data',
            nonce: ajax_var.nonce
        },
        success: function( response ) {

            var tmpRes = JSON.parse(response);
            var formatRes = JSON.stringify(tmpRes, null, '\t');           
            jQuery('#pre_response').text( formatRes );
            // jQuery('#pre_response').text( response );
        }
    });
}