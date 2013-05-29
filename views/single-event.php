<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * This view contains the filters required to create an effective single event view.
 *
 * You can recreate an ENTIRELY new single event view by doing a template override, and placing
 * a single-event.php file in a tribe-events/ directory within your theme directory, which
 * will override the /views/single-event.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back"><a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'tribe-events-calendar' ) ?></a></p>

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<?php the_title( '<h2 class="tribe-events-single-event-title summary">', '</h2>' ); ?>

	<div class="tribe-events-schedule updated published tribe-clearfix">
		<h3><?php echo tribe_events_event_schedule_details(), tribe_events_event_recurring_info_tooltip(); ?><?php  if ( tribe_get_cost() ) :  ?><span class="tribe-events-divider">|</span><span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span><?php endif; ?></h3>
	</div>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_get_prev_event_link( '&laquo; %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_get_next_event_link( '%title% &raquo;' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-header -->

	<!-- Event featured image -->
	<?php echo tribe_event_featured_image(); ?>

	<!-- Event content -->
	<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
	<div class="tribe-events-single-event-description tribe-events-content entry-content description">
		<?php the_content(); ?>
	</div><!-- .tribe-events-single-event-description -->
	<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

	<!-- Event meta -->
	<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
		<?php tribe_events_the_single_event_meta() ?>
	<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

	<!-- Event footer -->
    <div id="tribe-events-footer">
		<!-- Navigation -->
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_get_prev_event_link( '&laquo; %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_get_next_event_link( '%title% &raquo;' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
