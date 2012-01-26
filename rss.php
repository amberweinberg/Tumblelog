<?php 	

	// Using WordPress's SimplePie RSS function
	// We'll call each feed and place into an array
	
	include_once(ABSPATH . WPINC . '/feed.php');
	
	// Create the array 
	
	$feed = array();
	
	// Add tweets to feed. Twitter isn't using RSS
	
	foreach($tweets as $t):
		$t['type'] = 'Twitter';
		$feed[ $t['time'] ] = $t;
	endforeach;
	
	// Add Dev Blog RSS Feed
	
	$rss = fetch_feed('http://www.amberweinberg.com/feed');
	if (!is_wp_error( $rss ) ) :  
	    $maxitems = $rss->get_item_quantity(20); 
	    $rss_items = $rss->get_items(0, $maxitems); 
	endif;
	
	if ($maxitems == 0) echo '<li>Gasp! There are no posts from my dev blog.</li>';
	else
	foreach ( $rss_items as $item ) :
		$wp = array('type' => 'WP');
		$wp['time'] = strtotime($item->get_date());
		$wp['link'] = $item->get_link();
		$wp['title'] = $item->get_title();
		$feed[ $wp['time'] ] = $wp;
	endforeach;
	
	// Add Design Blog RSS Feed
	
	$rss2 = fetch_feed('http://www.amberweinberg.com/design/feed');
	if (!is_wp_error( $rss2 ) ) : 
	    $maxitems2 = $rss2->get_item_quantity(20); 
	    $rss_items2 = $rss2->get_items(0, $maxitems2); 
	endif;
	
	if ($maxitems2 == 0) echo '<li>Tsk tsk, someone forgot to do some writing on her design blog.</li>';
	else
	foreach ( $rss_items2 as $item2 ) :
		$wp2 = array('type' => 'WP2');
		$wp2['time'] = strtotime($item2->get_date());
		$wp2['link'] = $item2->get_link();
		$wp2['title'] = $item2->get_title();
		$feed[ $wp2['time'] ] = $wp2;
	endforeach;
	
	// Add foursquare
	
	$rss3 = fetch_feed('http://feeds.feedburner.com/FoursquareCheckinHistoryForAmberW');
	if (!is_wp_error( $rss3 ) ) : 
	    $maxitems3 = $rss3->get_item_quantity(20); 
	    $rss_items3 = $rss3->get_items(0, $maxitems3); 
	endif;
	
	if ($maxitems3 == 0) echo '<li>No Foursquare updates? Well someone\'s been a hermit.</li>';
	else
	foreach ( $rss_items3 as $item3 ) :
		$four = array('type' => 'foursquare');
		$four['time'] = strtotime($item3->get_date());
		$four['description'] = $item3->get_description();
		$feed[ $four['time'] ] = $four;
	endforeach;
	
	// Add dribbble
	
	$rss4 = fetch_feed('http://dribbble.com/amberweinberg/shots.rss');
	if (!is_wp_error( $rss4 ) ) : 
	    $maxitems4 = $rss4->get_item_quantity(20); 
	    $rss_items4 = $rss4->get_items(0, $maxitems4); 
	endif;

	if ($maxitems4 == 0) echo '<li>No Dribbbles? Well pfff.</li>';
	else
	foreach ( $rss_items4 as $item4 ) :
		$dribble = array('type' => 'dribbble');
		$dribble['time'] = strtotime($item4->get_date());
		$dribble['description'] = $item4->get_description();
		$dribble['link'] = $item4->get_link();
		$dribble['title'] = $item4->get_title();
		$feed[ $dribble['time'] ] = $dribble;
	endforeach;
	
	// Add Github
	
	$rss5 = fetch_feed('http://atom2rss.semiologic.com/?atom=https%3A%2F%2Fgithub.com%2Famberweinberg.atom');
	if (!is_wp_error( $rss5) ) : 
	    $maxitems5 = $rss5->get_item_quantity(20); 
	    $rss_items5 = $rss5->get_items(0, $maxitems5); 
	endif;
	
	if ($maxitems5 == 0) echo '<li>No Github updates…someone\'s been a lazy coder!</li>';
	else
	foreach ( $rss_items5 as $item5 ) :
		$github = array('type' => 'github');
		$github['time'] = strtotime($item5->get_date());
		$github['description'] = $item5->get_description();
		$github['link'] = $item5->get_link();
		$github['title'] = $item5->get_title();
		$feed[ $github['time'] ] = $github;
	endforeach;
	
	// Add ravelry
	
	$rss6 = fetch_feed('http://www.ravelry.com/projects/amberweinberg.rss');
	if (!is_wp_error( $rss6) ) : 
	    $maxitems6 = $rss6->get_item_quantity(20); 
	    $rss_items6 = $rss6->get_items(0, $maxitems6); 
	endif;
	
	if ($maxitems6 == 0) echo '<li>No knitting projects? Get working!</li>';
	else
	foreach ( $rss_items6 as $item6 ) :
		$ravelry = array('type' => 'ravelry');
		$ravelry['time'] = strtotime($item6->get_date());
		$ravelry['description'] = $item6->get_description();
		$ravelry['link'] = $item6->get_link();
		$ravelry['title'] = $item6->get_title();
		$feed[ $ravelry['time'] ] = $ravelry;
	endforeach;
	
	// Add Instagram
	
	$rss7 = fetch_feed('http://followgram.me/amberweinberg/rss');
	if (!is_wp_error( $rss7) ) : 
	    $maxitems7 = $rss7->get_item_quantity(20); 
	    $rss_items7 = $rss7->get_items(0, $maxitems7); 
	endif;
	
	if ($maxitems7 == 0) echo '<li>Take some pictures already!</li>';
	else
	foreach ( $rss_items7 as $item7 ) :
		$instagram = array('type' => 'Instagram');
		$instagram['time'] = strtotime($item7->get_date());
		$instagram['description'] = $item7->get_description();
		$instagram['link'] = $item7->get_link();
		$instagram['title'] = $item7->get_title();
		$feed[ $instagram['time'] ] = $instagram;
	endforeach;
	
	// Add Pinterest
	
	$rss8 = fetch_feed('http://pinterest.com/amberweinberg/feed.rss');
	if (!is_wp_error( $rss8) ) : 
	    $maxitems8 = $rss8->get_item_quantity(20); 
	    $rss_items8 = $rss8->get_items(0, $maxitems8); 
	endif;
	
	if ($maxitems8 == 0) echo '<li>I can\'t believe she hasn\'t found anything to pin!</li>';
	else
	foreach ( $rss_items8 as $item8 ) :
		$pinterest = array('type' => 'pinterest');
		$pinterest['time'] = strtotime($item8->get_date());
		$pinterest['description'] = $item8->get_description();
		$pinterest['link'] = $item8->get_link();
		$pinterest['title'] = $item8->get_title();
		$feed[ $pinterest['time'] ] = $pinterest;
	endforeach;
	
	// Add Goodreads
	
	$rss9 = fetch_feed('http://www.goodreads.com/user/updates_rss/2891681?key=1c00babdd1f0475a0db712de99f3e6b99e927d97');
	if (!is_wp_error( $rss9) ) : 
	    $maxitems9 = $rss9->get_item_quantity(20); 
	    $rss_items9 = $rss9->get_items(0, $maxitems9); 
	endif;
	
	if ($maxitems9 == 0) echo '<li>I can\'t believe she hasn\'t found anything to pin!</li>';
	else
	foreach ( $rss_items9 as $item9 ) :
		$goodreads = array('type' => 'goodreads');
		$goodreads['time'] = strtotime($item9->get_date());
		$goodreads['description'] = $item9->get_description();
		$goodreads['link'] = $item9->get_link();
		$goodreads['title'] = $item9->get_title();
		$feed[ $goodreads['time'] ] = $goodreads;
	endforeach;
	
	
	//Now sort them (Keys are timestamps)
	krsort($feed);

?>
