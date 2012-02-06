<?php
namespace Ruian\Benchmark;

/**
* Just a little class to do some bench of portion code
*/
class Bintje
{
    protected $start;
    protected $results;
    protected $last;

    /**
     * Start bench of code
     *
     * @return void
     **/
    public function start()
    {
        $this->results = array();
        $this->last = $this->start = microtime(true);
    }

    /**
     * add a result without ending the bench
     *
     * @return void
     **/
    public function add()
    {
        $microtime = microtime(true);

        $result = array(
            'time_start'      => $microtime - $this->start,
            'time_exec'       => $microtime - $this->last
        );
        $this->last = $microtime;

        $this->results[] = $result;
    }

    /**
     * Stop bench of code
     *
     * @return void
     **/
    public function stop()
    {
        $microtime = microtime(true);

        $result = array(
            'time_start'      => $microtime - $this->start,
            'time_exec'       => $microtime - $this->last
        );

        $this->results[] = $result;
    }

    /**
     * Do a break
     *
     * @return void
     */
    public function wait()
    {
        $this->last = microtime(true);
    }

    /**
     * Stop break and retablish time
     *
     * @return void
     */
    public function endwait()
    {
        $microtime = microtime(true);
        $this->start -= $microtime - $this->last;
        $this->last = $microtime;
    }

    /**
     *
     * @return array
     **/
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Log into file if necessary
     */
    public function log($path)
    {
        foreach ($this->results as $result) {
            file_put_contents($path . '/bintje.log', sprintf('%s :: time_start = %s -- time_exec = %s %s', date('[d-M-Y G:i:s]'), $result['time_start'], $result['time_exec'], PHP_EOL), FILE_APPEND);
        }
    }
}