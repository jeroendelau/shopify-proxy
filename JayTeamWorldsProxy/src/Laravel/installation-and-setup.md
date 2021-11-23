---
title: Base installation
weight: 4
---

Installation:

```bash
composer require "jayteamworld/proxy"
```

## Preparing the database

You need to publish the migration to create the `media` table:

```bash
php artisan vendor:publish --provider="JayTeamWorlds\Proxy\Laravel\ProxyServiceProvider"
```

After that, you need to run migrations.

```bash
php artisan migrate
```