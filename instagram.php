<?php 

ini_set('default_charset', 'UTF-8');
 
// ----------------------------------------------------------------------
// CONFIG
$instagram_user = "amberweinberg"; // your instagram username
$cachetime = 1; // 1 hours
$file = $instagram_user."_instagram.txt"; // file used to cache content
$TITLE = "Amber Weinberg's Instagram"; // your page title
// ----------------------------------------------------------------------
 
function getFollowgram($u) {
    // function read instagram feed through followgram.me service, thanks Fabio Lalli
    // twitter @fabiolalli
    $url = "http://followgram.me/".$u."/rss";
    $s = file_get_contents($url);
    preg_match_all('#<item>(.*)</item>#Us', $s, $items);
    $ar = array();
    for($i=0;$i<count($items[1]);$i++) {
        $item = $items[1][$i];
        preg_match_all('#<link>(.*)</link>#Us', $item, $temp);
        $link = $temp[1][0];
        preg_match_all('#<pubDate>(.*)</pubDate>#Us', $item, $temp);
        $date = date("d-m-Y h:i:s",strtotime($temp[1][0]));
        preg_match_all('#<title>(.*)</title>#Us', $item, $temp);
        $title = $temp[1][0];
        preg_match_all('#<img src="([^>]*)">#Us', $item, $temp);
        $thumb = $temp[1][0];
        $ar['date'][$i] = $date;
        $ar['image'][$i] = str_replace("_5.jpg","_6.jpg",$thumb);
        $ar['bigimage'][$i] = str_replace("_5.jpg","_7.jpg",$thumb);
        $ar['link'][$i] = $link;
        $ar['title'][$i] = $title;
    }
    return $ar;
}
 

 
// -----------------------------------------------
// check for new feed every X hours
    $r = getFollowgram($instagram_user);
    // add new images to archive file
    for ($i=floor(count($r,COUNT_RECURSIVE)/count($r)); $i>=0; $i--) {
        if($r['image'][$i]) {
            $temp = "<li><img src='".$r['image'][$i]."'/><span>".$r['title'][$i]."<br/>".$r['date'][$i]."</span></li>";
            if(!stristr($archive,basename($r['image'][$i]))) $archive = $temp.$archive;
        }
    }
    // save new file
    $f = fopen($file,'w');
    fwrite($f,$archive);


 
?>
