<div class="padder">
<form action="<?php bp_messages_form_action('compose' ); ?>" method="post" id="send_message_form" class="standard-form" enctype="multipart/form-data">

	<?php do_action('bp_before_messages_compose_content'); ?>

	<div class="row">
		<div class="column">
			<div class="editfield">
				<label for="send-to-input">To <span>(username)</span></label>
				<input type="text" name="send-to-input" class="send-to-input" id="send-to-input" <?php if($_GET['r']) : echo ' value="'.$_GET['r'].'"'; endif; ?> />
			</div>	
		</div>
	</div>
	<?php if(bp_current_user_can('bp_moderate')) : ?>
	<div class="row">
		<div class="column">
			<div class="editfield checkbox">
				<label for="send-notice"><input type="checkbox" id="send-notice" name="send-notice" value="1" /> <?php _e("This is a notice to all users.", 'buddypress'); ?></label>
			</div>	
		</div>
	</div>
	<?php endif; ?>

	<div class="row">
		<div class="column">
			<div class="editfield">
				<label for="subject"><?php _e('Subject', 'buddypress'); ?></label>
				<input type="text" name="subject" id="subject" value="<?php bp_messages_subject_value(); ?>" />
			</div>	
		</div>
	</div>
	
	<div class="row">
		<div class="column">
			<div class="editfield">
				<label for="message_content"><?php _e('Message', 'buddypress'); ?></label>
				<textarea name="content" id="message_content" rows="15" cols="40"><?php bp_messages_content_value(); ?></textarea>
			</div>
		</div>
	</div>

	<input type="hidden" name="send_to_usernames" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames(); ?>" />

	<?php do_action('bp_after_messages_compose_content'); ?>

	<div class="submit">
		<input type="submit" value="<?php esc_attr_e( "Send Message", 'buddypress' ); ?>" name="send" id="send" />
	</div>

	<?php wp_nonce_field('messages_send_message'); ?>
</form>

<script type="text/javascript">
	document.getElementById("send-to-input").focus();
</script>
</div>