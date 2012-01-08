<?php 
// Little hack to use WordPress functions quickly (Remove when this is a full plugin or in theme)
// This file should be in a folder, and the folder is in the main WordPress folder (i.e. same place as wp-config.php etc. )
include('../wp-blog-header.php');
?>

<?php include_once('twitter.php');?>
<?php include_once('instagram.php'); ?>

<?php 
	$feed = array();
	
	// Add tweets to feed.
	foreach($tweets as $t):
		$t['type'] = 'tweet';
		$feed[ $t['time'] ] = $t;
	endforeach;
	
	// Add instagrams.
	for($i = 0; $i < count( $r['date'] ); $i++) :
	
		// Instagram array has each item in 5 different arrays, so make each individual item first.
		$insta = array('type' => 'instagram');
		
		$insta['time'] = strtotime($r['date'][$i]); // Consistent format with tweets. Allows sorting.
		$insta['image'] = $r['image'][$i];
		$insta['bigimage'] = $r['bigimage'][$i];
		$insta['link'] = $r['link'][$i];
		$insta['title'] = $r['title'][$i];
		
		// Now add to array.
		$feed[ $insta['time'] ] = $insta;
		
	endfor;
	
	// Now sort them (Keys are timestamps)
	krsort($feed);
?>

<ul>
<?php foreach ($feed as $i): ?>
	<li>
		<ul>
			<li>Type: <?php echo $i['type']; ?></li>
			<li>Time: <?php echo date('D jS M - g:i a', $i['time']); ?></li>
			<?php if($i['type'] == 'tweet') : ?>
				<li><?php echo $i['text']; ?></li>
			<?php elseif($i['type'] == 'instagram') :
				// Do something with instagram :)
			endif; ?>
		</ul>
	</li>
<?php endforeach; ?> 
</ul>
