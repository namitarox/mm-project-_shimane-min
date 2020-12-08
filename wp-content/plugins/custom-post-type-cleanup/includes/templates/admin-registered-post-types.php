<div class="wrap">
	<h1><?php _e( 'Custom Post Type Cleanup', 'custom-post-type-cleanup' ); ?></h1>
	<?php 
		if ($notice) :
			echo $notice;
		else :
	?>
		<p>
			<?php _e('This plugin has registed all unused custom post types for a limited period of time.', 'custom-post-type-cleanup'); ?>
		</p>
	<?php endif; ?>
	<p>
		<?php _e( 'Inspect and delete posts from unused custom post types by going to their wp-admin page.', 'custom-post-type-cleanup' ); ?><br/>
		(<?php echo $doc_link; ?>)
	</p>
	<h3>
		<?php _e( 'Registered unused custom post types', 'custom-post-type-cleanup' ); ?>
	</h3>
	<p>
		<?php _e( 'The following unused custom post types are registered by this plugin.', 'custom-post-type-cleanup' ); ?>
	</p>
	<ul style="padding-left: 2em; font-size:14px; list-style-type: disc;">
		<?php foreach ( $transient_post_types as $post_type ) : ?>
			<li><a href="<?php echo admin_url( 'edit.php?post_type=' . $post_type ); ?>"><?php echo $post_type; ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php if ( $minutes_left ) : ?>
		<p>
			<?php if ( 1 === (int) $minutes_left ) : ?>
				<?php
					/* translators: %d: 1 minute left */ 
					printf( __( '<strong>%d minute</strong> to go before these post type are no longer registered.', 'custom-post-type-cleanup' ), $minutes_left ); 
				?>

			<?php elseif ( $minutes_left > 1 ) : ?>
				<?php
					/* translators: %d: more than one minutes left */
					printf( __( '<strong>%d minutes</strong> to go before these post types are no longer registered.', 'custom-post-type-cleanup' ), $minutes_left );
				?>
			<?php endif; ?>
		</p>
		<hr>
		<h3 id="unregister">
			<?php _e( 'Stop registering unused custom post types', 'custom-post-type-cleanup' ); ?>
		</h3>
		<p>
			<?php _e('To stop registering the unused custom post types click the button below.', '') ?>
		</p>
		<form method="post" action="">
			<?php wp_nonce_field( 'custom_post_type_cleanup_nonce', 'security' ); ?>
			<p>
				<input class="button button-primary" name="cptc_unregister" value="<?php _e( 'Stop registering unused custom post types now', 'custom-post-type-cleanup' ); ?>" type="submit">
			</p>
		</form>
	<?php endif; ?>
	<hr>
	<p>
		<?php
			/* translators: %s: WordPress plugin repository link */
			printf( __( 'This page is generated by the %s plugin.', 'custom-post-type-cleanup' ), $plugin_link );
		?>
	</p>
</div>
