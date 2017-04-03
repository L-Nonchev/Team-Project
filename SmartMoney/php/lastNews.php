<?php
//<!-- =-=-=-=-=-=-= LAST NEWS =-=-=-=-=-=-= -->
//<!-- =-=-= Business Insider =-=-= -->

// set_time_limit(5);

$context = stream_context_create(array('https' => array('header'=>'Connection: close\r\n')));

$news = file_get_contents('https://newsapi.org/v1/articles?source=business-insider&sortBy=latest&apiKey=f72df7cb5fb0489a8c9ab9553f922927',
		false, $context);
$data2 = json_decode($news, true);

$titleLN  = array();
$imgLN  = array();
$urlLN  = array();
$dateLN  = array();
$dateLN = array();

for ($index = 0; $index < 4; $index++){
	$titleLN[$index] = $data2['articles'][$index]['title'];
	$imgLN[$index] = $data2['articles'][$index]['urlToImage'];
	$urlLN[$index]= $data2['articles'][$index]['url'];
	$dateLN[$index] = $data2['articles'][$index]['publishedAt'];
	$dateLN[$index] = substr($dateLN[$index], 0,10);
}
?>