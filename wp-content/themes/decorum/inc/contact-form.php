<div id="contact-wrap">

<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	global $post;

    //Check to see if the honeypot captcha field was filled in
    if(trim($_POST['checking']) !== '') {
    	$captchaError = true;
    } else {
    
    	//Check to make sure that the name field is not empty
    	if(trim($_POST['contact-name']) === '') {
    		$nameError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('This field is required!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else {
    		$name = trim($_POST['contact-name']);
    	}
    	
    	//Check to make sure sure that a valid email address is submitted
    	if(trim($_POST['email']) === '')  {
    		$emailError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('This field is required!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
    		$emailError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('Please enter a valid email!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else {
    		$email = trim($_POST['email']);
    	}
    		
    	//Check to make sure comments were entered	
    	if(trim($_POST['message']) === '') {
    		$commentError = '<div class="ts-info info-icon" style="margin-top:-21px"><span class="icon-error"></span>'.__('This field is required!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else {
    		if(function_exists('stripslashes')) {
    			$comments = stripslashes(trim($_POST['message']));
    		} else {
    			$comments = trim($_POST['message']);
    		}
    	}
    		
    	//If there is no error, send the email
    	if(!isset($hasError)) {

    		$emailTo = (!empty($email_custom)) ? $email_custom : get_the_author_meta('email');
    		if(get_post_meta(get_the_ID(), 'contact_email', true)) $emailTo = get_post_meta(get_the_ID(), 'contact_email', true);
    		if(get_post_type(get_the_ID())=='page') {
    			$subject = '['.__('Contact', TS_DOMAIN).'] '.get_the_title(get_the_ID());
    		} else {
    			$subject = '['.__('Contact', TS_DOMAIN).'] '.get_the_title(get_the_ID()).' (ID: '.ts_get_option('ts_prefix').get_the_ID().')';
    		}
    		$sendCopy = trim($_POST['copy']);
    		$body = __('Name',TS_DOMAIN).": $name \n\n".__('Email',TS_DOMAIN).": $email \n\n".__('Message',TS_DOMAIN).":\n\n$comments";
    		if(get_post_type(get_the_ID())!='page') {
    			$body .= "\n\n".__('Property',TS_DOMAIN).": ".get_the_title($post->ID)." (".get_permalink(get_the_ID()).")";
    		}
    		$headers = 'From: '.get_bloginfo('name').' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
    		
    		wp_mail($emailTo, $subject, $body, $headers);

    		if($sendCopy == true) {
    			if(get_post_type(get_the_ID())!='page') {
    				$subject = '['.__('Copy', TS_DOMAIN).'] '.get_the_title(get_the_ID()).' (ID: '.ts_get_option('ts_prefix').get_the_ID().')';
    			} else {
    				$subject = '['.__('Copy', TS_DOMAIN).'] '.get_the_title(get_the_ID());
    			}
    			$headers = 'From: '.get_bloginfo('name').' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $emailTo;
    			wp_mail($email, $subject, $body, $headers);
    		}

    		$emailSent = true;

    	}
    }
} ?>

<script type="text/javascript">
jQuery(document).ready(function($){
    $('form#ts-contact-form').submit(function() {
    	$('form#ts-contact-form .error').remove();
    	var hasError = false;
    	$('#ts-contact-form .required').each(function() {
    		if(jQuery.trim($(this).val()) == '') {
    			$('.widget_ts_contact').height('auto');
    			var labelText = $(this).prev().prev('label').text();
    			$(this).parent().append('<div class="ts-info info-icon"><span class="icon-error"></span><?php _e('This field is required!', TS_DOMAIN); ?></div>');
    			hasError = true;
    		} else if($(this).hasClass('email')) {
    			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    			if(!emailReg.test(jQuery.trim($(this).val()))) {
    				$('.widget_ts_contact').height('auto');
    				var labelText = $(this).prev().prev('label').text();
    				$(this).parent().append('<div class="ts-info info-icon"><span class="icon-error"></span><?php _e('Please enter a valid email!', TS_DOMAIN); ?></div>');
    				hasError = true;
    			}
    		}
    	});
    	if(!hasError) {
    		$('form#ts-contact-form #contact-footer').fadeOut('normal', function() {
    			$(this).parent().append('<p><img src="<?php echo TS_IMG; ?>/loading.gif" alt="<?php _e('Loading', TS_DOMAIN); ?>&hellip;" height="22" width="22" /></p>');
    		});
    		var formInput = $(this).serialize();
    		$.post($(this).attr('action'),formInput, function(data){
    			$('form#ts-contact-form').slideUp("fast", function() {
    				$('.widget_ts_contact').height('auto');			   
    				$(this).before('<div class="ts-info info-icon"><span class="icon-checked"></span><?php _e('<strong>Thanks!</strong> Your email was successfully sent.', TS_DOMAIN); ?></div>');
    			});
    		});
    	}
    	
    	return false;
    	
    });	            
});
</script>

<?php if(isset($emailSent) && $emailSent == true) { ?>

    <div class="ts-info info-icon">
    	<span class="icon-checked"></span>
    	<?php _e('<strong>Thanks!</strong> Your email was successfully sent.', TS_DOMAIN); ?>
    </div>

<?php } else { ?>

	<?php if(!empty($text)) : ?>
		<p><?php echo nl2br($text); ?></p>
	<?php endif; ?>
    
    <?php if(isset($hasError) || isset($captchaError)) { ?>
        <div class="ts-info info-icon">
        	<span class="icon-error"></span>
        	<?php _e('There was an error submitting the form!', TS_DOMAIN); ?>
        </div>
    <?php } ?>
    
    <form action="<?php the_permalink(); ?>" id="ts-contact-form" method="post">
    
    <p>
    	<label for="contact-name"><?php _e('Your name',TS_DOMAIN); ?></label>:<br />
    	<input type="text" name="contact-name" id="contact-name" value="<?php if(isset($_POST['contact-name'])) echo $_POST['contact-name'];?>" class="text required" />
        <?php if($nameError != '') echo $nameError; ?>
    </p>
        	
    <p>
        <label for="contact-email"><?php _e('Your email',TS_DOMAIN); ?></label>:<br />
        <input type="text" name="email" id="contact-email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="text required email" />
        <?php if($emailError != '') echo $emailError; ?>
    </p>
        	
    <p class="p-message">
        <label for="contact-message"><?php _e('Your message',TS_DOMAIN); ?></label>:<br />
        <textarea name="message" id="contact-message" rows="20" cols="30" class="text required"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
        <?php if($commentError != '') echo $commentError; ?>
    </p>
    
    <div id="contact-footer" class="clearfix">
        
        <label class="contact-checking"><?php _e('If you want to submit this form, do not enter anything in this field!',TS_DOMAIN); ?><br />
        <input type="text" name="checking" id="checking" class="contact-checking" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></label>
        
        <p class="contact-buttons left">
        	<input type="hidden" name="submitted" id="submitted" value="true" />
        	<input type="submit" class="btn submit" value="<?php _e('Submit message',TS_DOMAIN); ?>" />
        </p>
    
        <p class="left">
        	<label><input type="checkbox" name="copy" id="contact-copy" value="true"<?php if(isset($_POST['copy']) && $_POST['copy'] == true) echo ' checked="checked"'; ?> /> <?php _e('Send copy to your email',TS_DOMAIN); ?></label>
        </p>
    
    </div>
    
    </form>				
    	
<?php } ?>

</div>