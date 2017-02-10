# SMSDispatcher

## Introduction

Based on Zend 3.0.2-dev

This is a dummy implementation that provides a service to send SMS messages and to query related data.

You will find the following:

1. Services that provides data as Json and XML.
2. Implements the Repository Pattern and single responsibility principle.

   Modules:
   
       SMSModel 
                SmsRepository
                This implementation has not depencencies with Zend
                and could be used also independently with any other 
                framework like Symphony.
                
       SMS      
                Extends the functionality of SMSModel
                Creates the Factories in a proper way.
                
       SMS_API_SERVICES
                Builds the Controllers.
                ViewModel is being injected over a factory into each controller.
                SmsRepository is being injected also into each controller.
   Database:
       
       Dump provided at Dump folder.

## Installation

1. Get the project from github
```
    $git clone https://github.com/fmacias/SMSDispatcher
```
2. At the project folde
```
   $composer install
``` 
3. Import the database.
```
  Dump available at dump folder.
```

Once installed, you can test it out immediately using PHP's built-in web server:

```bash
$ cd path/to/install
$ php -S 0.0.0.0:8080 -t public/ public/index.php
# OR use the composer alias:
$ composer serve
```

This will start the cli-server on port 8080, and bind it to all network
interfaces. You can then visit the site at http://localhost:8080/
- which will bring up Zend Framework welcome page.

**Note:** The built-in CLI server is *for development only*.

## Development mode

The skeleton ships with [zf-development-mode](https://github.com/zfcampus/zf-development-mode)
by default, and provides three aliases for consuming the script it ships with:

```bash
$ composer development-enable  # enable development mode
$ composer development-disable # disable development mode
$ composer development-status  # whether or not development mode is enabled
```

You may provide development-only modules and bootstrap-level configuration in
`config/development.config.php.dist`, and development-only application
configuration in `config/autoload/development.local.php.dist`. Enabling
development mode will copy these files to versions removing the `.dist` suffix,
while disabling development mode will remove those copies.

Development mode is automatically enabled as part of the skeleton installation process. 
After making changes to one of the above-mentioned `.dist` configuration files you will
either need to disable then enable development mode for the changes to take effect,
or manually make matching updates to the `.dist`-less copies of those files.

## Running Unit Tests

To run the supplied skeleton unit tests, you need to do one of the following:

- During initial project creation, select to install the MVC testing support.
- After initial project creation, install [zend-test](https://zendframework.github.io/zend-test/):

  ```bash
  $ composer require --dev zendframework/zend-test
  ```

Once testing support is present, you can run the tests using:

```bash
$ ./vendor/bin/phpunit
```

If you need to make local modifications for the PHPUnit test setup, copy
`phpunit.xml.dist` to `phpunit.xml` and edit the new file; the latter has
precedence over the former when running tests, and is ignored by version
control. (If you want to make the modifications permanent, edit the
`phpunit.xml.dist` file.)

## Web server setup

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

Mode Rewrite is required
```
$sudo a2enmod rewrite
```
```apache
<VirtualHost *:80>
        ServerName Zend-ResFull-Json-Xml.localhost
        DocumentRoot /[Your Path]/SMSDispatcher/public
        SetEnv APPLICATION_ENV "development"
        <Directory /[Your Path]/SMSDispatcher/public>
                DirectoryIndex index.php
                AllowOverride All
                Require all granted
        </Directory>
</VirtualHost>
```
Enable the configuration
```
a2ensite [yourfilename].conf
```
Add mapp your host name at
```
/etc/hosts
```
Reload Apache
```
$service apache2 reload
```