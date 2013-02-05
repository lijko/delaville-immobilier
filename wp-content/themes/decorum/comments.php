<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('Enter your password to view comments.',TS_DOMAIN); ?></p>

			<?php
			return;
		}
	}
?>

<?php if(have_comments()) : ?>

	<div id="comments">
	
		<?php if (!empty($comments_by_type['comment']) && empty($comments_by_type['ping'])) : ?>
		
		<div class="section-title comments-title">
		
			<?php $comments_count = count($comments_by_type['comment']); ?>
			<h3><?php echo $comments_count; ?> <?php if($comments_count==1) : _e('Comment',TS_DOMAIN); else : _e('Comments',TS_DOMAIN); endif; ?><a href="#respond" class="action-link"><?php _e('Add yours', TS_DOMAIN) ?></a></h3>
			
		</div>
	
		<?php endif; ?>
	
		<?php if(!empty($comments_by_type['comment'])) : ?>
						
		<ul id="commentlist" class="clearfix">
		    <?php wp_list_comments('type=comment&callback=ts_comments'); ?>
		</ul>
		
		<?php endif; ?>
		
		<?php if(!empty($comments_by_type['pings'])) : ?>
		
		<div id="trackbacks">
		
			<div class="section-title">

				<?php $trackbacks_count = count($comments_by_type['pings']); ?>
				<h3><?php echo $trackbacks_count; ?> <?php if($trackbacks_count==1) : _e('Trackback',TS_DOMAIN); else : _e('Trackbacks',TS_DOMAIN); endif; ?></h3>

			</div>
		
			<ul id="trackbacklist" class="clearfix">
			    <?php wp_list_comments('type=pings&callback=ts_pings'); ?>
			</ul>
				
		</div><!-- end trackbacks-list -->
	
		<?php endif; // endif trackbacks ?>
	
	</div><!-- end comments -->
	
	<?php endif; // endif comments ?>
	
	<?php if($post->comment_status=='open') : ?>
	
	<div id="commentform" class="clear">
	
		<div id="respond">
		
			<div class="section-title comments-title">
		
			<h3><?php comment_form_title(__('Leave a Reply',TS_DOMAIN)); ?><?php cancel_comment_reply_link('<span class="action-link">'.__('Cancel',TS_DOMAIN).'</span>'); ?></span></h3>
			
			</div>
			
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p class="locked"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.',TS_DOMAIN), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
			<?php else : ?>
			
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="clearfix">
			
			    <?php if ( $user_ID ) : ?>
			    
			    <p class="comment-locked"><a href="<?php echo wp_logout_url(); ?>" class="action-link" title="<?php _e('Log out of this account',TS_DOMAIN) ?>"><?php _e('Log out',TS_DOMAIN); ?></a></p>
			    
			    <?php else : ?>
			    
			    <p>
			    	<label><?php _e('Your name',TS_DOMAIN); ?><br />
			    	<input type="text" name="author" id="name" class="text required" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" /></label>
			    </p>
			    
			    <p>
			    	<label><?php _e('Your email',TS_DOMAIN); ?><br />
			    	<input type="text" name="email" id="email" class="text required" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" /></label>
			    </p>
			    
			    <p>
			    	<label><?php _e('Your website',TS_DOMAIN); ?><br />
			    	<input type="text" name="url" id="website" class="text" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" /></label>
			    </p>
			    
			    <?php endif; ?>
			    
			    <p style="margin-bottom:20px">
			    	<label><?php _e('Your comment',TS_DOMAIN); ?><br />
			    	<textarea name="comment" id="message" class="text required" tabindex="4" cols="4" rows="10"></textarea></label>
			    </p>
			    
			    <p class="left"><input type="submit" class="btn submit" value="<?php _e('Submit comment',TS_DOMAIN); ?>" tabindex="5" /></p>
						    
				<p id="commenterror" class="left"><?php _e('Please complete required fields',TS_DOMAIN); ?></p>
			    
			    <?php comment_id_fields(); ?>
			    
			    <?php do_action('comment_form', $post->ID); ?>
	
			</form>
			
			<?php endif; // If registration required and not logged in ?>
		
		</div><!-- end respond -->
	
	</div><!-- end commentform -->

<?php endif; // if you delete this the sky will fall on your head ?>