<?php
/**
* 140dev_config.php
* Constants for the entire 140dev Twitter framework
* You MUST modify these to match your server setup when installing the framework
* 
* Latest copy of this code: http://140dev.com/free-twitter-api-source-code-library/
* @author Adam Green <140dev@gmail.com>
* @license GNU Public License
* @version BETA 0.30
*/

// OAuth settings for connecting to the Twitter streaming API
// Fill in the values for a valid Twitter app
define('TWITTER_CONSUMER_KEY','7fwWDhQq3ZIiZ6MuziSsdI5A7');
define('TWITTER_CONSUMER_SECRET','jrEOXyTZ7PgGQicTRT7slUG73MuDjbX0mQ6v4KAxhb00tHz1Jg');
define('OAUTH_TOKEN','4881767465-bR7elwtVzd4uc4kxEfb3UigE0rbMazx000pJ0Ra');
define('OAUTH_SECRET','Tof2QlqaH453uQix3TXuVkenbJBtnNSEhhvhkxPXy2R2p');

// Settings for monitor_tweets.php
define('TWEET_ERROR_INTERVAL',10);
// Fill in the email address for error messages
define('TWEET_ERROR_ADDRESS','patrickngachuru@hotmail.com');






/*<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['twitter_consumer_token']		= ' 7fwWDhQq3ZIiZ6MuziSsdI5A7';
$config['twitter_consumer_secret']		= 'jrEOXyTZ7PgGQicTRT7slUG73MuDjbX0mQ6v4KAxhb00tHz1Jg';
$config['twitter_access_token']			= '4881767465-bR7elwtVzd4uc4kxEfb3UigE0rbMazx000pJ0Ra'; // Optional
$config['twitter_access_secret']		= 'Tof2QlqaH453uQix3TXuVkenbJBtnNSEhhvhkxPXy2R2p'; // Optional




// required only for streaming api
$config['user'] = 'patrickngachuru@hotmail.com';
$config['pass'] = 'kanjogukazuri1234';

/* End of file twitter.php */
/* Location: ./application/config/twitter.php */*/
?>


