<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        // var_dump($params['users']);

        $dir = str_replace('\\', '/', dirname(__DIR__));

        foreach($params['users'] as $user){
            ?>
        <img src="<?php echo $dir.'/images/'.$user['image'] ?>" alt="" style="width:100px;height:100px">
        <h2 dir="rtl"><?= $user['name'] ?></h2>
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
        ?>
    </body>
</html>