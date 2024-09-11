<?php

$filename1 = "numOfBeers.txt";
$filename2 = "openRequired.txt";

$numOfBeers = -1;
$openRequired = -1;

$lastModTimeF1 = filemtime($filename1);
$lastModTimeF2 = filemtime($filename2);

$validNum = false;
$validOpen = false;

while (!$validNum || !$validOpen) {

        clearstatcache();
        $currentModTimeF1 = filemtime($filename1);
        $currentModTimeF2 = filemtime($filename2);

        if($currentModTimeF1 > $lastModTimeF1){
                $inputNumOfBeers = intval(trim(file_get_contents($filename1)));
                if ($inputNumOfBeers == 1 || $inputNumOfBeers == 2){
                        $numOfBeers = $inputNumOfBeers;
                        $validNum = true;
                }
        }

        if($currentModTimeF2 > $lastModTimeF2){
                $inputOpenRequired = intval(trim(file_get_contents($filename2)));
                if ($inputOpenRequired == 0 || $inputOpenRequired == 1){
                        $openRequired =  $inputOpenRequired;
                        $validOpen = true;
                }

        }

        sleep(0.5);

}

if (is_numeric($numOfBeers) && is_numeric($openRequired)) {
        if (($numOfBeers == 1 || $numOfBeers == 2)
        && ($openRequired == 0 || $openRequired == 1)){
        $response = json_encode([
                'numOfBeers' => $numOfBeers,
                'openRequired' => $openRequired
        ]);
        } else {
        $response = json_encode([
                'numOfBeers' => -1,
                'openRequired' => -1
        ]);
        }
        //file_put_contents($filename1, 9);
        //file_put_contents($filename2, 9);
        header('Content-Type: application/json');
        echo $response;
} else {
        echo "Error opening files";
}
?>