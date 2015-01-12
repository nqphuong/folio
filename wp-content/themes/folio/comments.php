<?php
$comments = get_approved_comments(get_the_ID());
?>
					<!-- begin comment area -->
					<div class="comments">
						<h4><?php echo count($comments); ?> comments on "<?php the_title(); ?>."</h4>
						<ul>
							<?php custom_get_comment_child(0, $comments); ?>
						</ul>
					</div>
					<!-- end comment area -->

					<!-- begin reply form -->
					<a id="replyzone"></a>
					<div class="replysection">
						<h4>Leave a Reply</h4>
						<form name="reply" class="replyform" method="post">
							<p>Your email address will not be published. Required fields are marked *</p>
							<input class="author" type="text" placeholder="Your Name" value="" size="30" aria-required="true">
							<p></p>
							<input class="email" type="text" placeholder="Your Email" value="" size="30" aria-required="true">
							<p></p>
							<textarea class="write-comment" cols="45" placeholder="Write your comment" aria-required="true"></textarea>
							<input id="object_id" type="hidden" value="<?php echo get_the_ID();?>"/>
							<input id="comment_parent_id" type="hidden" value="0"/>
							<button class="btn btn-border">
								<i class="fa fa-rocket"></i>
								Post Comment
							</button>
						</form>
					</div>
					<!-- end reply form -->