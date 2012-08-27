PsUnit
======

Unit tests for PrestaShop 1.5.x

---

PsUnit aims to create a suite of unit tests for PrestaShop 1.5.x 

PrestaShop code is really hard to test, because it uses a lot of static methods, singletons, 
and global variables. 

PsUnit tries to enable / simplify testing PrestaShop's code by providing utilities / best practices 
to mock any application-wide component, or simulate a situation. 

This project is also here to highlight where and how to refactor PrestaShop. 

Requirements
------------

To run the project you will need to have [PHPUnit](http://www.phpunit.de/) 
and [Mockery](https://github.com/padraic/mockery) installed via PEAR. 

Running the test suite
----------------------

In the PsUnit directory, execute the command below

```
    phpunit --verbose --process-isolation --bootstrap bootstrap.php ./tests/
```