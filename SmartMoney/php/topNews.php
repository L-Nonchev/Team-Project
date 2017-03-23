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

?>