<?php // Get RSS Feed(s)
	include_once(ABSPATH . WPINC . '/feed.php');
	
	// Get a SimplePie feed object from the specified feed source.
	$rss = fetch_feed('/feeds');
	if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
	    // Figure out how many total items there are, but limit it to 5. 
	    $maxitems = $rss->get_item_quantity(20); 
	
	    // Build an array of all the items, starting with element 0 (first element).
	    $rss_items = $rss->get_items(0, $maxitems); 
	endif;
	?>
