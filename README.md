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

## Database: Factory

```bash
php artisan tinker
```

```bash
> \App\Models\User::factory(1000)->create();
```

