<?php
// Citringo.net Core Library
// (C)2015 Citringo All rights reserved.
//require_once dirname(__FILE__) . '/Michelf/MarkdownExtra.inc.php'; //MarkDown Extra Lib

//use finfo;
use Michelf\MarkdownExtra;

function ReadPage($pagename) {
//	$finfo = new finfo(FILEINFO_MIME);
//	$mime = $finfo->file("pages/" . $pagename);

	if (substr($pagename, 0, 2) === ".." || substr($pagename, 0, 2) === "./") {
		throw new ErrorException("相対パス指定は使用できません。");
	}
//	if ($mime == "application/x-httpd-php") {
//		throw new ErrorException("phpファイルは見ることができません。");
//	}
	if (file_exists("pages/" . $pagename)) {
		try {
			return MarkdownExtra::defaultTransform(file_get_contents("pages/" . $pagename));
		} catch (Exception $ex) {
			return PutErrorMessage($ex->getMessage());
		}
	} else {
		http_response_code(404);
		return MarkdownExtra::defaultTransform(file_get_contents("pages/404.html"));
	}
}

function ReadHead($pagename) {
//	$finfo = new finfo(FILEINFO_MIME);
//	$mime = $finfo->file("heads/" . $pagename);

	if (substr($pagename, 0, 2) === "..") {
		throw new ErrorException("相対パス指定は使用できません。");
	}
//	if ($mime == "application/x-httpd-php") {
//		throw new ErrorException("phpファイルは見ることができません。");
//	}
	if (file_exists("heads/" . $pagename)) {
		return file_get_contents("heads/" . $pagename);
	} else {
		throw new ErrorException($pagename . " は存在しません。");
	}
}

function WritePage($pagename, $text) {

	if (substr($pagename, 0, 2) === "..") {
		return -1;
	}

	file_put_contents("pages/" . $pagename, $text);

	return 0;
}

function Err($errmes) {
	return "<B>Err:" . $errmes . "</B>";
}

function PutErrorMessage($errmes) {
	?>
	<p style="color: red;"><?php echo "Error: " . $errmes; ?></p>
	<?php
}

function LogWrite($str) {
	$l = sprintf("[%s]: %s\n", date("Y-m-d H:i:s"), $str);
	file_put_contents("log.txt", $l, FILE_APPEND);
}

function GetPage() {
	$_n = 0;
	$lastdata = array();
	if ($dir = opendir("pages/")) {
		while (($file = readdir($dir)) !== false) {
			if ($file != "." && $file != "..") {
				$lastdata[$_n] = $file;
				$_n++;
			}
		}
		closedir($dir);
	}
	return $lastdata;
}

function PageRender()
{
    global $pagename;
    $pagename .= ".html";
    try {
	echo ReadPage($pagename);
    } catch (Exception $ex) {
?>
<p style="font-weight: bold; color: red;"><?php echo $ex->getMessage();?> </p>
<?php
    }
			
}
function GetHead()
{
    global $root, $theme;
    return $root . "/themes/" . $theme . "/head.php";
}

function GetBody()
{
    global $root, $theme;
    return $root . "/themes/" . $theme . "/body.php";
}

//終わり
?>