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
	    <div class="menu">
	    <ul class="menu nav navbar-nav navbar-right">
		<li>
		    <a href="https://github.com/Citringo/Citringo.net/" class="nav-link" style="padding: 5px 15px">
			<i class="fa fa-github"></i><span class="visible-xs-inline">Fork me!</span>
		    </a>
		</li>
		<li>
		    <a href="/about/" class="nav-link" style="padding: 5px 15px">
			<i class="fa fa-info-circle"></i><span class="visible-xs-inline">Citringo とは</span>
		    </a>
		</li>
		<li>
		    <a href="/programs/" class="nav-link" style="padding: 5px 15px">
			<i class="fa fa-download"></i><span class="visible-xs-inline">ダウンロード</span>
		    </a>
		</li>
		<li>
		    <a href="/Music/" class="nav-link" style="padding: 5px 15px">
			<i class="fa fa-music"></i><span class="visible-xs-inline">ミュージック</span>
		    </a>
		</li>
		<li>
		    <a href="/Contact/" class="nav-link" style="padding: 5px 15px">
		    	<i class="fa fa-envelope"></i><span class="visible-xs-inline">連絡先</span>
		    </a>
		</li>
		<li>
		    <a href="/link/" class="nav-link" style="padding: 5px 15px">
			<i class="fa fa-link"></i><span class="visible-xs-inline">リンク</span>
		    </a>
		</li>
		<li>
			
		    <a href="http://blog.citringo.net" class="nav-link" style="padding: 5px 15px">
			<i class="fa fa-wordpress"></i><span class="visible-xs-inline">ブログへ行く</span>
		    </a>
		</li>
	    </ul>
	    </div>
	</div><!--navbar collapse -->
    </div><!--container-->
</nav><!--navbar-->
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
	(C) 2015 Citringo
    </p>
    <p style="color: #444">
	<?php echo `git log -1 --pretty=oneline` ?>
    </p>
</footer>
