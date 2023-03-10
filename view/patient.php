<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
    </head>
    <body>
        <?php
        if($params['user']->rule === 'patient') {
        ?>
        <form class="mt-2" dir="rtl" action="/patient" method="post">
            <input type="text" name="text">
            <select name="search" id="">
                <option value="name">نام</option>
                <option value="expertise">تخصص</option>
            </select>
            <input type="submit" value="search">
        </form>
        <?php
        $dir = str_replace('\\', '/', dirname(__DIR__));
        foreach($params['doctors'] as $user){
            ?>
        <img src="<?php echo $dir.'/images/'.$user['image'] ?>" alt="" style="width:100px;height:100px">
        <h2 dir="rtl"><?= $user['name']?></h2>
        <h5 dir="rtl"><?= $user['expertise'] ?></h5>
        <ul dir="rtl">
            <?php
            if(!empty($user['saturday'])) {
                ?>
            <li><?= ' شنبه : ' .  $user['saturday'] ?></li>
            <?php
            }
            ?>
            <?php
            if(!empty($user['sunday'])) {
                ?>
            <li><?=' یکشنبه : ' . $user['sunday'] ?></li>
                <?php
            }
                ?>
            <?php
            if(!empty($user['monday'])) {
                ?>
            <li><?=' دوشنبه : ' . $user['monday'] ?></li>
            <?php
            }
            ?>
            <?php
            if(!empty($user['tuesday'])) {
                ?>
            <li><?=' سه شنبه : ' . $user['tuesday'] ?></li>
            <?php
            }
            ?>
            <?php
            if(!empty($user['wednesday'])) {
                ?>
            <li><?=' چهارشنبه : ' . $user['wednesday'] ?></li>
            <?php
            }
            ?>
            <?php
            if(!empty($user['thursday'])) {
                ?>
            <li><?=' پنج شنبه : ' . $user['thursday'] ?></li>
            <?php
            }
            ?>
            <?php
            if(!empty($user['friday'])) {
                ?>
            <li><?=' جمعه : ' . $user['friday'] ?></li>
            <?php
            }
            ?>

        </ul>
        <?php
        }
        }
        ?>
    </body>
</html>