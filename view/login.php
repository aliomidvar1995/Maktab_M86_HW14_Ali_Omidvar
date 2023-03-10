<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body dir="rtl">
    <div class="container">
        <h1>ورود</h1>
        <form class="mt-5" id="form" action="" method="post">
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" name="email"
                    value="<?php print($params['model']->email ?? '') ?>"
                    class="form-control <?php print(!empty($params['errors']['email'])) ? 'is-invalid' : ''  ?>" aria-describedby="emailHelp"
                    placeholder="ایمیل">
                <div class="invalid-feedback">
                    <?php
                    if(!empty($params['errors']['email'])) {
                        print($params['errors']['email'][0].'<br>');
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label>رمز عبور</label>
                <input type="password" name="password"
                    value="<?php print($params['model']->password ?? '') ?>"
                    class="form-control <?php print(!empty($params['errors']['password'])) ? 'is-invalid' : ''  ?>" id="exampleInputPassword1"
                    placeholder="رمز عبور">
                <div class="invalid-feedback">
                    <?php
                    if(!empty($params['errors']['password'])) {
                        print($params['errors']['password'][0].'<br>');
                    }
                    ?>
                </div>
            </div>
            <button class="mt-3 btn btn-primary" type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
</body>

</html>