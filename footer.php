	<div id="footer">
		<div id="footer-content">
			<div id="footer-top">
				<div class="container">
					<div id="footer-widgets" class="clearfix">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
						<?php endif; ?>
					</div> <!-- end #footer-widgets -->	
				</div> <!-- end .container -->
			</div> <!-- end #footer-top -->	
		</div> <!-- end #footer-content -->	
	</div> <!-- end #footer -->
	
	<div id="footer-bottom">
		<div class="container clearfix">
			<?php 
				$menuClass = 'bottom-nav';
				$footerNav = '';
			
				if (function_exists('wp_nav_menu')) $footerNav = wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false, 'depth' => '1' ) );
				if ($footerNav == '') show_page_menu($menuClass);
				else echo($footerNav); 
			?>
			
			<p id="copyright"><?php esc_html_e('Designed by ','Webly'); ?> <a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant WordPress Themes</a> | <?php esc_html_e('Powered by ','Webly'); ?> <a href="http://www.wordpress.org">WordPress</a></p>
		</div> <!-- end .container -->
	</div> <!-- end #footer-bottom -->
			
	<?php get_template_part('includes/scripts'); ?>
	<?php wp_footer(); ?>
</body>
</html>