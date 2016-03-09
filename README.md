# Silex-Simple
A simple project structure to get start with Silex


Installation:
-------------
.. code-block:: console

    $ composer create-project sadok-f/silex-simple

Browsing the Demo Application:
------------------------------
.. code-block:: console

    $php -S localhost:8888 -t web/ web/index_dev.php

Then, browse to http://localhost:8888/ or Then, browse to http://localhost:8888/MyName


Getting started with Silex:
---------------------------

* Create a new Controller that extend the CoreController, example `Core\Controller\contactController`
* Add a new entry in `config/routing.yml`, example :

.. code-block:: console

    contact_us_:
        path : /contact-us
        defaults: { _controller: 'Core\Controller\contactController::contactAction' }
