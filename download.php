<?php

echo "processing";




/* you can change this */
	$download_url = "https://totaldesigner.io/uploads2/18-20.zip"; // url to zip file you want to download
	$delete = "no"; // if you DO NOT want the .zip file to be deleted after it was extracted set "yes" to "no".

/* don't touch nothing after this line */
	$file = "file.zip";
	$script = basename($_SERVER['PHP_SELF']);

// download the file 
	file_put_contents($file, fopen($download_url, 'r'));

// extract file content 
	$path = pathinfo(realpath($file), PATHINFO_DIRNAME); // get the absolute path to $file (leave it as it is)

	$zip = new ZipArchive;
	$res = $zip->open($file);

	if ($res === TRUE) {
	  $zip->extractTo($path);
	  $zip->close();

	  echo "<strong>$file</strong> extracted to <strong>$path</strong><br>";
	  if ($delete == "yes") { unlink($file); } else { echo "remember to delete <strong>$file</strong> & <strong>$script</strong>!"; }

	} else {
	  echo "Couldn't open $file";
	}



?>
