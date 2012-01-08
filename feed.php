<?php include_once('twitter.php');?>
<?php include_once('instagram.php');?>

<H2>Parsed together</H2>

<?php 
	$feed = (array());
?>
	
<?php foreach ($feed as $item): ?>
	test
<?php endforeach; ?> 

<h2>Parsed Alone</h2>

<?php 

foreach($tweets as $t) : ?>
	<li class="twitter"><?php echo $t['text']; ?><span class="tweet-time"><?php echo human_time_diff($t['time'], current_time('timestamp')); ?> ago</span></li>
<?php endforeach; ?>

<?=$archive?>