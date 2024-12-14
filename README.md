## Mockmondo Testing Suite

An extension of the [Mockmondo](https://github.com/nannalea/mockmondo) project focusing on developing a testing suite to learn about and experiment with implementing various testing methods in a project.

## Getting started

To be able to run the tests of this project, you'll need to ensure that its dependencieas are properly installed, set up the database (ie. by adding **./db/momondo-testing.sql** to PHPMyAdmin), and obtain an API key from the following API:

[Weatherstack](https://weatherstack.com/?utm_source=google&utm_medium=cpc&utm_campaign=weatherstack_Search_EU&gad_source=1&gclid=Cj0KCQiAgJa6BhCOARIsAMiL7V9rPbCQJwUlmRvynTcsdhITLM8Pfph4Hs5nCUhf_c3wifEyPstC7wQaArX2EALw_wcB)

Once you have your API key, create (or edit) a new file named **environment.php** and add the following lines of code to it:

```php
<?php

putenv("API_KEY=INSERT_YOUR_KEY_HERE");
```

Before attempting to run any of the test commands, please also run the following command from the **main** branch to make sure all project dependencies are installed:

```bash
npm install
```

## Testing Cheat Sheet

### ES Lint

- To run ES Lint on a specific document: npx eslint <document.js>

### Code_Sniffer

- To run linter on specific document: `./vendor/bin/phpcs api-signup.php`
- To run linter on all .php files: `./vendor/bin/phpcs *.php`
- To auto-fix issues: `./vendor/bin/phpcbf <document.php>`

- Note: The ruleset has edited to allow the shorthand for echo. It can be found here: `./vendor/squizlabs/standards/PEAR/ruleset.xml`

### PHP Unit

- To run all tests in the unit-test folder: `composer unittest`
- To run all tests in the integration-test folder: `composer test`
- To run all tests (with colors): `vendor/bin/phpunit --colors`
- To run all tests in a specific document (with colors): `vendor/bin/phpunit unit-test/getFlightTest.php  --colors`
- To run specific test in a document (with colors): `vendor/bin/phpunit unit-test/getFlightTest.php --filter <test name>  --colors`
  - Example: `vendor/bin/phpunit unit-test/getFlightTest.php --filter testArrayHasKey  --colors`

### Cypress

- To open Cypress GUI: npx cypress open
- To run tests from the terminal: npx cypress run

### JMeter

- Install using Homebrew (macOS): `brew install jmeter`
- Find path to JMeter Installation on macOS: `which jmeter`
- Run JMeter: `jmeter`
- Run tests in terminal: `jmeter -n -t /path/to/testplan.jmx -l /path/to/results.jtl` (ie. `jmeter -n -t ./jmeter/mockmondo.jmx -l ./jmeter/mockmondo-results.jtl`)
- Note: Both .csv and .jtl can be used to create the resulting html-report
- If you get the ‘byte limit is exceeded’ error, you may need to change the memory limit in **jmeter.sh** or **jmeter.bat**:
  `HEAP="-Xms1024m -Xmx2048m"`

### XDebug + PHP Unit Code Coverage Report

- Generate code coverage report as html-document: `XDEBUG_MODE=coverage ./vendor/bin/phpunit integration-test --coverage-html coverage`
- Note: Make sure to that the following settings are set in your **php.ini** file:
  - `zend_extension = xdebug`
  - `xdebug.mode = coverage`
  - If you get the ‘byte limit is exceeded’ error, you may need to change the memory as well: `memory_limit = 512M`

## Mock User Login

Experience the site as a logged-in user using the mock credentials provided below:

    Mail: a@a.com
    Password: password

This will also enable you to delete flights from the database.

## Stack

This project was built using the following tools and technologies:

- HTML
- CSS
- JavaScript
- PHP
- SQL
- PHPMyAdmin
- MAMP
- PHPUnit
- Cypress
- ESLint
- Code_Sniffer
- JMeter
- XDebug
- Weatherstack (API)

## Acknowledgements

This project was developed in collaboration with three fellow students.
