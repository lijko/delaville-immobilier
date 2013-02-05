<?php

	// let user manually exclude specific images
	
	$gallery_exclude = get_post_meta($post->ID, 'gallery_exclude', true);
	
	// get all post attachments
	
	$attachments_args = array(
		'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'exclude' => $gallery_exclude
	);
	$attachments = get_children($attachments_args);	
	
	// photo gallery with custom field 'gallery'
	// (comma-separated media file IDs => 12,34,69)
	
	$gallery = get_post_meta($post->ID, 'gallery', true);
	
	// let user manually change gallery title
	
	$gallery_title = get_post_meta($post->ID, 'gallery_title', true);
	
	if($gallery) : $images = explode(',',$gallery);
	
?>

<div id="ts-gallery" class="box-wrap clearfix clear">

	<?php if(!empty($gallery_title)) : ?>
    <h2 class="section-title"><?php echo $gallery_title; ?></h2>
    <?php endif; ?>

    <?php foreach ($images as $image_id) : $src = wp_get_attachment_image_src($image_id, 'full'); $image_post = get_post($image_id); ?>
    <div class="ts-box box-4">
		<a href="<?php echo $src[0]; ?>" title="<?php echo $image_post->post_content; ?>" rel="prettyPhoto[ts-gallery]"><?php echo wp_get_attachment_image($image_id, 'post-thumbnail'); ?></a>
    </div>   
	<?php endforeach; ?>

</div><!-- end gallery -->

<?php
	// photo gallery with attachments
	elseif($attachments && get_post_meta($post->ID, 'attachments', true)) :
?>
            
<div id="ts-gallery" class="box-wrap clearfix clear">

    <?php if(!empty($gallery_title)) : ?>
    <h2 class="section-title"><?php echo $gallery_title; ?></h2>
    <?php endif; ?>
        
    <?php foreach ($attachments as $attachment_id => $attachment) : $src = wp_get_attachment_image_src($attachment_id, 'full'); ?>
    <div class="ts-box box-4">
    	<a href="<?php echo $src[0]; ?>" title="<?php echo $attachment->post_content; ?>" rel="prettyPhoto[ts-gallery]"><?php echo wp_get_attachment_image($attachment_id, 'post-thumbnail'); ?></a>
    </div>
    <?php endforeach; ?>

</div><!-- end attachments -->

<?php endif; // endif gallery ?>