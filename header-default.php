<?php
$lo = $_GET['logout'];
if ( is_page(650) && $lo == 'true'){
wp_logout();
}

elseif ( is_page(588) ){


class Config{
    protected $passpharse='test';
    protected $salt='4Bvq75DG';
    protected $iterations='1000';
    protected $initvector='pOWaTbO92LfXbh69JkYzfT7P465TNc0h';
    protected $keysize=32;

    public function setPasspharse($val){
     $this->passpharse=$val;
    }

    public function getPasspharse(){
        return $this->passpharse;
    }

    public function setSalt($val){
        $this->salt=$val;
    }

    public function getSalt($val){
        return $this->salt;
    }

    public function getIterations(){
        return $this->iterations;
    }

    public function setIterations($val){
        $this->iterations=$val;
    }

    public function isValidUrl($url){
    $regex = "((http?|ftp)\:\/\/)?"; // SCHEME
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP
    $regex .= "(\:[0-9]{2,5})?"; // Port
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor

       if(preg_match("/^$regex$/", $url))
       {
               return true;
       } else {

                return false;
       }
    }

   function pddkdf2( $p, $s, $c, $kl, $a = 'sha1' ) {
    $hl = strlen(hash($a, null, true)); # Hash length
    $kb = ceil($kl / $hl);              # Key blocks to compute
    $dk = '';                           # Derived key
    # Create key
    for ( $block = 1; $block <= $kb; $block ++ ) {
        # Initial hash for this block
        $ib = $b = hash_hmac($a, $s . pack('N', $block), $p, true);
        # Perform block iterations
        for ( $i = 1; $i < $c; $i ++ )
            # XOR each iterate
            $ib ^= ($b = hash_hmac($a, $b, $p, true));
        $dk .= $ib; # Append iterated block
    }
    # Return derived key of correct length
    return substr($dk, 0, $kl);
}

}

class Encrypt extends Config {
    protected $query;
    protected $encrypted;

    public function __construct($val=''){
        if($val!=''){
        $this->query=urldecode($val);
        } else {
            throw new Exception('Query is empty');
        }
    }

    public function queryEncrypt(){
        $key=$this->pddkdf2($this->passpharse,$this->salt,$this->iterations,$this->keysize);
        $text=$this->query;
        $iv=$this->initvector;
        $cryptttext= base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_CBC, $iv));

        return $this->encrypted=$cryptttext;
    }

    public function getEncryptedText(){
        return $this->encrypted;
    }
}


class Decrypt extends Config {
    protected $values=array();
    protected $decrypted;

    private function decryptQuery($query){
        $iv=$this->initvector;
        $key=$this->pddkdf2($this->passpharse,$this->salt,$this->iterations,$this->keysize);
        $this->decrypted=rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($query), MCRYPT_MODE_CBC, $iv), "\0");
        return $this->decrypted;
    }


    public function getResult(){
        return $this->values;
    }

    public function parseEncryptedQuery($query){
        $url=$query;

        $q=parse_url($url, PHP_URL_QUERY);
        parse_str($q, $params);
        $val=array_keys($params);

        $url="http://example.com/page?".$this->decryptQuery($val[0]);
        $q=parse_url($url, PHP_URL_QUERY);
        parse_str($q, $params);

        return $this->values=$params;
    }
}
?>

<?php

$query_string='id=0&t=1000';
$obj=new Encrypt($query_string);
$encrypted=urlencode($obj->queryEncrypt($query_string));

$string="http://sum180.com/community/sso/?".$_SERVER['QUERY_STRING'];


$obj=new Decrypt;
$result=$obj->parseEncryptedQuery($string);

$id=$result['id'];
$t=$result['t'];

/**
 * Converts from C# DateTime.Ticks to a Unix Timestamp
 *
 * @param Integer $ticks
 * @return Integer
 */
function ticks_to_time($ticks) {
        return (($ticks - 621355968000000000) / 10000000);
}
/**
 * Converts from a Unix Timestamp to C# DateTime.Ticks
 * @param Integer $time
 * @return Integer
 */
 function time_to_ticks($time) {
        return number_format(($time * 10000000) + 621355968000000000 , 0, '.', '');
}
/**
 * Converts a given string into C# DateTime.Ticks. Uses strings valid in PHP
 *
 * @link http://php.net/manual/en/function.strtotime.php
 * @param String $str
 * @return Integer
 */
 function str_to_ticks($str) {
        return time_to_ticks(strtotime($str));
}

	$time = ticks_to_time($t);

	$diff = time() - $time;
	if ($diff > 0 )
	{








if(!empty($id)){
 ob_start();

$user_id = $id;
        if ( is_user_logged_in() ) {
            wp_logout();
        }




// $user_id = 12345;
$user = get_user_by( 'id', $user_id );
if( $user ) {
    wp_set_current_user( $user_id, $user->user_login );
		    do_action( 'wp_login', $user->user_login, $user );
  clean_user_cache($user->ID);
  wp_clear_auth_cookie();
  wp_set_current_user($user->ID);
  wp_set_auth_cookie($user->ID, true, false);
  update_user_caches($user);
}
 ob_end_clean();

    $current_user = wp_get_current_user();
/**			echo 'Login successful! User ID ' . $user->ID;
			        if ( is_user_logged_in() ) {
			echo ' is logged in.';

        }
*/



//    wp_set_auth_cookie( $user_id );
/*
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
    echo 'Bio: ' . $current_user->description . '<br /><br /><br />';
	echo '<a href="/encryption-test/">< Back to encryption page</a>';
*/


}
else{

	exit("Invalid parameters passed");

}






//		echo 'less than 45 seconds old<br>';

//	} else if ($diff > 0 && $diff >= 45)
//	{
//		echo 'greater or equal than 45 seconds old<br>';
	} else
	{
//		echo 'This link has expired.';
	}







}
?>

<?php global $cssPath, $jsPath, $themePath, $theLayout; ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><?php // Force latest IE rendering engine ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title('',1,'right'); ?></title>
<?php // Favorites and mobile bookmark icons ?>
<link rel="shortcut icon" href="<?php theme_var('options,favorites_icon','http://para.llel.us/favicon.ico'); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php theme_var('options,apple_touch_icon','http://para.llel.us/apple-touch-icon.png'); ?>">

<?php // JS variables needed to trigger theme functionality ?>
<script type="text/javascript">
	var fadeContent = '<?php theme_var('options,fade_in_content','none'); ?>';
	var toolTips = '<?php theme_var('options,tool_tips','none'); ?>';
</script>

<?php
// WordPress headers.
// This includes all theme CSS and some JS files. You can add or modify the list from "functions.php"
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

<!-- enqueue dynamic header styles, absolutel paths -->
    <link type="text/css" rel="stylesheet" href="http://sum180.com/WebResource.axd?d=nb_987uZgbQm-pgGJbtRRLJQXiLeAz1BmnEz7r8-9YvMMm_hZFhfszPCcRzFuRqBHUFFRKKDXd131_8X-q8UQ0_CMnEIbZUjHpBdgtHA4ikC41cq2149KgmwBzeYQhLroP-YDYIdOeVKCR2sw630wwrBd5j0-hmfK2ZyZ1i8fVA1&amp;t=635213329160000000" id="ext-theme" />
    <link type="text/css" rel="stylesheet" href="http://sum180.com/WebResource.axd?d=NSje5QxyYsO5Lk21mNKk08wqjWf0aIB9I0HqqdfjNhcVJkcO00BPImqcU0KJiPxKct3gSJqf0KfL-3K_PZKJ6Jw2qZmHA4nKw89ZdGQogzV9I-mElpOa48xJ-hAjMIVYQB3itx9PbOIgM40FIuLvNZ6TByNc8j6U2syqmDH0hKxq8hhvC2ca9opC-iEf6rS-0&amp;t=635213329160000000" />
    <script type="text/javascript" src="http://sum180.com/WebResource.axd?d=NZ5IFPnunZB6aAn2IBSP3cztuD5yXW9D10cEBIKnz6XWia6kk4bLpsf6iwCJNr-22dveaOOCN4FBq9hA9c3FsPLjvlJCUisgmTjc6Q3qCWRfeDpL7VbjpaslHIX9g54eyGnRY5RuBNpq1-6cbs6DkA2&amp;t=635213329160000000"></script>
    <script type="text/javascript" src="http://sum180.com/WebResource.axd?d=YE2RZztKG9TwXxeV6JU6dKt3O8WKu15BM8-mWUtdWceBFx8xWkTMM-fXQsuN0zFYlX6w9bx6R3UK42oK90Y7J83zES0qwg-c42AUuiy4X2t4cBQcseFddKdvestGDvh3Rsv692kIK6gZDU4ScjI6rA2&amp;t=635213329160000000"></script>



    <script src="http://sum180.com/GUI/js/extend_ext.js"></script>
    <script src="http://sum180.com/Scripts/jquery.signalR-2.2.0.min.js"></script>
    <script src="http://sum180.com/signalr/hubs"></script>
    <script src="http://sum180.com/GUI/js/signalr_ex.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700" rel="stylesheet" type="text/css" /><link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet" type="text/css" /><link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet" type="text/css" /><link href="../GUI/css/main.css" rel="stylesheet" /><link href="http://sum180.com/GUI/css/private_menu.css" rel="stylesheet" />

    <link href="http://sum180.com/GUI/css/welcome2.css" rel="stylesheet" />
