<?php $cat = isset($_GET['cat']) ? $_GET['cat'] : 0; ?>
<?php get_header(); ?>
    <?php while(have_posts()): the_post(); ?>
    <?php if(is_category($cat)): ?>
        <article class="blog-post">
            <a href="<?php echo get_site_url() . '?p=' . get_the_ID(); ?>" class="block-thumb">
                <div class="block-image">
                    
                    <div class="overlay">
                        <div class="icon">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                
                    <!--<img src="wp-content/themes/folio/images/thumbs/image1.jpg" alt="portfolio item">-->
					<?php if(has_post_thumbnail(get_the_ID())): ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php else: ?>
                        <?php custom_the_post_thumbnail(); ?>
					<?php endif; ?>
                </div>
            </a>
            <div class="blogtitle">
                <h1>
                    <a href="<?php the_permalink(); ?>" title="blogpost">
                        <!--Creative Portfolio for agency's or freelancers.-->
                        <?php the_title(); ?>
                    </a>
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
                <!--<a href="<?php comments_link();?>">-->
                    <?php comments_number('0 Comments', '1 Comment', '% responses'); ?>
                <!--</a>-->
                </div>
            </div>
            <div class="bloglead">
                <!--<p>-->
                <!--    Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.-->
                <!--</p>-->
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-border">
                <i class="fa fa-rocket"></i>
                Read more
            </a>
        </article>
    <?php endif; ?>
    <?php endwhile;?>
    <?php custom_pagination_nav(); ?>
<?php get_footer(); ?>