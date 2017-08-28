# schemaserver

[![GitHub license](https://img.shields.io/badge/license-GPL-blue.svg)](https://raw.githubusercontent.com/superuserdev/schemaserver/master/LICENSE)
[![GitHub version](https://img.shields.io/github/release/superuserdev/schemaserver.svg)](https://github.com/superuserdev/schemaserver/releases)
[![Build Status](https://travis-ci.org/superuserdev/schemaserver.svg?branch=master)](https://travis-ci.org/superuserdev/schemaserver)
[![GitHub issues](https://img.shields.io/github/issues/superuserdev/schemaserver.svg)](https://github.com/superuserdev/schemaserver/issues)
[![GitHub pull requests](https://img.shields.io/github/issues-pr/superuserdev/schemaserver.svg)](https://github.com/superuserdev/schemaserver/pulls)
[![Join the chat at https://gitter.im/schemaserver/Lobby](https://badges.gitter.im/schemaserver/Lobby.svg)](https://gitter.im/schemaserver/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[![GitHub forks](https://img.shields.io/github/forks/superuserdev/schemaserver.svg?style=social&label=Fork)](https://github.com/superuserdev/schemaserver#fork-destination-box)
[![GitHub stars](https://img.shields.io/github/stars/superuserdev/schemaserver.svg?style=social&label=Star)](https://github.com/superuserdev/schemaserver/stargazers)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/superuserdev/schemaserver.svg?style=social)](https://twitter.com/intent/tweet?url=https%3A%2F%2Fgithub.com%2Fshgysk8zer0%2Fschemaserver&via=shgysk8zer0)

A microdata-based API server written in PHP using PostgreSQL
- - -
## Overview
- [Installation](#installation)
- [Usage](#usage)
- [Issues](https://github.com/superuserdev/schemaserver/issues)
- [Contributing](./docs/CONTRIBUTING.md)

A PHP implementation of [shgysk8zer0/api-specs](https://github.com/shgysk8zer0/api-specs)
using [PostgreSQL](https://www.postgresql.org/download).

## Installation
```sh
git submodule add git://github.com/superuserdev/schemaserver.git path/to/classes/superuserdev/schemaserver
```

If you or on Fedora, install PostgreSQL using:
```sh
sudo dnf install php-pgsql
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
use \SuperUserDev\SchemaServer\{Thing}

// Use (need to set Content-Type header)
header('Content-Type: ' . Thing::CONTENT_TYPE);

$thing = new Thing();
$thing->name = 'Thing 1';
echo json_encode($thing);
```
