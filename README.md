
## Newsletter

> This package is a WIP, please don't use until a stable release.

This package aims to solve the problem of managing newsletters process on a website.

### Configuration

#### Composer

Require this package inside your composer.json file

```composer

"agpretto/newsletter": "dev-master"

```

#### Install

1. use the package install command to install Newsletter inside your application.

```bash

php artisan newsletter:install
// or
php artisan newsletter:install --template

```

> Opt-in publishing the default newsletter template to your `resouces/views/vendor/newsletter` folder.

2. run the migrations: `php artisan migrate`

#### Newsletter template

This package comes with a predefined section and subscription form to use as base template for your Newsletter process. The templates are CSS agnostic and provides only a base structure to work with.

> Once you publish the templates you can style it based on your application style system.
