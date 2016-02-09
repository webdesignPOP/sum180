<?php global $cssPath, $jsPath, $themePath, $theLayout; ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><?php // Force latest IE rendering engine ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title('',1,'right'); ?></title>
<?php // Favorites and mobile bookmark icons ?>
<link rel="shortcut icon" href="<?php theme_var('options,favorites_icon','http://sum180.com/favicon.ico'); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php theme_var('options,apple_touch_icon','http://sum180.com/apple-touch-icon.png'); ?>">

<?php // JS variables needed to trigger theme functionality ?>
<script type="text/javascript"> 
	var fadeContent = '<?php theme_var('options,fade_in_content','none'); ?>'; 
	var toolTips = '<?php theme_var('options,tool_tips','none'); ?>'; 
</script>

<?php 
// WordPress headers.
// This includes all theme CSS and some JS files. You can add or modify the list from "functions.php" 

<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
do_action( 'bp_head' );
wp_head();

// Feed link / Pingback link ?>
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/chlstyle.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet" type="text/css" />
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo $cssPath; ?>ie.css" />
<![endif]-->

<style type="text/css">
<?php 
// Body font
if ($theLayout['body_font']) : 
	echo 'body, select, input, textarea {  font-family: '. $theLayout['body_font'] .'; } ';
endif;

// Default body background
$bg = get_theme_var('design_setting,body');
if ( $bg['bg_color'] || $bg['background']) {
	$theBg = ($bg['bg_color']) ? '#'.str_replace('#','',$bg['bg_color']) : 'transparent';
	if ($bg['background']) {
		$theBg .= ' url(\''.$bg['background'].'\') '.$bg['bg_repeat'].' '.$bg['bg_pos_x'].' '.$bg['bg_pos_y'];
	}
	echo 'body { background: '.$theBg.'; }';
}
	
// Heading font
if ($theLayout['heading_font']['standard']) : 
	echo 'h1, h2, h3, h4, h5, h6 {  font-family: '. $theLayout['heading_font']['standard'] .'; } ';
endif;

// Custom CSS entered in design settings
if ($customCSS = get_theme_var('design_setting,css_custom')) :
	echo prep_content($customCSS); 
endif;
?>
</style> <?php 

 
// Custom JavaScript entered in design settings
if ($customJS = get_theme_var('design_setting,js_custom')) : ?>
<script type="text/javascript">
	var jq = jQuery; // BP backwards compat.
	<?php echo prep_content($customJS); ?>
</script>
<?php endif; ?>