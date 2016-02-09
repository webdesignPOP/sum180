<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<tr class="bbp-reply-header">
		<td colspan="2">

			<?php /*?><?php printf( __( '%1$s at %2$s', 'bbpress' ), get_the_date(), esc_attr( get_the_time() ) ); ?>

			<a href="<?php bbp_reply_url(); ?>" title="<?php bbp_reply_title(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>

			<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

			<?php bbp_reply_admin_links(); ?>

			<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?><?php */?>

		</td>
	</tr>

	<tr id="post-<?php bbp_reply_id(); ?>" <?php bbp_reply_class(); ?>>

		<td colspan="2">

			<div class="item-container">
				<div class="item-content">
				
					<article>
						<div class="bbp-reply-author">
							<?php bbp_reply_author_link( array( 'type' => 'avatar', 'size' => 35 ) ); ?>
						</div>					
						
						<div class="item-content-container">
							<header class="item-header comment-header">
								<div class="reply-post-title">
									<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
									
									<h4 class="poster-name"><?php bbp_reply_author_link( array( 'type' => 'name' ) ); ?></h4> <span class="said"><?php _e( 'said', 'bbpress' ) ?></span>
						
									<?php if ( is_super_admin() ) : ?>
								
										<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>
								
										<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>
								
										<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>
								
									<?php endif; ?>
								
									<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
	
								</div>
							</header>
				
							<div class="post-content">
								<div class="bbp-reply-content">
						
									<?php do_action( 'bbp_theme_after_reply_content' ); ?>
						
									<?php bbp_reply_content(); ?>
						
									<?php do_action( 'bbp_theme_before_reply_content' ); ?>
					
								</div>
							</div>
				
							<footer class="item-footer clearfix">
								<div class="date">
									<?php printf( __( '%1$s at %2$s', 'bbpress' ), get_the_date(), esc_attr( get_the_time() ) ); ?>
								</div>
								
								<div class="item-actions admin-links">

									<a href="<?php bbp_reply_url(); ?>" title="<?php bbp_reply_title(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>
																		
									<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>
						
									<?php bbp_reply_admin_links(); ?>
						
									<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>
								</div>
							</footer>
						</div>
						
					</article>
			
				</div>
			</div>


			<?php /*?><div class="item-content">
				<div class="bbp-reply-author">
		
					<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
		
					<?php bbp_reply_author_link( array( 'sep' => '<br />' ) ); ?>
		
					<?php if ( is_super_admin() ) : ?>
		
						<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>
		
						<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>
		
						<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>
		
					<?php endif; ?>
		
					<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
		
				</div>
		
				<div class="bbp-reply-content">
		
					<?php do_action( 'bbp_theme_after_reply_content' ); ?>
		
					<?php bbp_reply_content(); ?>
		
					<?php do_action( 'bbp_theme_before_reply_content' ); ?>
	
				</div>
			</div><?php */?>
		</td>

	</tr><!-- #post-<?php bbp_topic_id(); ?> -->
