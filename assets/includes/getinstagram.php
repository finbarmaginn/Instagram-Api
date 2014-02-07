<?php


	function callInstagram($url)
	{
	$ch = curl_init();
	curl_setopt_array($ch, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_SSL_VERIFYHOST => 2
	));

	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
	}

	$tag = 'developer';
	$client_id = "75146e4ee4d7490095b9048fbfb38ce9";

	$url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id;

	$inst_stream = callInstagram($url);
	$results = json_decode($inst_stream, true);

	//Now parse through the $results array to display your results...
	foreach($results['data'] as $item){
		$image_link = $item['images']['low_resolution']['url'];
		$usersname = $item['user']['full_name'];
		$profilepic = $item['user']['profile_picture'];
		$tags = $item['tags'];
		$likes = $item['likes']['count'];
		$imglink = $item['link'];
		echo '<div class="card"><h2><img src="'.$profilepic.'">'.$usersname.'</h2><div class="image"><a href="'.$imglink.'"><img src="'.$image_link.'" alt="image with developer hashtag" /></a><h4 class="left">'.$likes.' likes</h4><a href="#" class="hashClick right"><img src="assets/imgs/blue-tag-icon.png" /></a><div class="hash"><ul>';
		foreach($item['tags'] as $tags){
			echo'<li>#' . $tags . '</li>';
		}
		echo '</ul></div></div></div>';
	}
?>