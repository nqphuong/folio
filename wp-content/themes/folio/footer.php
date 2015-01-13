			</div>

			<div class="col-xs-12 col-sm-12 col-md-3">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
</section>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="footeritem">
					<h4>Categories</h4>
					<?php custom_get_categories_footer(); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="footeritem">
					<h4>Keep updated?</h4>
					<p>
						You want me to keep you updates about my new work, projects or freebies? Fill in your email address and check your mailbox every month!
					</p>
					<form>
						<input type="email" class="email" placeholder="Email address">
						<button type="submit " class="btn btn-border submit" value="submit">
							<i class="fa fa-rocket"></i>Send
						</button>
					</form>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 logofooter" >
				<div><i class="fa fa-bug iconfooter"></i></div>
				<div class="footeritem">
					<p><i class="fa fa-copyright"> 2015 MR3J.COM. ALL RIGHTS RESERVED.</p></i>
				</div>
			</div>
		</div>
	</div>
</footer>

<a href="#" class="scrollToTop" style="display: block;">
	<i class="fa fa-angle-up"></i>
</a>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fitvids.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/nivo-lightbox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.nav.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/supersized.3.2.7.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>