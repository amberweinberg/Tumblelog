<?php 

    /*
     * JSON list of tweets using:
     *         http://dev.twitter.com/doc/get/statuses/user_timeline
     * Cached using WP transient API.
     *        http://www.problogdesign.com/wordpress/use-the-transients-api-to-list-the-latest-commenter/
     */
     
    // Configuration.
    $numTweets = 20;
    $name = 'amberweinberg';
    $transName = 'list-tweets'; // Name of value in database.
    $cacheTime = 1; // Time in minutes between updates.
    
    // Do we already have saved tweet data? If not, lets get it.
    if(false === ($tweets = get_transient($transName) ) ) :    
    
        // Get the tweets from Twitter.
        $json = wp_remote_get("http://api.twitter.com/1/statuses/user_timeline.json?exclude_replies=true&screen_name=$name&count=$numTweets");
        
        // Get tweets into an array.
        $twitterData = json_decode($json['body'], true);
        
        // Now update the array to store just what we need.
        // (Done here instead of PHP doing this for every page load)
        foreach ($twitterData as $tweet) :
            // Core info.
            $name = $tweet['user']['name'];
            $permalink = 'http://twitter.com/#!/'. $name .'/status/'. $tweet['id_str'];
            
            // Message. Convert links to real links.
            $pattern = '/http:(\S)+/';
            $replace = '<a href="${0}" target="_blank" rel="nofollow">${0}</a>';
            $text = preg_replace($pattern, $replace, $tweet['text']);
            
            // Need to get time in Unix format.
            $time = $tweet['created_at'];
            $time = date_parse($time);
            $uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);
            
            // Now make the new array.
            $tweets[] = array(
                            'text' => $text,
                            'name' => $name,
                            'permalink' => $permalink,
                            'time' => $uTime
                            );
        endforeach;
        
        // Save our new transient.
        set_transient($transName, $tweets, 60 * $cacheTime);
    endif;

?>