<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
	<div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand push" style="padding: 5px 15px;" href="/">
		<img class="" src="resources/citringo_icon_white.png" style="height: 40px;" alt="Citringo.net">

	    </a>

	</div>
	<div id="navbar" class="collapse navbar-collapse">
	    <ul class="nav navbar-nav navbar-right">
		<li>
		    <a href="https://github.com/Citringo/Citringo.net/" class="nav-link" style="padding: 5px 15px" data-toggle="tooltip" data-placement="bottom" title="Fork me!">
			<img class="show-on-tab-inline" src="resources/github_menu.png" style="height: 40px;" alt="about">
			<span class="show-on-mobile-inline">Fork me!</span>
			<span class="show-on-pc-inline">Fork Me!</span>
		    </a>
		</li>
		<li>
		    <a href="/about/" class="nav-link" style="padding: 5px 15px" data-toggle="tooltip" data-placement="bottom" title="Citringo について">
			<img class="show-on-tab-inline" src="resources/citrine_menu.png" style="height: 40px;" alt="about">
			<span class="show-on-mobile-inline">About</span>
			<span class="show-on-pc-inline">About</span>
		    </a>
		</li>
		<li>
		    <a href="/programs/" class="nav-link" style="padding: 5px 15px" data-toggle="tooltip" data-placement="bottom" title="アプリ">
			<img class="show-on-tab-inline" src="resources/appicon_menu.png" style="height: 40px;" alt="app">
			<span class="show-on-mobile-inline">App</span>
			<span class="show-on-pc-inline">App</span>
		    </a>
		</li>
		<li>
		    <a href="/Music/" class="nav-link" style="padding: 5px 15px" data-toggle="tooltip" data-placement="bottom" title="ミュージック">
			<img class="show-on-tab-inline" src="resources/musicicon_menu.png" style="height: 40px;" alt="musics">
			<span class="show-on-mobile-inline">Music</span>
			<span class="show-on-pc-inline">Music</span>
		    </a>
		</li>
		<li>
		    <a href="/Contact/" class="nav-link" style="padding: 5px 15px" data-toggle="tooltip" data-placement="bottom" title="連絡先">
			<img class="show-on-tab-inline" src="resources/contact_menu.png" style="height: 40px;" alt="contact">
			<span class="show-on-mobile-inline">Contact</span>
			<span class="show-on-pc-inline">Contact</span>
		    </a>
		</li>
		<li>
		    <a href="/link/" class="nav-link" style="padding: 5px 15px" data-toggle="tooltip" data-placement="bottom" title="リンク集">
			<img class="show-on-tab-inline" src="resources/links_menu.png" style="height: 40px;" alt="links">
			<span class="show-on-mobile-inline">Links</span>
			<span class="show-on-pc-inline">Links</span>
		    </a>
		</li>
		<li>
		    <a href="/sitemap/" class="nav-link" style="padding:	5px 15px" data-toggle="tooltip" data-placement="bottom" title="サイトマップ">
			<img class="show-on-tab-inline" src="resources/sitemap_menu.png" style="height: 40px;" alt="links">
			<span class="show-on-mobile-inline">SiteMap</span>
			<span class="show-on-pc-inline">SiteMap</span>
		    </a>
		</li>
		<li class="dropdown">
		    <a href="#" class="dropdown-toggle nav-link" style="padding: 5px 15px"  data-toggle="dropdown" role="button" area-expanded="false">
			<img class="show-on-tab-inline" src="resources/share_menu.png" style="height: 40px;" alt="share">
			<span class="show-on-mobile-inline">Account</span>
			<span class="show-on-pc-inline">Account</span>
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
<div style="height: 1.4em; padding: 3px;">
<p style="color: white; text-align: right;"><?php
if (isset($user)) {
	if ($loginflag)
	{
        	echo "Welcome back, " . $user->screen_name . ".";
	}else{
		echo "あなたは管理者ではないので、ログインできません。";
	}
}else{
?>
<a href="/oauth/login.php">Sign in with twitter</a>
<?php
}
?></p>
</div>
<main class="maincontainer">
    <?php PageRender() ?>
</main><!--main container-->
<script>//ツールチップはこうしないと使えない
    $(function () {
	$('[data-toggle="tooltip"]').tooltip()
    })
</script><!--script-->
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
	<a href="http://b.hatena.ne.jp/entry/citringo.net%3F<?php // echo urlencode($pagename);   ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="Citringo.net" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
	<iframe src="http://ghbtns.com/github-btn.html?user=Citringo&repo=Citringo.net&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>
	<iframe src="http://ghbtns.com/github-btn.html?user=Citringo&repo=Citringo.net&type=fork&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="95" height="20"></iframe>
    </p>

    <p>
	<a href="https://www.conoha.jp/referral/?token=ACuc2Tzaum9mbAJMhV01KmYHhyAg6GKzc5lq6vttzX6oFZ5.N_0-OWO">ConoHaのVPS</a>を使用しています。
    </p>
    <p>
	ドメインは<a href="http://www.onamae.com/">お名前.com</a>で取得しました。
    </p>
    <p>
	<a href="http://getbootstrap.com/"> Bootstrap </a>を使用してデザインしています。
    </p>
    <p>
	<b>HTML5</b>, <b>CSS3</b>, <b>JavaScript 2.0</b> に準拠したウェブブラウザーで正しく動作するはずです。<br>
	<b>Chrome</b>, <b>Firefox</b>, <b>Opera</b>, <b>IE11</b>  で正常に動作することを確認しています。
    </p>
    <p>
	(C)2015 Citringo All rights reserved.
    </p>
</footer>
