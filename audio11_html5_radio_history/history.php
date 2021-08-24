<?php
/*

Now Playing PHP script for SHOUTcast

This script is (C) MixStream.net 2008

Feel free to modify this free script
in any other way to suit your needs.

Version: v1.1

*/


//sanitize GET vars start
$accepted_get_vals=array('the_stream');
foreach ($_GET as $key => $value) {
	if (!in_array($key,$accepted_get_vals)) {
		$_GET[$key]=preg_replace('/[^a-z0-9]+/i', '', $_GET[$key]);
		unset($_GET[$key]);
	}
}
$_GET['the_stream']=preg_replace('/[^a-z0-9-:\/.;]+/i', '', $_GET['the_stream']);
//sanitize GET vars end


$songtitle="";
if (!isset($_GET['the_stream'])) {
				//nothing
				die();
} else {
				$the_link=trim($_GET['the_stream']);
					//ShoutCast V>=2
					$fp = fopen($_GET['the_stream'],'r');
					$info = '';
					if($fp) {
							while(!feof($fp)) {
								 $info .= fread($fp,1024);
							}
					}
					fclose($fp);
					if (!$fp) { //ShoutCast V<2
									$t = parse_url($the_link);
									$ip=$t['host'];
									$port=$t['port'];
									if ($t['scheme']=='https') {
											$fp = fsockopen('ssl://'. $t['host'], $t['port']);
									} else {
											$fp = fsockopen($t['host'], $t['port'], $errno, $errstr, 5);
									}
									if (!$fp) {
											$songtitle="reading history..."; // sever is offline
									} else {
											fputs($fp, "GET /played.html HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n");
											while (!feof($fp)) {
												$info = fgets($fp);
											}
									}
					}
					$songtitle=$info;

					if (trim($songtitle)=='') {
							$songtitle="The song title is not available";
					}

					echo $songtitle;
}
?>
