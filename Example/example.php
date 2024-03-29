<?php
require_once __DIR__ . '/../vendor/.composer/autoload.php';

use Ruian\Benchmark\Bintje;

// Initiate an array with some variables
$test = array();
for ($i=0; $i < 50; $i++) { 
    $test[] = uniqid();
}

// Start the Bench
$bench = new Bintje();
$bench->start();

$length = count($test);
for ($i=0; $i < $length; $i++) { 
    echo $test[$i];
}

// Wait because we need to put the pointer at the beginning 
$bench->wait();
reset($test);
$bench->endwait();

$bench->add();

foreach ($test as $value) {
    echo $value;
}

// Stop bench and write it into bintje.log 
$bench->stop();

// Show results
var_dump($bench->results());
$bench->log(__DIR__);