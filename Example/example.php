<?php
require_once __DIR__ . '/../vendor/.composer/autoload.php';

use Ruian\Benchmark\Bintje;

$test = array();
for ($i=0; $i < 50; $i++) { 
    $test[] = uniqid();
}

$bench = new Bintje();
$bench->start();

$length = count($test);
for ($i=0; $i < $length; $i++) { 
    echo $test[$i];
}

$bench->wait();
reset($test);
$bench->endwait();

$bench->add();



foreach ($test as $value) {
    echo $value;
}

$bench->stop();
$bench->log(__DIR__);