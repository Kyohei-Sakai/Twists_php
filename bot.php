<?php

require_once(__DIR__ . '/config.php');

// package
// - Composer

use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth(
  CONSUMER_KEY,
  CONSUMER_SECRET,
  ACCESS_TOKEN,
  ACCESS_TOKEN_SECRET);

// $content = $connection->get("account/verify_credentials");
// $content = $connection->get("statuses/home_timeline", ['count' => 3]);
// var_dump($content);

$res = $connection->post("statuses/update", [
  'status' => 'dotinstall_bot test tweets: by cron'
]);

// $media = $connection->upload("media/upload", [
//   'media' => __DIR__ . '/html_lesson.png'
// ]);
//
// $res = $connection->post("statuses/update", [
//   'status' => 'dotinstall_bot test tweets: ' . date('m月d日') . 'はHTML入門がおすすめです！
//    http://dotinstall.com/lessons/basic_html_v3 #dotinstall (by cron)',
//    'media_ids' => $media->media_id
// ]);



if ($connection->getLastHttpCode() === 200) {
    echo 'Sccess!' . PHP_EOL;
} else {
    echo "Error!" . $res->errors[0]->message . PHP_EOL;
}
