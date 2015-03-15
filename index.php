<?php
//---Library Load
include_once("./lib/core.php");   //Core Lib
include_once("./lib/MarkdownExtra.inc.php"); //MarkDown Extra Lib
//---

parse_str(filter_input(INPUT_SERVER, "QUERY_STRING"));
$pagename = filter_input(INPUT_SERVER, "QUERY_STRING");
if (isset($page)) {  //page クエリはCtrpages時代との互換性維持 使わないで＞＜
	$pagename = $page;
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
		} catch (Exception $ex) {	 //ないと例外が＿|￣| Σ･∴'、-=≡(´･_･`)飛ぶ
			?>
			<meta name="twitter:title" content="<?php echo $pagename; ?>" />
			<meta name="twitter:description" content="<?php echo $pagename; ?> のページ。" />
			<meta name="description" content="<?php echo $pagename; ?> のページ。">	
			<meta name="keywords" content="Citringo, シトリン, 個人サイト">
			<title><?php echo $pagename; ?> - Citringo.net</title>
			<?php
		}
		?>
		<meta name="twitter:url" content="<?php print((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>" />

		<!-- Bootstrap -->
		<link href="./css/bootstrap.css" rel="stylesheet">
		<link href='./css/bootstrap-theme.css' rel="stylesheet">
		<!-- Main -->
		<link href="./css/main.css" rel="stylesheet">
		<!-- Favicons -->
		<link rel="apple-touch-icon" href="./resources/favicon.png">
		<link rel="icon" href="./resources/favicon.png">
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
    <body>
		<?php
		include_once("analyticstracking.php"); //Google Analytics
		?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" style="padding: 9px 15px;" href="./index.php">
						<img src="resources/citringo_white.svg" style="height: 32px;" alt="Citringo.net">
					</a>

				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="/about/" style="padding: 5px 15px;" data-toggle="tooltip" data-placement="bottom" title="About Citringo">
								<img src="resources/citrine_menu.png" style="height: 40px;" alt="about">
								<span class="show-on-mobile-inline">Citringo について</span>
							</a>
						</li>
						<li>
							<a href="/programs/" style="padding: 5px 15px;" data-toggle="tooltip" data-placement="bottom" title="App">
								<img src="resources/appicon_menu.png" style="height: 40px;" alt="app">
								<span class="show-on-mobile-inline">アプリ</span>
							</a>
						</li>
						<li>
							<a href="/Music/" style="padding: 5px 15px;" data-toggle="tooltip" data-placement="bottom" title="Music">
								<img src="resources/musicicon_menu.png" style="height: 40px;" alt="musics">
								<span class="show-on-mobile-inline">ミュージック</span>
							</a>
						</li>
						<li>
							<a href="/Contact/" style="padding: 5px 15px;" data-toggle="tooltip" data-placement="bottom" title="Contact">
								<img src="resources/contact_menu.png" style="height: 40px;" alt="contact">
								<span class="show-on-mobile-inline">連絡先</span>
							</a>
						</li>
						<li>
							<a href="/link/" style="padding: 5px 15px;" data-toggle="tooltip" data-placement="bottom" title="Links">
								<img src="resources/links_menu.png" style="height: 40px;" alt="links">
								<span class="show-on-mobile-inline">リンク集</span>
							</a>
						</li>
						<li>
							<a href="/sitemap/" style="padding: 5px 15px;" data-toggle="tooltip" data-placement="bottom" title="SiteMap">
								<img src="resources/sitemap_menu.png" style="height: 40px;" alt="links">
								<span class="show-on-mobile-inline">サイトマップ</span>
								<!--<span class="label label-danger">New</span>-->
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" style="padding: 5px 15px;" data-toggle="dropdown" role="button" area-expanded="false">
								<img src="resources/share_menu.png" style="height: 40px;" alt="share">
								<span class="show-on-mobile-inline">SNS アカウント</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="https://twitter.com/Citringo">Twitter</a></li>
								<li><a href="http://www.nicovideo.jp/user/34173135">niconico</a></li>
								<li><a href="https://www.youtube.com/channel/UCH3I30Y6NrXTNP1kEceRRZQ">YouTube</a></li>
								<li><a href="https://soundcloud.com/citringo">SoundCloud</a></li>
								<li><a href="https://miiverse.nintendo.net/users/Citringo">Miiverse</a></li>
								<li><a href="https://github.com/Citringo">GitHub</a></li>
								<li><a href="https://misskey.xyz/Citringo">Misskey</a><li>
								<li><a href="https://plus.google.com/110422794460132423888/posts">Google+</a></li>
								<li><a href="http://profile.hatena.ne.jp/Topazgoodmeat/">Hatena</a></li>
								<li><a href="http://ask.fm/Citringo">ask.fm</a></li>
							</ul>
						</li>
					</ul>
				</div><!--navbar collapse -->
			</div><!--container-->
		</nav><!--navbar-->
		<div class="dark-theme marquee" style="width: 100%;">
			<p>
			<?php
					echo getmes();
					function getmes()
					{
						$i = rand(0, 9);
						switch($i)
						{
							case 0: return "ฅ(º ﾛ º ฅ)＜にょほーーーーwwwwwww";
							case 1: return "あぁ^～心がぴょんぴょんするんじゃぁ^～";
							case 2: return "誰がハゲじゃハゲ";
							case 3: return "まあ幼稚園の頃にすでにパソコンで遊んでたけど<( 'ω')>";
							case 4: return "頭がフワフワする…";
							case 5: return "└(՞ةڼ◔)」ﾇﾍﾞﾁﾞｮﾝﾇｿﾞｼﾞｮﾝﾍﾞﾙﾐｯﾃｨｽﾓｹﾞﾛﾝﾎﾞｮ";
							case 6: return "ｶﾆｶﾞﾀﾋﾞｰﾑ(」'ω')」--------------☆";
							case 7: return "プログラミングと作曲が趣味です";
							case 8: return "Citringo.net は用量・用法を守って正しく使いましょう";
							case 9: return "▂▅▇█▓▒░(’ω’)░▒▓█▇▅▂うわああああああ";
							
						}
					}
			?>
			</p>
		</div>
		<main class="maincontainer">
			<?php
			$pagename .= ".html";
			try {
				echo ReadPage($pagename);
			} catch (Exception $ex) {
				http_response_code(404);
				?>
				<p style="font-weight: bold; color: red;"><?php echo $ex->getMessage(); ?></p>

				<?php
			}
			?>

		</main><!--Main Container-->


		<script>//ツールチップはこうしないと使えない
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
		</script>

		<footer class="footerback">
			<p>
				<a class="twitter-share-button"
				   href="https://twitter.com/share"
				   data-via="Citringo"
				   >
					ツイート
				</a>
				<script>
					window.twttr = (function (d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0], t = window.twttr || {};
						if (d.getElementById(id))
							return;
						js = d.createElement(s);
						js.id = id;
						js.src = "https://platform.twitter.com/widgets.js";
						fjs.parentNode.insertBefore(js, fjs);
						t._e = [];
						t.ready = function (f) {
							t._e.push(f);
						};
						return t;
					}(document, "script", "twitter-wjs"));
				</script>
				<a href="http://b.hatena.ne.jp/entry/citringo.net%3F<?php echo urlencode($pagename); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="Citringo.net" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
			</p>
			<div class="show-on-pc-block">
				<script>
					amazon_ad_tag = "citringo-22";
					amazon_ad_width = "728";
					amazon_ad_height = "90";
				</script>
				<script src="http://ir-jp.amazon-adsystem.com/s/ads.js"></script>
			</div>
			<div class="show-on-mobile-block">
				<script><!--
					amazon_ad_tag = "citringo-22";
					amazon_ad_width = "180";
					amazon_ad_height = "150";//--></script>
				<script src="http://ir-jp.amazon-adsystem.com/s/ads.js"></script>
			</div>
			<p>

				<a href="http://lv9.org/"> Lv9 無料ホスティング</a>のレンタルサーバーを使用しています。
			</p>
			<p>
				ドメインは<a href="http://www.onamae.com/">お名前.com</a>で取得しました。
			</p>
			<p>
				<a href="http://getbootstrap.com/"> Bootstrap </a>を使用してデザインしています。
			</p>
			<p>

			</p>
			<p>
				(C)2015 Citringo All rights reserved.
			</p>
		</footer>
    </body>

</html>