<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<div data-uk-margin="margin:uk-margin">
	<?php
	do_action( 'tribe_events_before_template' );

	// Tribe Bar
	tribe_get_template_part( 'modules/bar' );

	// Main Events Content
	tribe_get_template_part( 'month/content' );

	do_action( 'tribe_events_after_template' );
	?>
</div>