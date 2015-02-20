<?php

$a = [1, 2, 3, 4, 5];

$t1 =microtime();
$m1 = memory_get_usage();
function genOneToThree ($a)
{
    foreach ($a as $v) {
        yield $v;
    }
}
foreach (genOneToThree($a) as $v) {
    echo $v.PHP_EOL;
}
$t1 = microtime() - $t1;
$m1 = memory_get_usage() - $m1;
$t2 =microtime();
$m2 = memory_get_usage();
foreach ($a as $v) {
    echo $v.PHP_EOL;
}
$t2 = microtime() - $t2;
$m2 = memory_get_usage() - $m2;
print(sprintf('Time: %f - %f, Memory: %f - %f', $t1, $t2, $m1, $m2).PHP_EOL);
