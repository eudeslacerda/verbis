<div class="col h1">
    <?= Kohana::message('user', 'myaccount') ?>
</div>
<div class="col-md-8 order-md-1">   
    <form name="frmUserNew" action="<?= $actionForm ?>" method="post" accept-charset="uft-8" class="needs-validation" novalidate>
        <div class="row">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button tabindex="9" title="<?= Kohana::message('button', 'save') ?>" name="btnSave" id="btnSave" type="submit" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.save')) ?></button>                    
                    <button tabindex="10" title="<?= Kohana::message('button', 'clear') ?>" name="btnClear" id="btnClear" type="reset" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.clear')) ?></button>                    
                    <button tabindex="11" title="<?= Kohana::message('button', 'return') ?>" name="btnBack" id="btnBack" onclick="back();" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.back')) ?></button>
                    <button tabindex="12" title="<?= Kohana::message('button', 'cancel') ?>" name="bnCancel" id="btnCancel" onclick="go('<?= URL::site('home') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.cancel')) ?></button>
                </div>
            </div>
        </div>
        <br/>
        <div class="mb-3">
            <label for="txtName"><?= Kohana::message('people', 'name') ?></label>
            <input tabindex="4" name="txtName" type="text" class="form-control" id="txtName" placeholder="<?= Kohana::message('people', 'name') ?>" value="<?= $user->person->name ?>" required>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'people.invalidName') ?></div>
        </div>
        <div class="mb-3">
            <label for="email"><?= Kohana::message('user', 'email') ?></label>
            <input tabindex="5" value="<?= $user->email ?>" type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'invalidEmail') ?></div>
        </div>
        <div class="mb-3">
            <label for="username"><?= Kohana::message('user', 'username') ?></label>
            <input tabindex="6" value="<?= $user->username ?>" name="username" type="text" class="form-control" id="username" placeholder="<?= Kohana::message('user', 'username') ?>" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'user.invalidUserName') ?></div>
        </div>
        <div class="mb-3">
            <label for="password"><?= Kohana::message('user', 'password') ?></label>
            <input tabindex="7" name="password" type="password" class="form-control" id="password" placeholder="<?= Kohana::message('user', 'password') ?>" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'user.invalidPassword') ?></div>
        </div>
        <div class="mb-3">
            <label for="password_confirm"><?= Kohana::message('user', 'confirme') . " " . Kohana::message('user', 'password') ?></label>
            <input tabindex="8" name="password_confirm" type="password" class="form-control" id="password_confirm" placeholder="<?= Kohana::message('user', 'confirme') . " " . Kohana::message('user', 'password') ?>" required>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
    </form>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>