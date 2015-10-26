<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?>

	</div><!-- #content -->
	
	<div class="footer-spread">
		<div class="center-banner">
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<div class="third">
						<h2>Navigation</h2>
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<!--Old button code-->
							<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">//<?php esc_html_e( 'Primary Menu', 'starter' ); ?></button>-->
							
							<!--This seems like a job for Luke-->
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav><!-- #site-navigation -->
					</div>
					<div class="third">
						<div id="secondary" class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
						</div><!-- #secondary -->
					</div>
					<div class="third">
						<div class="social">
							<h2>Follow Us</h2>
							<ul>
								<li><a href="#">Instagram</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Facebook</a></li>
							</ul>
						</div>
					</div>
				</div><!-- .site-info -->
				<div class="copyright">
					<p>Breathe in. Inspire stewardship. Participate.</p>
					<h6>Copyright Oswego Bystander 2015</h6>
				</div>
			</footer><!-- #colophon -->
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
