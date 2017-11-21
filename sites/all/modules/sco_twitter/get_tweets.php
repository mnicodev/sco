<?php
require "../../libraries/vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
$key="PC2jqdcpMHzd7xPBtbH1PTlGp";
$secret="R3M81nhS28SJ71rUfJ9ZOpuo5gcyn5B83X1srI9prF7CMXWhFN";
$owner="AngersSCO";
//$key="";
/*$key="P9ZEu3sZQ2RwihvXZwgkWSkGT";
$secret="0P3mLGLWSRzsKsaPgfHIWaGi6YLNskFB2Y71b4RhgNogf4DUHf";
$owner="Nomade000";*/
/*
$oauth=new TwitterOAuth($key,$secret);
$accessToken=$oauth->oauth2('oauth2/token',['grant_type' => 'client_credentials']);
$twitter=new TwitterOAuth($key,$secret,null,$accessToken->access_token);
$tweets=$twitter->get("statuses/user_timeline",["screen_name"=>$owner,'exclude_replies'=>true]);
$output="";
$output="<ul class='slides'>";
foreach($tweets as $tweet) {
	//print_r($tweet->text);
	$output.="<li>".$tweet->text."</li>";
}
$output.="</ul>";
echo $output;
*/
//$test=json_decode(file_get_contents("https://publish.twitter.com/oembed?url=".urlencode("https://twitter.com/angerssco")));
//echo $test->html;
?>
