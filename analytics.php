<?php
date_default_timezone_set('Asia/Tokyo');
$fp = fopen('README.md','w+');
$path = 'R:\rfselcyqemtp3wgu.onion';
$md = '# coincheck-xem-darkweb-cryptocurrency-history'.PHP_EOL;
$md .= '|Date|Reserve|'.PHP_EOL;
$md .= '|:---|:---|'.PHP_EOL;
foreach (new DirectoryIterator($path) as $fileInfo) {
    if($fileInfo->isDot()) continue;
    if($fileInfo->getExtension() == 'sh'){ continue; }
    $contents = file_get_contents($fileInfo->getRealPath());
    preg_match("/\<\sDate\:\s(.*)/m",$contents,$date);
    if(!empty($date[1])){
        preg_match("/Reserve\:\s(.*)\sXEM/",$contents,$xem);
        if(!isset($xem[1])){
           break;
        }
        $md .= sprintf("|%s|%s|",date('Y-m-d H:i:s',strtotime($date[1])),str_replace("&comma;",",",$xem[1])).PHP_EOL;
    }

    //echo $fileInfo->getFilename() .PHP_EOL;
}

fwrite($fp,$md);
fclose($fp);
