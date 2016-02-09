<?php
/*
Template Name: logs the user out of WP/BP
*/
?>

<?php  global $theLayout;

	?>
	<div class="content-page">
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="the-post-container">
			


<?php 

			        if ( is_user_logged_in() ) {
wp_logout(); 
header("Refresh:0");

        }
else {
				echo 'User is logged out.';
}



?>


			</div>
		</article>
		
	</div>
