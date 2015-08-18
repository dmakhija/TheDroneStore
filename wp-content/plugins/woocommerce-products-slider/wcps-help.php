<div class="wrap">
	<?php echo "<h2>".__('Woocommerce Products Slider Help')."</h2>";?>
    <br />

		  
        
        
<h3>Have any issue ?</h3>

<p>Feel free to Contact with any issue for this plugin <a href="http://wordpress.org/support/plugin/woocommerce-products-slider/">http://wordpress.org/support/plugin/woocommerce-products-slider/</a>
</p>

<?php

$wcps_customer_type = get_option('wcps_customer_type');
$wcps_version = get_option('wcps_version');


?>
<?php
if($wcps_customer_type=="free")
	{
		echo '<p>You are using <strong> '.$wcps_customer_type.' version  '.$wcps_version.'</strong> of Woocommerce Products Slider, To get more feature you could try our premium version. </p>';
	}
elseif($wcps_customer_type=="pro")
	{
		echo '<p>Thanks for using <strong> '.$wcps_customer_type.' version  '.$wcps_version.'</strong> of wcps </p>';
	}

 ?>




<?php
if($wcps_customer_type=="free")
	{
?>
<br />
<b>Premium Version Features</b><br />

<ul class="wcps-pro-features">

    <li>Unlimited Domain.</li>
    <li>Life Time Automatic Update.</li>
	<li>Life Time Support via forum.</li>
	<li>7 Days Refund.</li>
	<li>Unlimited slider anywhere.</li>    
	<li>Fully responsive and mobile ready.</li>    
	<li>Query product by Taxonomy and Categories.</li>
    <li>Query product by Product id.</li>
	<li>Amazing extra 4 themes.</li>   
	<li>Slider Items Title Color.</li>  
	<li>Slider Items Price Color.</li>
	<li>Slider Custom ribbons.</li>    


</ul>

<br /><br />
<h3>Get Premium Vesrion:</h3><br />
<strong style="font-size:20px;">Price: $15(USD)</strong><br /><br />
Plugin Link: <a target="_blank" href="http://paratheme.com/items/woocommerce-product-slider-for-wordpress">http://paratheme.com/items/woocommerce-product-slider-for-wordpress</a><br /><br /> <br />


</p>
        
        
        
      <?php
      }
	  
	  ?>  
      
<br /> 
<h3>Please share this plugin with your friends?</h3>
<table>
<tr>
<td width="100px"> 
<!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>

<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-href="http://wordpress.org/plugins/woocommerce-products-slider/"></div>

</td>
<td width="100px">
<iframe src="//www.facebook.com/plugins/like.php?href=http://wordpress.org/plugins/woocommerce-products-slider/&amp;width=100&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=743541755673761" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>

 </td>
<td width="100px"> 





<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://wordpress.org/plugins/woocommerce-products-slider/" data-text="Timeline Pro – Responsive Timeline for WordPres">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>

</tr>

</table>
        
        
         
</div>
<style type="text/css">
.wcps-pro-features{}

.wcps-pro-features li {
  list-style: disc inside none;
}

</style>