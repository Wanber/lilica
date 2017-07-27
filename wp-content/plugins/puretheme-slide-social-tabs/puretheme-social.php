<div class="main_social">
	<?php $facebook = PTSST_get_setting( 'pure_social_tabs', 'general', 'facebook' );?>
	<?php 
	
	if ( !empty ($facebook) ) { ?>
	
	<div class="facebook_area on">
		<div class="facebook_left">
			<i class="fa fa-facebook c_facebook"></i>
			<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F<?php echo $facebook;?>&amp;width=240&amp;height=346&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" style="border: 0px solid #fff; height: 346px; overflow: hidden; width: 240px;"></iframe>
		</div>
	</div>
	
	<?php } ?>

	<?php $twitter = PTSST_get_setting( 'pure_social_tabs', 'general', 'twitter' );?>
	<?php 
	
	if ( !empty ($twitter) ) { ?>
	 
	<div class="twitter_area on">			
		<div class="twitter_left">
			<i class="fa fa-twitter c_twitter"></i>
			<div style="width:248px;font-size:8px;text-align:right;height:225px">
				
				<div id="twitter-box"></div>
				<script>
				  var tw_user = '<?php echo $twitter;?>';
				  var tw_width = 248;
				  var tw_height = 325;
				  var no_face = 10;
					(function() {
					  var tw_box = document.createElement('script'); tw_box.type = 'text/javascript'; tw_box.async = true;
					  tw_box.src = '<?php echo '' . plugins_url( 'js/twitter.js' , __FILE__ ) . '';?>';
					  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(tw_box);
				  })();
				</script>
				<div class="hidebar"></div>
			</div>
		</div>
	</div>
		
	<?php } ?>

	<?php $gplus = PTSST_get_setting( 'pure_social_tabs', 'general', 'gplus' );?>
	<?php 
	
	if ( !empty ($gplus) ) { ?>
	
	<div class="google_area on">			
		<div class="google_left">
			<i class="fa fa-google-plus c_google"></i>

			<div style="float: left; margin: 10px 10px 10px 15px;">
				
				<div class="g-plus" data-action="followers" data-height="250" data-href="https://plus.google.com/<?php echo $gplus;?>" data-source="blogger:blog:followers" data-width="270">
				</div>
				<script type="text/javascript">(function () {window.___gcfg = {'lang': 'en'};var po = document.createElement('script');po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();</script>
			</div>
		</div>
	</div>		
	<?php } ?>
	
	<?php $youtube = PTSST_get_setting( 'pure_social_tabs', 'general', 'youtube' );?>
	<?php 
	
	if ( !empty ($youtube) ) { ?>
	
	<div class="youtube_area on">			
		<div class="youtube_left">
			<i class="fa fa-youtube c_youtube"></i>
			<div style="float:left;margin:1px 0px 0px 2px;">
				
				<iframe src="http://www.youtube.com/subscribe_widget?p=<?php echo $youtube;?>" style="border: 0 none;height: 70px;margin-top: -2px;width: 220px;margin-left: -3px;" scrolling="no" frameBorder="0"></iframe>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<?php 

	if ( empty ( $twitter ) ) { 
	
	?>
		<style type="text/css">
			.google_area {top: 40px;}
			.youtube_area {top: 80px;}
		</style>
	
	<?php }

	if ( empty ( $gplus ) ) { 
	
	?>
		<style type="text/css">
			.youtube_area {top: 80px;}
		</style>
	
	<?php }

	if ( empty ( $gplus ) && empty ( $twitter ) ) { 
	
	?>
		<style type="text/css">
			.youtube_area {top: 40px;}
		</style>
	
	<?php }

?>