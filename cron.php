<?php
ini_set('display_errors', 1);
error_reporting(-1);

// Twitter OAuth
require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

// More informations: https://apps.twitter.com/
$consumer_key = '';
$consumer_secret = '';
$access_token = '';
$access_token_secret = '';

$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

// Countdown
require 'countdown.php';

$from = time();
$to = strtotime('2020-01-01');
$diff = $to - $from;

// $to is in the past (longer than five minutes), exit
if($diff < -300) exit;

// $to is/was in the next five minutes
if($diff >= -300 && $diff <= 300)
{
  $string = 'Countdown wird in den nächsten 5 Minuten ablaufen!';
}
else
{
  $string = 'Noch ' . twitterCountdown($diff) . ' bis der Countdown abgelaufen ist!';
}

// testing
// echo $string;

$status = array(
  'status' => $string
);

// post status to twitter
$content = $connection->post('statuses/update', $status);
