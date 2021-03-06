<?php global $theFooter; 

do_action( 'bp_after_container' );
do_action( 'bp_before_footer'   );

// Footer Background
// ---------------------------------------------------------------

// Background color & image
$footerBg = ($theFooter['bg_color']) ? '#'.str_replace('#','',$theFooter['bg_color']) : 'transparent';
if ($theFooter['background']) {
	$footerBg .= ' url(\''.$theFooter['background'].'\') '.$theFooter['bg_repeat'].' '.$theFooter['bg_pos_x'].' '.$theFooter['bg_pos_y'];
}
$footerStyle = 'style="background: '.$footerBg.';"';
// Default background
$bg = get_theme_var('design_setting,footer');
// Rewrite bg (page specific replacing defaults)
foreach ( (array) $bg as $key => $value) {
	if ($theFooter[$key]) 
		$bg[$key] = $theFooter[$key];
}
// Background color & image
$theBg = ($bg['bg_color']) ? '#'.str_replace('#','',$bg['bg_color']) : 'transparent';
if ($bg['background']) {
	$theBg .= ' url(\''.$bg['background'].'\') '.$bg['bg_repeat'].' '.$bg['bg_pos_x'].' '.$bg['bg_pos_y'];
}
$bgStyle = 'style="background: '.$theBg.';"';


// Footer layout
// --------------------------------------------------------------- 

?>

<footer <?php echo $bgStyle; ?>>
	<div class="pageWrapper theContent clearfix">
		<div class="inner-1">
			<div class="inner-2">
			<div id="chlfooter">
				<?php dynamic_sidebar("footer-1"); ?> 
			</div>
			<div id="chlfooter2">
				<?php dynamic_sidebar("footer-2"); ?> 
			</div>
			
				<?php if ($theFooter['content']) { ?>
					<div class="ugc clearfix">
						<?php
						$id = $theFooter['content'];
						$id = (!is_numeric($id)) ? get_ID_by_slug($id, 'static_block') : $id; 
						echo theme_get_page($id); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>
	<div id="chl-top-header">	
		<div class="custom-header-color">
				<?php wp_nav_menu( array('menu' => 'Color Menu', 'menu_id' => 'color-menu' )); ?>		
		</div>
	</div>

<script type="text/javascript">
	jQuery(document).ready(function($) { 
jQuery("#bbp_topic_subscription").prop( "checked", true );
		jQuery(".bbp-breadcrumb a.bbp-breadcrumb-home").attr("href", "http://sum180.com/community/activity/")
	});
</script>
