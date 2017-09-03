# Contributing to the project
**Table of Contents**
- [General](#general)
- [Requirements](#requirements)
- [Code Structure](#code-structure)
- [Tests](#tests)
- [Database](#database)

- - -

## General
Write access to the GitHub repository is restricted, so make a fork and clone that. All work should be done on its own branch, named according to the issue number (*e.g. `42` or `bug/23`*). When you are finished with your work, push your feature branch to your fork, preserving branch name (*not to master*), and create a pull request.

**Always pull from `upstream master` prior to sending pull-requests.**

## Requirements
- [Apache](https://httpd.apache.org/)
- [PHP](https://secure.php.net/)
- [PostgreSQL](https://www.postgresql.org/download)
- [Git](https://www.git-scm.com/download/)

## Code Structure
This project uses [`spl_autoload`](https://secure.php.net/manual/en/function.spl-autoload.php)
 for autoloading. This means:
- All file and directory names **MUST** be lower case for code
- All classes must have the namespace "SuperUserDev\SchemaServer"
- Class and namespaces are case-insensitive
- Paths must be namespaced relative to project root
(`\SuperUserDev\SchemaServer\Thing` can be found at `thing.php`)

Further, all classes **MUST** correspond to a type definition found on
[schema.org](https://schema.org/docs/schemas.html). No additional classes or properties are allowed!

All data setting methods **SHOULD** use typehinting to ensure
that, i.e., `Person::$worksFor` is an `Organization` and not a
`Place`.

## Tests
None yet, but basic linting will soon be implemented, and `assert`s will be
added later.

## Database
All database changes **MUST** include an updated database dump to `db.sql`. This
dump **MUST NOT** contain any data, and **MUST** contain all table structure.

Before beginning work on database, you **SHOULD** drop tables and update from `db.sql`
to ensure you are working on the latest version. `psql schema -f db.sql`

*See following command for example dump.*

```
pg_dump schema --no-owner --schema-only --inserts --if-exists --quote-all-identifiers --create --clean --file=db.sql
```
