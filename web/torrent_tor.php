<?php
$hash = $_GET['hash'];
$name = $_GET['name'];

//$file_dir = "http://bt.box.n0808.com/".substr($hash,0,2)."/".substr($hash,-2)."/".$hash.".torrent";
$file_dir = "http://torcache.net/torrent/".strtoupper($hash).".torrent";
$name = "[www.sougaoqing.com]".$name;
//echo $file_dir;
$file = @file_get_contents($file_dir); 
//echo($file);

if (!$file) { 
	echo "<script>alert('因为服务器问题，暂时种子下载暂停，请使用迅雷下载种子文件!');</script>"; 
} else { 
		Header("Content-type: application/octet-stream");
		Header("Content-Disposition: attachment; filename=" . $hash .".torrent"); 
	
		try{
			echo(gzdecode($file));
		}catch(Exception $e){
			echo 'error: ' .$e->getMessage();
		}	
}

?>