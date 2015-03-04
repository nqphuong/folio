<?php get_header(); ?>
    <?php while(have_posts()): the_post(); ?>   
        <!-- begin blog post -->
				<article class="blog-post">
					<!--<img src="../images/thumbs/image1.jpg" alt="portfolio item">-->
					<?php if(has_post_thumbnail(get_the_ID())): ?>
						<?php the_post_thumbnail('full'); ?>
					<?php endif; ?>
                    <div class="blogtitle">e
						<h1>
							<a href="<?php the_permalink(); ?>" title="blogpost">
								<?php the_title(); ?>
							</a>
							<?php $categories = wp_get_post_categories(get_the_ID());?>
							<?php foreach($categories as $category):?>
								<?php $term = get_term_by('id', $category, 'category'); ?>
								<a href="<?php echo get_site_url() . '/cat/' . $term->slug; ?>" class="postcat"><?php echo $term->name; ?></a>
							<?php endforeach; ?>
						</h1>
					</div>
					<div class="blogdata">
						<div>
						<!--<a href="#" class="item">-->
							<?php the_time('j M Y'); ?>
						<!--</a>-->
						<span class="seperator">/</span>
						<!--<a href="#" class="item">-->
							Blogposts
						<!--</a>-->
						<span class="seperator">/</span>
						<!--<a href="<?php comments_link(); ?>" class="item">-->
							<?php comments_number('0 Comments', '1 Comments', '% responses'); ?>
						<!--</a>-->
						<span class="seperator">/</span>
						<!--<a href="#" class="item">-->
							<i class="fa fa-heart-o"></i>
							Appreciate
						<!--</a>-->
						</div>
					</div>

					<div class="blogcontent">
                        <?php
							$content = get_post(get_the_ID())->post_content;
							$final_content = '';
							if(strpos($content, '[image-show]') !== false){
								$final_content = BBC_Imageshow($content);
							}
							
							if(strpos($content, '[share]') !== false){
								$final_content = BBC_Sharebox(($final_content == '') ? $content : $final_content);
							}
							
							if($final_content != ''){
								echo $final_content;
							} else {
								the_content();
							}
							
						?>
                        <?php //the_content();?>
						<?php //echo $final_content; ?>
					</div>

				</article>
				<!-- end blog post -->
    <?php endwhile;?>
    <?php comments_template(); ?>
<?php get_footer(); ?>

<script>
document.write('<script src="//sharebutton.net/plugin/sharebutton.php?type=vertical&u=' + encodeURIComponent(document.location.href) + '"></scr' + 'ipt>');
</script>