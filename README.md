# Training: Web Development with Laravel Framework (Basic) at mu dot my

Laravel training.

## VS Codes Extensions

- [ ] PHP Intelephese
- [ ] Prettier Code Formatter
- [ ] Blockman
- [ ] Laravel Blade Formatter
- [ ] Laravel Blade Snippets
- [ ] TailwindCSS Intellisense
- [ ] Vscode essentials
- [ ] vscode icons
- [ ] File Utils
- [ ] Laravel Goto View


## Install Laravel installer

```bash
composer global require laravel/installer
```

## Create Laravel Application


```bash
laravel new training --git --jet --stack=livewire
```

## Create a page

- [ ] Route - `routes/web.php`
  - [ ] Closure
  - [ ] Method
  - [ ] Resource
- [ ] Controller `app/Http/Controllers`
  - [ ] Invokable - `php artisan make:controller HelloWorldController -i`
  - [ ] Method - `php artisan make:controller HelloWorldController`
  - [ ] Resource - `php artisan make:controller UserController -r --model=User`
- [ ] View
  - [ ] located `resources/views`
  - [ ] with `.blade.php` extension

## Vite

Run the following command during development:

```bash
npm install
```

Run the Vite:

```bash
npm run dev
```

Compile assets for production:

```bash
npm run build
```

> You may want to run the build command in production OR commit the `public/builds` in your repository.

## Database: Factory

```bash
php artisan tinker
```

```bash
> \App\Models\User::factory(1000)->create();
```

## Database: Seeder

Create seeder

```bash
php artisan make:seeder DummySeeder
```

Seed data:

```bash
php artisan db:seed
```

Seed data specific to seeder class:

```bash
php artisan db:seed --class=DummySeeder
```

## Update Password throught Tinker

```bash
php artisan tinker
```

Then update the email and run the following:

```bash
\App\Models\User::where('email','your@email.com')->update(['password' => Hash::make('password')]);
```

## Authorization: Policy

Create policy:

```bash
php artisan make:policy UserPolicy --model=User
```

Using policy in Blade file:

```php
@can('view', $user)
    ...
@endcan
```

Using policy in controller:

```php
public function show(User $user)
{
    $this->authorize('view', $user);
}
```

Using policy in resource controller:

```php
public function __construct()
{
    $this->authorizeResource(\App\Models\User::class);
}
```

Using policy from current user logged in.

```php
if(auth()->user()->can('viewAny', \App\Models\User::class)) {
    ...
}
```

Using policy from user's object / current user logged in.

```php
if($user->can('viewAny', \App\Models\User::class)) {
    ...
}
```

Using custom policy name:

```php
public function download(User $user): bool
{
    return true;
}
```

```php
$user->can('download', \App\Models\User::class);
```
