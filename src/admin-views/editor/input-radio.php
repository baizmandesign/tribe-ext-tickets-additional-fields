<?php
/**
 * @var WP_Post $post
 * @var array   $field_data  The field data.
 * @var string  $field_id    The field ID.
 * @var string  $field_value The field value.
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$set_default_option = false;
if ( ! $field_value ) {
	$set_default_option = true;
}
?>
<?php if ( ! empty( $field_data['label'] ) ): ?>
	<p class="custom_field_label">
		<?php echo $field_data['label']; ?>
	</p>
<?php endif; ?>
<?php if ( ! empty( $field_data['description'] ) ): ?>
	<p class="description ticket_form_right">
		<?php echo esc_html( $field_data['description'] ); ?>
	</p>
<?php endif; ?>
<?php foreach ( $field_data['options'] as $option ): ?>
	<?php $label_id = esc_attr( $field_id ) . '-' . strtolower($option); ?>
	<input type="radio" id="<?php echo $label_id; ?>" name="<?php echo esc_attr( $field_id ); ?>"
	       class="ticket_field ticket_form_right" value="<?php echo $option; ?>" <?php
	// are we setting the default option?
	if ( $set_default_option && isset( $field_data['default'] )) {
		checked( $option, $field_data['default'] );
	} else {
		checked( $field_value, $option );
	}
	?>>
	<?php if ( ! empty( $field_data['label'] ) ): ?>
		<label for="<?php echo $label_id; ?>" class="ticket_form_label ticket_form_left">
			<?php echo esc_html( $option ); ?>
		</label>
	<?php endif; ?>
<?php endforeach; ?>


