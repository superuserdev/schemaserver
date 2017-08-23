# schemaserver
[![GitHub license](https://img.shields.io/badge/license-GPL-blue.svg)](https://raw.githubusercontent.com/shgysk8zer0/schemaserver/master/LICENSE)
[![GitHub version](https://img.shields.io/github/release/shgysk8zer0/schemaserver.svg)](https://github.com/shgysk8zer0/schemaserver/releases)
[![Build Status](https://travis-ci.org/shgysk8zer0/schemaserver.svg?branch=master)](https://travis-ci.org/shgysk8zer0/schemaserver)
[![GitHub issues](https://img.shields.io/github/issues/shgysk8zer0/schemaserver.svg)](https://github.com/shgysk8zer0/schemaserver/issues)

[![GitHub forks](https://img.shields.io/github/forks/shgysk8zer0/schemaserver.svg?style=social&label=Fork)](https://github.com/shgysk8zer0/schemaserver#fork-destination-box)
[![GitHub stars](https://img.shields.io/github/stars/shgysk8zer0/schemaserver.svg?style=social&label=Star)](https://github.com/shgysk8zer0/schemaserver/stargazers)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/shgysk8zer0/schemaserver.svg?style=social)](https://twitter.com/intent/tweet?url=https%3A%2F%2Fgithub.com%2Fshgysk8zer0%2Fschemaserver&via=shgysk8zer0)

A microdata-based API server written in PHP using PostgreSQL
- - -
## Overview
- [Installation](#installation)
- [Usage](#usage)
- [Issues](https://github.com/shgysk8zer0/schemaserver/issues)
- [Contributing](./docs/CONTRIBUTING.md)

A PHP implementation of [shgysk8zer0/api-specs](https://github.com/shgysk8zer0/api-specs)
using [PostgreSQL](https://www.postgresql.org/download).

## Installation
```sh
git submodule add git://github.com/shgysk8zer0/schemaserver.git path/to/classes/shgysk8zer0/schemaserver
```

## Usage
```php
<?php
namespace Project\Example;
// Setup auto-loading using `spl_autoload`
set_include_path(realpath('path/to/classes') . PATH_SEPARATOR . get_include_path());
spl_autoload_extensions('.php');
spl_autoload_register();
// Alias
use \shgysk8zer0\SchemaServer\{Thing}

// Use (need to set Content-Type header)
header('Content-Type: ' . Thing::CONTENT_TYPE);

$thing = new Thing();
$thing->name = 'Thing 1';
echo json_encode($thing);
```
