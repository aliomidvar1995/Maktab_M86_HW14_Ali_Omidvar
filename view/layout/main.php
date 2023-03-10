<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body dir="rtl">
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mw-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/"><h1>خانه</h1></a>
                        </li>
                    </ul>
                    <?php
                    use core\Application;
                    if(Application::$app->isGuest()) {
                        ?>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/register">ثبت نام</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">ورود</a>
                        </li>
                    </ul>
                    <?php
                    }else{
                        ?>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/<?php print($params['user']->rule)?>">
                                <h2>
                                    <?php
                                    print($params['user']->name);
                                    ?>
                                </h2>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">
                                <h2>
                                    (خروج)
                                </h2> 
                            </a>
                        </li>
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg px-5 bg-success">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/brain">مغز و اعصاب</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/heart">قلب و عروق</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/kidney">کلیه</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/internal">داخلی</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/general">عمومی</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            {{content}}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous">
        </script>
    </body>
</html>