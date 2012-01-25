<?php 	
	include_once(ABSPATH . WPINC . '/feed.php');
	
	$rss = fetch_feed('http://www.amberweinberg.com/feed');
	if (!is_wp_error( $rss ) ) :  
	    $maxitems = $rss->get_item_quantity(20); 
	    $rss_items = $rss->get_items(0, $maxitems); 
	endif;
	
	$rss2 = fetch_feed('http://www.amberweinberg.com/design/feed');
	if (!is_wp_error( $rss2 ) ) : 
	    $maxitems2 = $rss2->get_item_quantity(20); 
	    $rss_items2 = $rss2->get_items(0, $maxitems2); 
	endif;
	
	$rss3 = fetch_feed('http://feeds.feedburner.com/FoursquareCheckinHistoryForAmberW');
	if (!is_wp_error( $rss3 ) ) : 
	    $maxitems3 = $rss3->get_item_quantity(20); 
	    $rss_items3 = $rss3->get_items(0, $maxitems3); 
	endif;
	
	$rss4 = fetch_feed('http://dribbble.com/amberweinberg/shots.rss');
	if (!is_wp_error( $rss4 ) ) : 
	    $maxitems4 = $rss4->get_item_quantity(20); 
	    $rss_items4 = $rss4->get_items(0, $maxitems4); 
	endif;
	
	$rss5 = fetch_feed('http://atom2rss.semiologic.com/?atom=https%3A%2F%2Fgithub.com%2Famberweinberg.atom');
	if (!is_wp_error( $rss5) ) : 
	    $maxitems5 = $rss5->get_item_quantity(20); 
	    $rss_items5 = $rss5->get_items(0, $maxitems5); 
	endif;
?>
