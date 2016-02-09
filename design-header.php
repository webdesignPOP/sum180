<?php global $theHeader, $themePath; 

// Header background
// ---------------------------------------------------------------

// Default header background from Design Settings
$bg = get_theme_var('design_setting,header');
// Overwrite array to include header specific settings (depending on the header, page, etc.)
foreach ( (array) $bg as $key => $value) {
	if ($theHeader[$key]) 
		$bg[$key] = $theHeader[$key];
}

// Background color & image (create style tag)
$theBg = ($bg['bg_color']) ? '#'.str_replace('#','',$bg['bg_color']) : 'transparent';
if ($bg['background']) {
	$theBg .= ' url(\''.$bg['background'].'\') '.$bg['bg_repeat'].' '.$bg['bg_pos_x'].' '.$bg['bg_pos_y'];
}
$bgStyle = 'style="background: '.$theBg.';"';

// Glow effect
$bg_glow = ($theHeader['bg_glow'] == 'hide') ? 'style="background-image: none;"' : '';

// Check Variables
$mm_class = (isset($mm_class)) ? $mm_class : "";
$mm_nav = (isset($mm_nav)) ? $mm_nav : "";

// Check Touch screen
$touching = ( function_exists( wp_is_mobile() ) && wp_is_mobile() ) ? "touching" : "";

// Header layout
// --------------------------------------------------------------- 

?>
<div id="chl-top-header">
	<div class="custom-header-color">
		<?php wp_nav_menu( array('menu' => 'Color Menu', 'menu_id' => 'color-menu' )); ?>
	</div>
</div>
<div ID="headerWrapper" <?php echo $bgStyle; ?>>
	<div class="inner-1" <?php echo $bg_glow; ?>>
		<div class="custom-header-color">
		<div class="inner-2">
			<?php 
			
			// Slide Top: Slide down panel at top, opens by clicking tab 
			// ---------------------------------------------------------------

			$tabs = get_theme_var('sidebar-tabs');	// get the tabs/sidebars from the database
			
			// loop through all tabs, find the ones to show
			foreach ((array) $tabs as $tab) {
				// test the conditionals
				$conditionals = explode(',', $tab['conditions']);
				for ($i=0; $i<count($conditionals); $i++) {
					$item = 'include';
					$condition = trim($conditionals[$i]);
					if ( !conditional_return($condition) ) {
						$item = 'exclude';
						break; // go to the next conditional
					}
				}
				// include this item?
				if ($item != 'exclude') {
					$sections[$tab['key']]['label']		= $tab['label'];
					$sections[$tab['key']]['class']		= $tab['class'];
					$sections[$tab['key']]['bg_color']	= ($tab['bg_color']) ? 'background-color: #'.str_replace('#','',$tab['bg_color']).';' : '';
				}
			}
			
			if (!empty($sections)) {
				// Reverse the order of the array
				$sections = array_reverse( $sections );
				
				// Output the tabs and content?>
				<div id="TopPanel" class="clearfix">
					<div class="sections">
					<?php 
					// output each tab content section
					foreach ((array) $sections as $key => $value) : ?>
						<section id="<?php echo $key; ?>" class="topPanelSection <?php echo $value['class']; ?>" style="display: none; <?php echo $value['bg_color']; ?>">
							<div class="ugc pageWrapper topPanelContent">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('generated_sidebar-'.$key)) : endif; ?>
							</div>
						</section>
					<?php endforeach; ?>
					</div>
					<ul class="section-tabs pageWrapper">
					<?php 
					// output each tab link
					foreach ((array) $sections as $key => $value) :
						echo '<li><a href="#'. $key .'" id="Section-Tab-'. $key .'" class="sectionTab '. $value['class'] .'" style="'. $value['bg_color'] .'">'. $value['label'] .'</a></li>';
					endforeach; ?>
					</ul>
				</div>
				<?php
			} // end if (!empty($sections))
			
			
			
			// Header: Logo, Menu, etc
			// --------------------------------------------------------------- 
			
			?>
			<header>
				<div id="MainHeader" class="pageWrapper clearfix">
					<h1 id="Logo"><?php theme_logo('https://sum180.com/Default.aspx', array('image'=>$themePath.'assets/images/logo.png', 'width'=>'140', 'height'=>'40', 'class'=>'default')); ?></h1>
					<div id="chlheaderline"><?php dynamic_sidebar("custom-top-sidebar"); ?></div>
					<div id="chltopmenu">
					
					
					<?php 
					
					wp_nav_menu( array('menu' => 'Top menu', 'menu_id' => 'top-menu' )); 
					?>
                    
                    
                    </div>
					<div id="MainMenu" <?php echo $mm_class; ?> class="<?php echo $touching; ?>">
						<div class="inner-1">
							<div class="inner-2">
                            
                            
                            
<?php 
// IS logged in
if ( is_user_logged_in() ) { 
?>


        <nav id="primary_nav_wrap">
            <ul>
                <li>
                    <div class="menuArrow">&nbsp</div>
                    <a id="HyperLink1" class="menuBig" href="https://sum180.com/Private/Welcome.aspx">Dashboard</a>
                    <ul>
                        <li>
                            <div class="arrow-up"></div>
                        </li>
                        <li>
                            <a id="hpBuildPlan" href="https://sum180.com/Private/ClientCenter.aspx">Build Plan</a>
                        </li>
                        <li>
                            <a id="hpGetPlan" href="https://sum180.com/Private/ClientCenter.aspx">Get Plan</a></li>
                        <li>
                            <a id="hpConsult" href="https://sum180.com/Private/ScheduleCall.aspx">Consult</a></li>
                        <li>
                            <a id="HyperLink2" href="https://community.sum180.com">Talk to Community</a></li>
                        <li>
                            <a id="hpCalculator" href="https://sum180.com/Private/RTCalculatorPath.aspx">Understand Your Spending</a></li>
                        <li>
                            <a id="HyperLink3" href="http://community.sum180.com">Learn from Experts</a></li>
                    </ul>
                </li>
                <li>
                    <div class="menuArrow">&nbsp</div>
                    <a id="HyperLink4" class="menuBig" href="https://sum180.com/Private/ClientCenter.aspx">My Data</a>
                    <ul>
                        <li>
                            <div class="arrow-up"></div>
                        </li>
                        <li>
                            <a id="HyperLink6" href="https://sum180.com/Private/ClientCenter.aspx?dfs=1">My Plans</a></li>
                        <li>
                            <a id="HyperLink7" href="https://sum180.com/Private/ClientCenter.aspx?dfs=2">My Interviews</a></li>
                        <li>
                            <a id="HyperLink8" href="https://sum180.com/Private/ClientCenter.aspx?dfs=3">My Spending</a></li>
                    </ul>
                </li>

                <li>
                    <div class="menuArrow">&nbsp</div>
                    <a id="HyperLink5" class="menuBig" href="https://sum180.com/Private/Account.aspx">My Account</a>

                    <ul>
                        <li>
                            <div class="arrow-up"></div>
                        </li>
                        <li>
                            <a id="HyperLink9" href="https://sum180.com/Private/Account.aspx">My Account</a></li>
                        <li>
                            <a id="HyperLink10" href="https://sum180.com/Private/Account.aspx">My Profile</a></li>

                    </ul>
                </li>
            </ul>
        </nav>


<?php
} 

else { 
// NOT logged in
?>                            
								<nav <?php echo $mm_nav; ?>>
									<button id="MM_responsive_show"><?php _e( 'Menu', THEME_NAME ); ?></button>
									<button id="MM_responsive_hide" class="btn black"><?php _e( 'Hide', THEME_NAME ); ?></button>

									<div id="MM" class="slideMenu">
										<?php wp_nav_menu( array( 'container' => false, 'fallback_cb' => 'no_menu_set', 'theme_location' => 'MainMenu' ) ); ?>
										<div style="clear:left"></div>
									</div>
																						
								</nav>
<?php
// end of NOT logged in menu code
} ?>

                             
							</div>
						</div>
					</div>
			
				</div>
				
				<?php 
				
				// Sub-Header: Headlines, taglines, etc.
				// ---------------------------------------------------------------
				
				if ($theHeader['top_sidebar']) :
					?>
					<div id="SubHeader">
						<section id="TopBanner" class="clearfix pageWrapper">
							<div class="inner-1">
								<div class="inner-2 ugc">
									<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('generated_sidebar-'.$theHeader['top_sidebar'])) : endif; ?>
									<?php //echo $sc_content; ?>
								</div>
							</div>
						</section>
					</div>
					<?php
				endif; ?>

				<?php do_action( 'bp_header' ); ?>
			</header>
			
			<?php 
			
			// Top content: Slide Show or Static Block
			// ---------------------------------------------------------------
			
			if ($theHeader['content']) :
				$pageTopBorder = $theHeader['top_container'];  // value: 'show' or 'hide'
				$pageTopClass = ($pageTopBorder) ? 'class="'.$pageTopBorder.'Shadow"' : '';
				?>
				<div id="PageTop" <?php echo $pageTopClass; ?>>
					<div class="inner-1 pageWrapper">
						<?php show_header_content($theHeader['content']); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		</div>
	</div>
</div>
<?php do_action( 'bp_after_header' ); ?>
<?php do_action( 'bp_before_container' ); ?>
