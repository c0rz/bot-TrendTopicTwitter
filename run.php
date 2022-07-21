<?php
date_default_timezone_set("Asia/Jakarta");
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* TwitteroAuth setting in config.php */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);

$api_trend = $connection->get('trends/place', ['id' => 23424846]); // id Indonesia
$no = 1;
$top_5 = array();
for ($id = 0; $id < 5; $id++) {
    if ($api_trend[0]->trends[$id]->promoted_content == null) {
        array_push($top_5, $no . ". " . $api_trend[0]->trends[$id]->name);
        $no++;
    }
}

$tweet = "Trend Topic Indonesia - " . tgl_indo(date('Y-m-d')) . " " . date('G:i:s') . " WIB
";
foreach ($top_5 as $tt) {
    $tweet .= $tt . "
";
}
$tweet = $connection->post('statuses/update', array('status' => $tweet));
if (!empty($tweet->id)) {
    echo $tweet->id;
} else {
    echo "Die acc.";
}
