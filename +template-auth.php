<?php
/*
Template Name: SSO authentication
*/
?>

<?php  global $theLayout;

	?>
	<div class="content-page">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="the-post-container">



<?php
class Config{
    protected $passphrase='test';
    protected $salt='4Bvq75DG';
    protected $iterations='1000';
    protected $initvector='pOWaTbO92LfXbh69JkYzfT7P465TNc0h';
    protected $keysize=32;

    public function setPassphrase($val){
     $this->passphrase=$val;
    }

    public function getPassphrase(){
        return $this->passphrase;
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
        $key=$this->pddkdf2($this->passphrase,$this->salt,$this->iterations,$this->keysize);
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
        $key=$this->pddkdf2($this->passphrase,$this->salt,$this->iterations,$this->keysize);
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

$query_string='id=0&t=500';
$obj=new Encrypt($query_string);
$encrypted=urlencode($obj->queryEncrypt($query_string));

$string="https://sum180.com/community/sso/?".$_SERVER['QUERY_STRING'];


$obj=new Decrypt;
$result=$obj->parseEncryptedQuery($string);

$id=$result['id'];
$t=$result['t'];

echo $id+'ssss';

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
			echo 'Login successful! User ID ' . $user->ID;
			        if ( is_user_logged_in() ) {
			echo ' is logged in.';

        }




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
		echo 'This link has expired.';
	}








?>


			</div>
		</article>

	</div>
