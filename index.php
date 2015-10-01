<?php
session_start();
//---Library Load
$theme = "bootstrap";
$root = __DIR__;
require_once $root . '/lib/core.php';   //Core Lib
require_once $root . '/lib/Michelf/MarkdownExtra.inc.php'; //MarkDown Extra Lib
require_once 'oauth/common.php';
require_once 'oauth/twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

$user = null;
$loginflag = false;
if (isset($_SESSION['access_token'])){
	$access_token = $_SESSION['access_token'];

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

	$user = $connection->get("account/verify_credentials");
	error_log("access token get", 0);
	ob_start();
	var_dump($user);
	$result =ob_get_contents();
	ob_end_clean();
	
	if ($user->id == 1214680922)
		$loginflag = true;

	file_put_contents("user.log", $result);

}

//---

parse_str(filter_input(INPUT_SERVER, "QUERY_STRING"));
$pagename = filter_input(INPUT_SERVER, "QUERY_STRING");
if (isset($page)) {  //page クエリはCtrpages時代との互換性維持 使わないで＞＜
    $pagename = $page;
    $page = &$pagename;
}

if ($pagename == "") { //まっしろけならfrontpage
    $pagename = "frontpage";
}
?><!DOCTYPE html>
<!-- Citringo.net
    (C)2015 Citringo All rights reserved.
-->
<html lang="ja">
    <head>
	<meta charset="utf-8">
	<base href="http://citringo.net">	<!--消すと多階層ページでcssとか読めなくなる-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Citringo">
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@Citringo" />
	<?php
	try {
	    echo ReadHead($pagename . ".html");  //heads を読み込む
	} catch (Exception $ex) {  //ないと例外が＿|￣| Σ･∴'、-=≡(´･_･`)飛ぶ
	    ?>
    	<meta name="twitter:title" content="<?php echo $pagename; ?>" />
    	<meta name="twitter:description" content="<?php echo $pagename; ?> のページ。" />
    	<meta name="description" content="<?php echo $pagename; ?> のページ。">
    	<meta name="keywords" content="Citringo, シトリン, 個人サイト">
    	<title><?php echo $pagename; ?> - Citringo.net</title>
	    <?php
	}
	require_once(GetHead());
	?>


    </head><!--head-->
    <body>
	<?php
	require_once("analyticstracking.php"); //Google Analytics
	require_once(GetBody());
	?>
    </body>

</html>
