<script type="text/javascript">
jQuery(document).ready(function($){

	$('.action-toggle').click(function () {
	
		if($('#tellafriend').is(':visible')) {
			$('.widget_ts_contact').height($('#tellafriend-wrap').height() + 60);
	    	$(this).fadeOut('fast', function() {					
	    		$('#contact-wrap').fadeOut(200, function() {  			
	    			$('#tellafriend-wrap').fadeIn(200);
	    		});
	    		$('#backtocontact').fadeIn((200));
	    	});
	    } else {
	    	$('.widget_ts_contact').height($('#contact-wrap').height() + 60);
	    	$(this).fadeOut((200), function() {
	    		$('#tellafriend-wrap').fadeOut((200), function() {
	    			$('#contact-wrap').fadeIn((200));
	    		});
	    		$('#tellafriend').fadeIn((200));
	    	});
	    }
	    
	    return false;
	
	});
	        
});
</script>

<a href="#" id="tellafriend" class="action-link action-toggle"><?php _e('Tell a friend', TS_DOMAIN); ?></a>
<a href="#" id="backtocontact" class="action-link action-toggle" style="display:none"><?php _e('Contact form', TS_DOMAIN); ?></a>

<div id="tellafriend-wrap" style="display:none">

<?php 
//If the form is submitted
if(isset($_POST['submitted-friend'])) {

	global $post;

    //Check to see if the honeypot captcha field was filled in
    if(trim($_POST['checking-friend']) !== '') {
    	$captchaError = true;
    } else {
    
    	//Check to make sure that the name field is not empty
    	if(trim($_POST['contact-name']) === '') {
    		$nameError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('This field is required!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else {
    		$name_friend = trim($_POST['contact-name']);
    	}
    	
    	//Check to make sure sure that a valid email address is submitted
    	if(trim($_POST['email-friend']) === '')  {
    		$emailError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('This field is required!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email-friend']))) {
    		$emailError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('Please enter a valid email!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else {
    		$email_friend = trim($_POST['email-friend']);
    	}
    	
    	//Check to make sure sure that a valid email address is submitted
    	if(trim($_POST['email-from']) === '')  {
    		$emailFromError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('This field is required!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email-from']))) {
    		$emailFromError = '<div class="ts-info info-icon" style="margin-top:-11px"><span class="icon-error"></span>'.__('Please enter a valid email!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else {
    		$email_from = trim($_POST['email-from']);
    	}
    		
    	//Check to make sure comments were entered	
    	if(trim($_POST['message-friend']) === '') {
    		$commentError = '<div class="ts-info info-icon" style="margin-top:-21px"><span class="icon-error"></span>'.__('This field is required!', TS_DOMAIN).'</div>';
    		$hasError = true;
    	} else {
    		if(function_exists('stripslashes')) {
    			$comments_friend = stripslashes(trim($_POST['message-friend']));
    		} else {
    			$comments_friend = trim($_POST['message-friend']);
    		}
    	}
    		
    	//If there is no error, send the email
    	if(!isset($hasError)) {

    		$subject = $name_friend.' '.__('recommends you', TS_DOMAIN).' ['.get_the_title(get_the_ID()).']';
    		$body = __('Name',TS_DOMAIN).": $name_friend \n\n".__('Message',TS_DOMAIN).":\n\n$comments_friend";
   		$body .= "\n\n".__('Property',TS_DOMAIN).": ".get_the_title($post->ID)." (".get_permalink(get_the_ID()).")";
    		$headers = 'From: '.get_bloginfo('name').' <'.$email_from.'>' . "\r\n" . 'Reply-To: ' . $email_from;
    		
    		wp_mail($email_friend, $subject, $body, $headers);

    		$emailSent = true;

    	}
    }
} ?>

<script type="text/javascript">
jQuery(document).ready(function($){
    $('form#ts-tellafriend-form').submit(function() {
    	$('form#ts-tellafriend-form .error').remove();
    	var hasError = false;
    	$('#ts-tellafriend-form .required').each(function() {
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
    		$('form#ts-tellafriend-form #contact-footer').fadeOut('normal', function() {
    			$(this).parent().append('<p><img src="<?php echo TS_IMG; ?>/loading.gif" alt="<?php _e('Loading', TS_DOMAIN); ?>&hellip;" height="22" width="22" /></p>');
    		});
    		var formInput = $(this).serialize();
    		$.post($(this).attr('action'),formInput, function(data){
    			$('.widget_ts_contact').height('auto');
    			$('form#ts-tellafriend-form').slideUp("fast", function() {				   
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
    
    <form action="<?php the_permalink(); ?>" id="ts-tellafriend-form" method="post">
        	
    <p>
    	<label for="name-friend"><?php _e('Your name',TS_DOMAIN); ?></label>:<br />
    	<input type="text" name="contact-name" id="name-friend" value="<?php if(isset($_POST['contact-name'])) echo $_POST['contact-name'];?>" class="text required" />
        <?php if($nameError != '') echo $nameError; ?>
    </p>
    
    <p>
        <label for="email-from"><?php _e('Your email',TS_DOMAIN); ?></label>:<br />
        <input type="text" name="email-from" id="email-from" value="<?php if(isset($_POST['email-from']))  echo $_POST['email-from'];?>" class="text required email" />
        <?php if($emailFromError != '') echo $emailFromError; ?>
    </p>
        	
    <p>
        <label for="email-friend"><?php _e('Friend\'s email',TS_DOMAIN); ?></label>:<br />
        <input type="text" name="email-friend" id="email-friend" value="<?php if(isset($_POST['email-friend']))  echo $_POST['email-friend'];?>" class="text required email" />
        <?php if($emailError != '') echo $emailError; ?>
    </p>
    
    <p>
        <label for="message-friend"><?php _e('Your message',TS_DOMAIN); ?></label>:<br />
        <textarea name="message-friend" id="message-friend" rows="20" cols="30" class="text"><?php if(isset($_POST['message-friend'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message-friend']); } else { echo $_POST['message-friend']; } } ?></textarea>
        <?php if($commentError != '') echo $commentError; ?>
    </p>
    
    <div id="tellafriend-footer" class="clearfix">
        
        <label class="checking-friend"><?php _e('If you want to submit this form, do not enter anything in this field!',TS_DOMAIN); ?><br />
        <input type="text" name="checking-friend" id="checking-friend" class="contact-checking" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></label>
        
        <p class="contact-buttons">
        	<input type="hidden" name="submitted-friend" id="submitted-friend" value="true" />
        	<input type="submit" class="btn submit" value="<?php _e('Submit message',TS_DOMAIN); ?>" />
        </p>
    
    </div>
    
    </form>				
    	
<?php } ?>

</div>