[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner-direct-single.svg)](https://stand-with-ukraine.pp.ua)

<p align="center"><a href="https://github.com/viewi/viewi#logo"><img src="https://dev.viewi.net/logo.svg" alt="Viewi" height="150"/>
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>
<h1 align="center">Viewi for Laravel demo</h1>
<h2 align="center">A powerful tool for building full-stack and completely reactive web applications with PHP</h2>

Imagine Vue js or Angular but with similar user-friendly HTML templates and components but written in PHP. The application, which acts like a front-end framework and backend template engine simultaneously, renders identical contents on both sides. And you don't even need Node js. Isn't it awesome?

## Post Component example

`viewi-app\Components\Views\Posts\PostsPage.php`

```php
<?php

namespace Components\Views\Posts;

use Components\Models\PostModel;
use Viewi\BaseComponent;
use Viewi\Common\HttpClient;

class PostsPage extends BaseComponent
{
    public string $title = 'Viewi ft. Laravel - Reactive application for PHP';

    public ?PostModel $post = null;

    public function __init(HttpClient $http, int $postId)
    {
        $http->get("/api/posts/$postId")->then(function (PostModel $data) {
            $this->post = $data;
        }, function ($error) {
            echo $error;
        });
    }
}
```

`viewi-app\Components\Views\Posts\PostsPage.html`

```html
<Layout title="$title">
    <h1>$title</h1>
    <div><b>Data from the server:</b> {json_encode($post)}</div>
</Layout>
```

`routes\api.php`

```php
Route::get('/posts/{id}', function ($id) {
    $postModel          = new PostModel();
    $postModel->Id      = (int)$id;
    $postModel->Name    = 'Laravel ft. Viewi';
    $postModel->Version = 1;
    return new JsonResponse($postModel);
});
```

Get started
-----------
[Quick Start](https://viewi.net/docs)

Features
----------------
- Server-side rendering (SSR)
- Perfect page load score
- Client-side rendering (CSR)
- SEO friendly
- No "HTML over the wire."
- Reactive application
- Easy to use
- Simple templates syntax, a mix of HTML and PHP
- Generates javascript code for you
- Web, mobile, desktop applications support (planned)
- Does not require Node js

## How does it work?

Under the hood, Viewi translates view components into javascript and uses it for a reactive front-end application.

## Links

[Viewi docs](https://viewi.net/docs)

[Discussions (Forum)](https://github.com/viewi/viewi/discussions)

[Adapter package](https://github.com/ivanvoitovych/viewi-laravel)

[Laravel](https://laravel.com/)

## Installation

Assuming you have your Laravel application. If not, please create one.

#### Install viewi-lib/viewi-laravel package

`composer require viewi-lib/viewi-laravel`

#### Create Viewi application

`vendor/bin/viewi new -e -a`

OR

`vendor/bin/viewi new -a`

more here: [Installation Viewi](https://viewi.net/docs/installation)

#### Include Viewi routes

In routes\web.php include your Viewi app

`require __DIR__ . '/../viewi-app/viewi.php';`

OR if you have created Viewi app in a different folder:

`require __DIR__ . '/../path-to-your-viewi-app/viewi.php';`

#### All done, you are ready to go

Support
--------

We all have full-time jobs and dedicate our free time to this project, and we would appreciate Your help of any kind. If you like what we are creating here and want us to spend more time on this, please consider supporting:

 - Give us a star⭐.
 - Support me on [buymeacoffee](https://www.buymeacoffee.com/ivan.v)
 - Follow us on [Twitter](https://twitter.com/viewiphp).
 - Contribute by sending pull requests.
 - Any other ideas or proposals? Please mail me voitovych.ivan.v@gmail.com.
 - Feel welcome to share this project with your friends.


License
--------

MIT License

Copyright (c) 2020-present Ivan Voitovych

Please see [LICENSE](/LICENSE) for license text
