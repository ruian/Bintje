<?php
use Ruian\Benchmark\Bintje;

class BintjeTest extends \PHPUnit_Framework_TestCase
{
    public function testStart()
    {
        $bench = new Bintje();
        $bench->start();
        echo "hello world";
        $bench->stop();

        $this->assertTrue(is_array($bench->getResults()));
    }

    public function testStartWithAdd()
    {
        $bench = new Bintje();
        $bench->start();
        echo 'hello world';
        $bench->add();
        echo 'hello world';
        $bench->add();
        echo 'hello world';
        $bench->stop();
        
        $this->assertEquals(3, count($bench->getResults()));
    }

    public function testLog()
    {
        $bench = new Bintje();
        $bench->start();
        echo 'hello world';
        $bench->stop();

        $bench->log(__DIR__);

        $this->assertTrue(file_exists(__DIR__ . '/bintje.log'));
        unlink(__DIR__ . '/bintje.log');
    }

    public function testWaitAndEndWait()
    {
        $bench = new Bintje();
        $bench->start();
        echo 'hello world';
        $bench->wait();
        // Some stuff 
        echo 'foo';
        echo 'bar';
        $bench->endwait();
        $bench->stop();

        $this->assertEquals(1, count($bench->getResults()));
    }
}