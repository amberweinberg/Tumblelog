<?php include_once('twitter.php');?>
<?php include_once('instagram.php'); ?>
<?php include_once('rss.php'); ?>

<?php 
	$feed = array();
	
	// Add tweets to feed.
	foreach($tweets as $t):
		$t['type'] = 'Twitter';
		$feed[ $t['time'] ] = $t;
	endforeach;
	
	// Add instagrams.
	for($i = 0; $i < count( $r['date'] ); $i++) :
	
		// Instagram array has each item in 5 different arrays, so make each individual item first.
		$insta = array('type' => 'Instagram');
		
		$insta['time'] = strtotime($r['date'][$i]); // Consistent format with tweets. Allows sorting.
		$insta['image'] = $r['image'][$i];
		$insta['bigimage'] = $r['bigimage'][$i];
		$insta['link'] = $r['link'][$i];
		$insta['title'] = $r['title'][$i];
		
		// Now add to array.
		$feed[ $insta['time'] ] = $insta;
		
	endfor;
	
	// Add RSS Feeds
	if ($maxitems == 0) echo '<li>Gasp! There are no posts from my dev blog.</li>';
	else
	foreach ( $rss_items as $item ) :
		$wp = array('type' => 'WP');
		$wp['time'] = strtotime($item->get_date());
		$wp['link'] = $item->get_link();
		$wp['title'] = $item->get_title();
		$feed[ $wp['time'] ] = $wp;
	endforeach;
	
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
	if ($maxitems3 == 0) echo '<li>No Foursquare updates? Well someone\'s been a hermit.</li>';
	else
	foreach ( $rss_items3 as $item3 ) :
		$four = array('type' => 'foursquare');
		$four['time'] = strtotime($item3->get_date());
		$four['description'] = $item3->get_description();
		$feed[ $four['time'] ] = $four;
	endforeach;
	
	// Add dribbble
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
	
	//Now sort them (Keys are timestamps)
	krsort($feed);
?>
<?php foreach ($feed as $i): ?>
	<li class="<?php echo $i['type']; ?>">
		<span class="icon"></span>
		<?php if($i['type'] == 'Twitter') : ?>
			<?php echo $i['text']; ?>
		<?php elseif($i['type'] == 'Instagram') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'"><img src="'.$i['image'].'" alt="'.$i['title'].'"/>'.$i['title'].'</a>' ?>
		<?php elseif($i['type'] == 'WP' || $i['type'] == 'WP2') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['title'].'</a>' ?>
		<?php elseif($i['type'] == 'foursquare') : ?>
			<?php echo 'Amber was '.$i['description'].'' ?>
		<?php elseif($i['type'] == 'dribbble') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['title'].'</a>' .$i['description'] ?>
		<?php elseif($i['type'] == 'github') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['title'].'</a>' ?>
		<?php endif; ?>

		<span class="time"><?php echo date('D jS M - g:i a', $i['time']); ?> from 
			<?php if($i['type'] == 'Twitter') : ?>
				<a title="Follow me on twitter" href="http://twitter.com/amberweinberg" target="_blank">Twitter</a>
			<?php elseif($i['type'] == 'Instagram') : ?>
				<a title="Follow me on instagram" href="http://instagram.com/amberweinberg" target="_blank">Instagram</a>
			<?php elseif($i['type'] == 'WP') : ?>
				<a title="Read the blog" href="/category/blog">the development blog</a>
			<?php elseif($i['type'] == 'WP2') : ?>
				<a title="Read the blog" href="http://www.amberweinberg.com/design" target="_blank">the design blog</a>
			<?php elseif($i['type'] == 'foursquare') : ?>
				<a title="Follow me on foursquare" href="https://foursquare.com/amberweinberg" target="_blank">Foursquare</a>
			<?php elseif($i['type'] == 'dribbble') : ?>
				<a title="Follow me on Dribbble" href="http://dribbble.com/amberweinberg/" target="_blank">Dribbble</a>
			<?php elseif($i['type'] == 'github') : ?>
				<a title="Follow me on github" href="https://github.com/amberweinberg" target="_blank">Github</a>
			<?php endif; ?>
		</span>
	</li>
<?php endforeach; ?> 
