# Lontara
## Twig Template

Pustaka untuk menggunakan template twig.

## Instalasi

1. Masuk ke folder application
```sh
cd application
```

2. Install twig
```sh
composer require "twig/twig:^3.0"
```

3. Jawab `n` jika muncul opsi/pertanyaan. Supaya file composer.json berada di application/

4. Pastikan composer autoload aktif di `application/config/config.php` 
```php
$config['composer_autoload'] = TRUE;
```

## Penggunaan

1. Lihat contoh penggunaan di file: `application/cotrollers/Twig_test.php`

Di controller:

```php
$data = [
    'title' => 'Sample Title'
];

//Function yang boleh digunakan template twig
//juga dapat didefinsikan secara global di 
//application/libraries/Twig_view.php di $allowed_functions

$functions = [
    'base_url', 'site_url', 'form_open', 'form_close'
];

echo $this->twig_view->render('test_twig', $data, $functions);
```

Di file `application/views/test_twig.twig`

```twig
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <title>{{ title }}</title>
    </head>
    <body>
        <h1>{{ title }}</h1>
    </body>
</html>
```

## Penggunaan Twig

Penggunaan twig selengkapnya dapat Anda lihat di:
[Dokumentasi Twig 3.x](https://twig.symfony.com/doc/3.x/)
