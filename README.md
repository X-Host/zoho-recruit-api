Zoho Recruit API
==============

PHP Zoho Recruit API.

### Dependencies

 - PHP 5.5;
 - guzzlehttp/guzzle:~6.0.

Installation
------------

The installation process can be performed by two ways, using the [packagist](https://packagist.org/packages/humantech/zoho-recruit-api) or cloning this repository.

### Packagist

Open a terminal and tip the below command:

```sh
$ composer require humantech/zoho-recruit-api
```

### Cloning

```sh
$ git clone https://github.com/humantech/zoho-recruit-api.git
$ composer install
```

Documentation
-------------

This package is compatible with PSR-2 and PSR-4. 

### Getting the Auth Token

[OAuth 2.0 for Zoho Recruit APIs - An Overview](https://www.zoho.com/recruit/developer-guide/apiv2/oauth-overview.html)

### Calling the getRecords

Given the Zoho Recruit Api documentation to method [getRecords](https://www.zoho.com/recruit/api-new/api-methods/getRecordsMethod.html), you
can get the records from Candidates like the following example:

```php
<?php

$client = new \Humantech\Zoho\Recruit\Api\Client\Client($token);

$jobOpenings = $client->getRecords('JobOpenings');

```

### More

See more examples in the [demo](https://github.com/humantech/zoho-recruit-api/blob/master/demo.php) file or in PHPUnit test classes.

License
-------

This package is under the MIT license. [See the complete license](https://github.com/humantech/zoho-recruit-api/blob/master/LICENSE).
