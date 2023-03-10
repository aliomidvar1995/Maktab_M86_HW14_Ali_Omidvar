<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Profile</title>
    </head>
    <body>
        <div class="container">
            <?php
            use core\Application;
            if($params['user']->rule === 'doctor') {
                if(!$params['completed']) {
            ?>
            <h3>
                <?php
                print($params['user']->name ?? '');
                ?>
            </h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>عکس پروفایل</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label>تخصص</label>
                    <select name="expertise" class="form-control">
                        <option value="پزشک عمومی">پزشک عمومی</option>
                        <option value="متخصص مغز و اعصاب">متخصص مغز و اعصاب</option>
                        <option value="متخصص قلب و عروق">متخصص قلب و عروق</option>
                        <option value="متخصص داخلی">متخصص داخلی</option>
                        <option value="متخصص کلیه">متخصص کلیه</option>
                        <option value="پزشک عمومی">پزشک عمومی</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>شنبه</label>
                    <select name="saturday" class="form-control">
                        <option value=""></option>
                        <option value="8-10">8-10</option>
                        <option value="10-12">10-12</option>
                        <option value="14-16">14-16</option>
                        <option value="16-18">16-18</option>
                    </select>
                    <label>یکشنبه</label>
                    <select name="sunday" class="form-control">
                        <option value=""></option>
                        <option value="8-10">8-10</option>
                        <option value="10-12">10-12</option>
                        <option value="14-16">14-16</option>
                        <option value="16-18">16-18</option>
                    </select>
                    <label>دوشنبه</label>
                    <select name="monday" class="form-control">
                        <option value=""></option>
                        <option value="8-10">8-10</option>
                        <option value="10-12">10-12</option>
                        <option value="14-16">14-16</option>
                        <option value="16-18">16-18</option>
                    </select>
                    <label>سه شنبه</label>
                    <select name="tuesday" class="form-control">
                        <option value=""></option>
                        <option value="8-10">8-10</option>
                        <option value="10-12">10-12</option>
                        <option value="14-16">14-16</option>
                        <option value="16-18">16-18</option>
                    </select>
                    <label>چهار شنبه</label>
                    <select name="wednesday" class="form-control">
                        <option value=""></option>
                        <option value="8-10">8-10</option>
                        <option value="10-12">10-12</option>
                        <option value="14-16">14-16</option>
                        <option value="16-18">16-18</option>
                    </select>
                    <label>پنج شنبه</label>
                    <select name="thursday" class="form-control">
                        <option value=""></option>
                        <option value="8-10">8-10</option>
                        <option value="10-12">10-12</option>
                        <option value="14-16">14-16</option>
                        <option value="16-18">16-18</option>
                    </select>
                    <label>جمعه</label>
                    <select name="friday" class="form-control">
                        <option value=""></option>
                        <option value="8-10">8-10</option>
                        <option value="10-12">10-12</option>
                        <option value="14-16">14-16</option>
                        <option value="16-18">16-18</option>
                    </select>
                </div>
                <div class="form-control">
                    <input type="hidden" name="user_id" value="<?php print(Application::$app->user->id) ?>">
                    <input type="submit">
                </div>
            </form>
            <?php
                }else {
                    $dir = str_replace('\\', '/', dirname(__DIR__));
                    // echo $dir.'/images/'.$params['completed']['image'];
                    // exit();
                    ?>
                    <img src="<?php echo $dir.'/images/'.$params['completed']['image'] ?>" alt="" style="width:100px;height:100px">
                    <h2 dir="rtl"><?= $params['user']->name ?></h2>
                    <p dir="rtl"><?= $params['completed']['expertise'] ?></p>
                    <?php
                    if(!empty($params['completed']['saturday'])){
                        ?>
                    <p dir="rtl"><?= ' شنبه = ' . $params['completed']['saturday'] ?></p>
                    <?php
                    }
                    ?>
                    <?php
                    if(!empty($params['completed']['sunday'])){
                        ?>
                    <p dir="rtl"><?= ' یکشنبه = ' . $params['completed']['sunday'] ?></p>
                    <?php
                    }
                    ?>
                    <?php
                    if(!empty($params['completed']['monday'])){
                        ?>
                    <p dir="rtl"><?= ' دوشنبه = ' . $params['completed']['monday'] ?></p>
                    <?php
                    }
                    ?>
                    <?php
                    if(!empty($params['completed']['tuesday'])){
                        ?>
                    <p dir="rtl"><?= ' سه شنبه = ' . $params['completed']['tuesday'] ?></p>
                    <?php
                    }
                    ?>
                    <?php
                    if(!empty($params['completed']['wednesday'])){
                        ?>
                    <p dir="rtl"><?= ' چهارشنبه = ' . $params['completed']['wednesday'] ?></p>
                    <?php
                    }
                    ?>
                    <?php
                    if(!empty($params['completed']['thursday'])){
                        ?>
                    <p dir="rtl"><?= ' پنج شنبه = ' . $params['completed']['thursday'] ?></p>
                    <?php
                    }
                    ?>
                    <?php
                    if(!empty($params['completed']['friday'])){
                        ?>
                    <p dir="rtl"><?= ' جمعه = ' . $params['completed']['friday'] ?></p>
                    <?php
                    }
                    ?>
                    <?php
                }
            }
            ?>
        </div>
    </body>
</html>