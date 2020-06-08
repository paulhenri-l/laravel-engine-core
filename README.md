# laravel-engine

![Tests](https://github.com/paulhenri-l/laravel-engine/workflows/Tests/badge.svg)

A Laravel package to help you create Laravel packages.

Laravel engine's goal is to provide you with the tools to efficiently and easily
hook your packages into a Laravel Application.

No more tinkering around to edit the application scheduler. No more searching
through stack overflow to register middlewares, routes, listeners, commands,
config from your package. All of that including unit testing is baked in!

Everything you may want will be one function call away letting you focus on your
package's code instead of the framework internals.

## Next Version

I'd like to make engine more like tiny Laravel applications where you'd not have
to call functions from a service provider but rather something that is code
driven. Just as you can edit Laravel's Http and Console Kernels an engine should
have editable Kernel like classes.

This will help us achieve full autoloading and no code at all will be required
from the developer. Just as it is in a Laravel application.

Package creation should be as easy as regular Laravel development.

To achieve this vision here are a few things that must be tackled.

- Autoload everything
- Console Kernel (Add commands and edit schedule)
- Http Kernel (Add middlewares and groups)
- EngineProviders Just as Services providers but for an engine.

## TODO Dev experience

- Assets compilation (install console or skeleton)
- Generators (console)
- Database factories
- Load private views
- Cache what is cachable (autoloading especially)
- test config
