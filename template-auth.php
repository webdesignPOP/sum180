<?php
/*
Template Name: SSO authentication / code is in the header, this page just confirms login
*/
?>

<?php  global $theLayout;

	?>
	<div class="content-page">
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="the-post-container">
			


<?php
    $current_user = wp_get_current_user();
			echo 'Login successful!! User ID ' . $current_user->ID;
			        if ( is_user_logged_in() ) {
			echo ' is logged in.';

        }

?>



			</div>
		</article>
		
	</div>
