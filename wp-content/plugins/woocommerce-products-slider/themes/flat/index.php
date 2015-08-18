<?php

function wcps_body_flat($post_id)
	{
		
		$wcps_ribbons = get_option( 'wcps_ribbons' );
		
		
		$wcps_bg_img = get_post_meta( $post_id, 'wcps_bg_img', true );
		$wcps_themes = get_post_meta( $post_id, 'wcps_themes', true );
		$wcps_total_items = get_post_meta( $post_id, 'wcps_total_items', true );		
		$wcps_column_number = get_post_meta( $post_id, 'wcps_column_number', true );
		$wcps_auto_play = get_post_meta( $post_id, 'wcps_auto_play', true );
		$wcps_stop_on_hover = get_post_meta( $post_id, 'wcps_stop_on_hover', true );
		$wcps_slider_navigation = get_post_meta( $post_id, 'wcps_slider_navigation', true );
		$wcps_slide_speed = get_post_meta( $post_id, 'wcps_slide_speed', true );
				
		$wcps_slider_pagination = get_post_meta( $post_id, 'wcps_slider_pagination', true );
		$wcps_pagination_slide_speed = get_post_meta( $post_id, 'wcps_pagination_slide_speed', true );
		$wcps_slider_pagination_count = get_post_meta( $post_id, 'wcps_slider_pagination_count', true );
		
		$wcps_slider_pagination_bg = get_post_meta( $post_id, 'wcps_slider_pagination_bg', true );
		$wcps_slider_pagination_text_color = get_post_meta( $post_id, 'wcps_slider_pagination_text_color', true );		
		
		$wcps_slider_touch_drag = get_post_meta( $post_id, 'wcps_slider_touch_drag', true );
		$wcps_slider_mouse_drag = get_post_meta( $post_id, 'wcps_slider_mouse_drag', true );
		
		$wcps_content_source = get_post_meta( $post_id, 'wcps_content_source', true );
		$wcps_content_year = get_post_meta( $post_id, 'wcps_content_year', true );
		$wcps_content_month = get_post_meta( $post_id, 'wcps_content_month', true );
		$wcps_content_month_year = get_post_meta( $post_id, 'wcps_content_month_year', true );
		
		$wcps_taxonomy = get_post_meta( $post_id, 'wcps_taxonomy', true );		
		$wcps_taxonomy_category = get_post_meta( $post_id, 'wcps_taxonomy_category', true );		
		
		$wcps_product_ids = get_post_meta( $post_id, 'wcps_product_ids', true );		
		
		$wcps_cart_bg = get_post_meta( $post_id, 'wcps_cart_bg', true );
		$wcps_cart_text_color = get_post_meta( $post_id, 'wcps_cart_text_color', true );		
		
		
		
		$wcps_items_title_color = get_post_meta( $post_id, 'wcps_items_title_color', true );			
		$wcps_items_title_font_size = get_post_meta( $post_id, 'wcps_items_title_font_size', true );		
		
		$wcps_items_price_color = get_post_meta( $post_id, 'wcps_items_price_color', true );			
		$wcps_items_price_font_size = get_post_meta( $post_id, 'wcps_items_price_font_size', true );			
		
		$wcps_items_thumb_size = get_post_meta( $post_id, 'wcps_items_thumb_size', true );
		$wcps_items_thumb_max_hieght = get_post_meta( $post_id, 'wcps_items_thumb_max_hieght', true );
		
		$wcps_ribbon_name = get_post_meta( $post_id, 'wcps_ribbon_name', true );		
		
		
		
		
		$wcps_body = '';
		$wcps_body = '<style type="text/css">
		
		.wcps-container #wcps-'.$post_id.' div.wcps-items-cart a.add_to_cart_button,
		.wcps-container #wcps-'.$post_id.' div.wcps-items-cart a.added_to_cart
			{
			 background: '.$wcps_cart_bg .';
			 color:'.$wcps_cart_text_color.';
			} 
			
		.wcps-container #wcps-'.$post_id.' div.owl-pagination span.owl-numbers
			{
			 background: '.$wcps_slider_pagination_bg .';
			 color:'.$wcps_slider_pagination_text_color.';
			} 
			
		
		</style>';
		$wcps_body .= '
		<div  class="wcps-container" style="background-image:url('.$wcps_bg_img.')">
		<div class="wcps-ribbon wcps-ribbon-'.$wcps_ribbon_name.'" style="background:url('.$wcps_ribbons[$wcps_ribbon_name].') no-repeat scroll 0 0 rgba(0, 0, 0, 0);)"></div>
		
		<div  id="wcps-'.$post_id.'" class="owl-carousel  wcps-'.$wcps_themes.'">
		
		';
		
		global $wp_query;
		

		
		if(($wcps_content_source=="latest"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => $wcps_total_items,
						
						) );
			
			
			}		
		
		elseif(($wcps_content_source=="older"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'orderby' => 'date',
						'order' => 'ASC',
						'posts_per_page' => $wcps_total_items,
						
						) );

			}		

		elseif(($wcps_content_source=="featured"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'meta_query' => array(
							array(
								'key' => '_featured',
								'value' => 'yes',
								)),
						'posts_per_page' => $wcps_total_items,
						
						) );

			}	


		elseif(($wcps_content_source=="year"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'year' => $wcps_content_year,
						'posts_per_page' => $wcps_total_items,
						) );

			}

		elseif(($wcps_content_source=="month"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'year' => $wcps_content_month_year,
						'monthnum' => $wcps_content_month,
						'posts_per_page' => $wcps_total_items,
						
						) );

			}

		elseif($wcps_content_source=="taxonomy")
			{
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',							
						'posts_per_page' => $wcps_total_items,
						
						'tax_query' => array(
							array(
								   'taxonomy' => $wcps_taxonomy,
								   'field' => 'id',
								   'terms' => $wcps_taxonomy_category,
							)
						)
						
						) );
			}


		
		elseif(($wcps_content_source=="product_id"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post__in' => $wcps_product_ids,
						'posts_per_page' => $wcps_total_items,
						
						
						) );
			
			
			}

								
		
		if ( $wp_query->have_posts() ) :
		
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
		
		global $product;

		$wcps_featured = get_post_meta( get_the_ID(), '_featured', true );
		
		
		
		
		$wcps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $wcps_items_thumb_size );
		
		$wcps_thumb_url = $wcps_thumb['0'];
		
		$price = $product->get_price_html();
		
		$wcps_body.= '<div class="wcps-items" >';
			
		if($wcps_featured=="yes")
			{
			$wcps_body.= '<div class="wcps-featured"></div>';
			}
				
		$wcps_body.= '<div style="max-height:'.$wcps_items_thumb_max_hieght.';" class="wcps-items-thumb"><a href="'.get_permalink().'"><img src="'.$wcps_thumb_url.'" /></a></div>
				<div class="items-info">
					<div class="wcps-items-title" style="color:'.$wcps_items_title_color.';font-size:'.$wcps_items_title_font_size.'">'.get_the_title().'</div>
					<div class="wcps-items-price" style="color:'.$wcps_items_price_color.';font-size:'.$wcps_items_price_font_size.'">'.$price .'</div>
					<div class="wcps-items-cart">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>
				</div>
			</div>';
		
		endwhile;
		
		wp_reset_query();
		endif;
		

			
		$wcps_body .= '</div></div>';
		
		$wcps_body .='<script>
		jQuery(document).ready(function($)
		{
			$("#wcps-'.$post_id.'").owlCarousel({
				
				items : '.$wcps_column_number.', //10 items above 1000px browser width
				itemsDesktop : [1000,5], //5 items between 1000px and 901px
				itemsDesktopSmall : [900,3], // betweem 900px and 601px
				itemsTablet: [600,2], //2 items between 600 and 0
				itemsMobile : false, 
				navigationText : ["",""],
				';
				
			
		if($wcps_auto_play=="true")
			{
				
		$wcps_body .='autoPlay: '.$wcps_auto_play.',';
		
			}	
		
		if($wcps_stop_on_hover=="true")
			{
				
		$wcps_body .='stopOnHover: '.$wcps_stop_on_hover.',';
		
			}				
				
		if($wcps_slider_navigation=="true")
			{
				
		$wcps_body .='navigation: '.$wcps_slider_navigation.',';
		
			}				
				
		if(!empty($wcps_slider_pagination))
			{
				
		$wcps_body .='pagination: '.$wcps_slider_pagination.',';
		
			}
		else
			{
			$wcps_body .='pagination: false,';
			}
				
				
		if(!empty($wcps_slider_pagination_count))
			{
				
		$wcps_body .='paginationNumbers: true,';
		
			}
		else
			{
			$wcps_body .='paginationNumbers: false,';
			}				
				
				
				
		if(!empty($wcps_slide_speed))
			{
				
		$wcps_body .='slideSpeed: '.$wcps_slide_speed.',';
		
			}
			
				
		if(!empty($wcps_pagination_slide_speed))
			{
				
		$wcps_body .='paginationSpeed: '.$wcps_pagination_slide_speed.',';
		
			}			
			
			
		if(!empty($wcps_slider_touch_drag))
			{
				
		$wcps_body .='touchDrag : true,';
		
			}			
		else
			{
			$wcps_body .='touchDrag: false,';
			}
			
			
			
		if(!empty($wcps_slider_mouse_drag ))
			{
				
		$wcps_body .='mouseDrag  : true,';
		
			}			
		else
			{
			$wcps_body .='mouseDrag : false,';
			}			
			
			
			
			
							
				
				
				
		$wcps_body .='});
		
		});</script>';
		
		
		
		
		
		
		
		
		
		
		return $wcps_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}