<form class="form-signin" accept-charset="utf-8" action="<?= $actionForm ?>" method="post" name="frmLogin">
    <div class="text-center mb-4">
        <img class="mb-4" src="<?= $logo ?>" alt="Logo VERBIS" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal"><?= Kohana::message('auth', 'access') ?></h1>
        <span class="message" style="color: red;"><?= (isset($messege)) ? $messege : '' ?></span>   
    </div>

    <div class="form-label-group">
        <input tabindex="1" name="username" type="text" id="username" class="form-control" placeholder="<?= Kohana::message('user', 'username') ?>" required autofocus/>
        <label for="username"><?= Kohana::message('user', 'username') ?></label>
    </div>

    <div class="form-label-group">
        <input tabindex="2" name="password" type="password" id="password" class="form-control" placeholder="<?= Kohana::message('user', 'password') ?>" required/>
        <label for="password"><?= Kohana::message('user', 'password') ?></label>
    </div>

    <div class="row">
        <label class="col-6">
            <input tabindex="3" type="checkbox" checked="checked" value="1" name="remember" id="remember"/> <?= Kohana::message('user', 'remember') ?>
        </label>
        <div class="col-6" style="text-align: right;">
            <a href="<?= URL::site('user/new') ?>" class="active"><?= Kohana::message('button', 'register') ?></a>
        </div>
    </div>
    <button tabindex="4" class="btn btn-lg btn-primary btn-block" type="submit"><?= Kohana::message('button', 'enter') ?></button>

</form>