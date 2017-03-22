<?php
//<!-- =-=-=-=-=-=-=-=-=-=-=-=-= API FOR BLOG =-=-=-=-=-=-=-=-=-=-=-=-= -->


//<!-- =-=-=-=-=-=-= TOP NEWS =-=-=-=-=-=-= -->
$title= array();
$description = array();
$author = array();
$img = array();
$url = array();
$date = array();

//<!-- =-=-= Business Insider =-=-= -->
$news = file_get_contents('https://newsapi.org/v1/articles?source=business-insider&sortBy=top&apiKey=f72df7cb5fb0489a8c9ab9553f922927');
$data = json_decode($news, true);

for ($index= 0; $index < 3; $index++){
	$title[$index] = $data['articles'][$index]['title'];
	$description[$index] = $data['articles'][$index]['description'];
	$author[$index] = $data['articles'][$index]['author'];
	$img[$index] = $data['articles'][$index]['urlToImage'];
	$url[$index] = $data['articles'][$index]['url'];
	$date[$index] = $data['articles'][$index]['publishedAt'];
	$date[$index] = substr($date[$index], 8,2);
}

//<!-- =-=-= Bloomberg  =-=-= -->
$news = file_get_contents('https://newsapi.org/v1/articles?source=bloomberg&sortBy=top&apiKey=f72df7cb5fb0489a8c9ab9553f922927');
$data = json_decode($news, true);

for ($index= 3; $index < 6; $index++){
	$state = $index -3;
	$title[$index] = $data['articles'][$state]['title'];
	$description[$index] = $data['articles'][$state]['description'];
	$author[$index] = $data['articles'][$state]['author'];
	$img[$index] = $data['articles'][$state]['urlToImage'];
	$url[$index] = $data['articles'][$state]['url'];
	$date[$index] = $data['articles'][$state]['publishedAt'];
	$date[$index] = substr($date[$index], 8,2);
}

//<!-- =-=-=-=-=-=-= LAST NEWS =-=-=-=-=-=-= -->
//<!-- =-=-= Business Insider =-=-= -->
$news = file_get_contents('https://newsapi.org/v1/articles?source=business-insider&sortBy=latest&apiKey=f72df7cb5fb0489a8c9ab9553f922927');
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
	$dateLN[$index] = $data['articles'][$index]['publishedAt'];
	$dateLN[$index] = substr($dateLN[$index], 0,10);
}
?>