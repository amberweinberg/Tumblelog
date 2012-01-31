<?php include_once('twitter.php'); ?>
<?php include_once('rss.php'); ?>

<?php foreach ($feed as $i): ?>
	<li class="<?php echo $i['type']; ?>">
		<span class="icon"></span>
		<?php if($i['type'] == 'Twitter') : ?>
			<?php echo $i['text']; ?>
		<?php elseif($i['type'] == 'WP' || $i['type'] == 'WP2' || $i['type'] == 'github') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['title'].'</a>' ?>
		<?php elseif($i['type'] == 'foursquare') : ?>
			<?php echo 'Amber was '.$i['description'].'' ?>
		<?php elseif($i['type'] == 'dribbble' || $i['type'] == 'Instagram' || $i['type'] == 'ravelry') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['title'] .$i['description'].'</a>' ?>
		<?php elseif($i['type'] == 'pinterest') : ?>
			<?php echo $i['description'] ?>
		<?php elseif($i['type'] == 'meetup') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">I RSVP\'d to'.$i['title'].'</a>' ?>
		<?php elseif($i['type'] == 'lanyrd') : ?>
			<?php echo 'I\'m attending <a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['title'].'</a> on '.date('jS M Y', $i['time']) ?>
		<?php elseif($i['type'] == 'goodreads') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['title'].'</a>' .$i['description'] ?>
		<?php elseif($i['type'] == 'codesnippit') : ?>
			<?php echo '<a title="'.$i['title'].'" href="'.$i['link'].'">'.$i['description'].'</a>' ?>
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
			<?php elseif($i['type'] == 'ravelry') : ?>
				<a title="Find me on ravelry" href="http://www.ravelry.com/projects/amberweinberg" target="_blank">Ravelry</a>
			<?php elseif($i['type'] == 'pinterest') : ?>
				<a title="Find me on pinterest" href="http://pinterest.com/amberweinberg" target="_blank">Pinterest</a>
			<?php elseif($i['type'] == 'goodreads') : ?>
				<a title="Find me on goodreads" href="http://www.goodreads.com/user/show/2891681-amber-weinberg" target="_blank">Goodreads</a>
			<?php elseif($i['type'] == 'lanyrd') : ?>
				<a title="Find me on lanyrd" href="http://lanyrd.com/profile/amberweinberg/" target="_blank">Lanyrd</a>
			<?php elseif($i['type'] == 'meetup') : ?>
				<a title="Find me on meetup" href="http://www.meetup.com/The-London-Knitting-Group/members/6078908/" target="_blank">Meetup</a>
			<?php elseif($i['type'] == 'codesnippit') : ?>
				<a title="Find me on codesnippit" href="http://codesnipp.it/amberweinberg" target="_blank">Codesnippit</a>
			<?php endif; ?>
		</span>
	</li>
<?php endforeach; ?> 
