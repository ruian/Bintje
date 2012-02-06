Bintje
========
![Bintje](http://img821.imageshack.us/img821/4438/bencha.jpg)
PHP Benchmark
=============

Small tool to make bench from portion of code

* How to install it ?

    `php5 composer.phar install`

* API

    ```php
    Ruian\Benchmark\Bintje->start()
    //Start the process, initiate the timer
    //@return void
    ```

    ```php
    Ruian\Benchmark\Bintje->stop()
    //Stop the process, make simple calcul with the start time and the end time
    //@return void
    ```

    ```php
    Ruian\Benchmark\Bintje->add()
    //Add another timer and make the calcul of the previous bench
    //@return void
    ```

    ```php
    Ruian\Benchmark\Bintje->wait()
    //Break the process, will endwait() is not launch
    //@return void
    ```

    ```php
    Ruian\Benchmark\Bintje->endwait()
    //Continue the process after a wait call
    //@return void
    ```

    ```php
    Ruian\Benchmark\Bintje->results()
    //When a bench is finished call this method to obtain results
    //@return array
    ```

    ```php
    Ruian\Benchmark\Bintje->log($path)
    //Write your bench result into a file called bintje.log with the path you referer
    //@return void
    ```