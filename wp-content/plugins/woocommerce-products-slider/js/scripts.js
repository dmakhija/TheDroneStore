
jQuery(document).ready(function($)
	{
		
		$(".wcps-items .add_to_cart_button").wrap("<div class='cart-area' ></div>");
		
		
		
		
		$(document).on('click', '#wcps_metabox .tab-nav li', function()
			{
				$(".active").removeClass("active");
				$(this).addClass("active");
				
				var nav = $(this).attr("nav");
				
				$(".box li.tab-box").css("display","none");
				$(".box"+nav).css("display","block");
		
			})
		
		
		
		
		$(document).on('click', '.wcps_content_source', function()
			{	
				var source = $(this).val();
				var source_id = $(this).attr("id");
				
				$(".content-source-box.active").removeClass("active");
				$(".content-source-box."+source_id).addClass("active");
				
			})
		
		
		
	
		
		
		
		
		jQuery(".wcps_taxonomy").click(function()
			{
				


				var taxonomy = jQuery(this).val();
				
				jQuery(".wcps_loading_taxonomy_category").css('display','block');

						jQuery.ajax(
							{
						type: 'POST',
						url: wcps_ajax.wcps_ajaxurl,
						data: {"action": "wcps_get_taxonomy_category","taxonomy":taxonomy},
						success: function(data)
								{	
									jQuery(".wcps_taxonomy_category").html(data);
									jQuery(".wcps_loading_taxonomy_category").fadeOut('slow');
								}
							});

		
			})
		
	
 		

	});	







