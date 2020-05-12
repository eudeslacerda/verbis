<div class="col h1">
    <?= Kohana::message('page', 'new.male') . " " . Kohana::message('user', 'user.singular') ?>
</div>
<div class="col-md-8 order-md-1">   
    <form name="frmUserNew" action="<?= $actionForm ?>" method="post" accept-charset="uft-8" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="txtName"><?= Kohana::message('people', 'name') ?></label>
            <input tabindex="1" name="txtName" type="text" class="form-control" id="txtName" placeholder="<?= Kohana::message('people', 'name') ?>" value="" required>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'people.invalidName') ?></div>
        </div>
        <div class="mb-3">
            <label for="email"><?= Kohana::message('user', 'email') ?></label>
            <input tabindex="1" type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'invalidEmail') ?></div>
        </div>
        <div class="mb-3">
            <label for="username"><?= Kohana::message('user', 'username') ?></label>
            <input tabindex="3" name="username" type="text" class="form-control" id="username" placeholder="<?= Kohana::message('user', 'username') ?>" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'user.invalidUserName') ?></div>
        </div>
        <div class="mb-3">
            <label for="password"><?= Kohana::message('user', 'password') ?></label>
            <input tabindex="4" name="password" type="password" class="form-control" id="password" placeholder="<?= Kohana::message('user', 'password') ?>" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'user.invalidPassword') ?></div>
        </div>
        <div class="mb-3">
            <label for="password_confirm"><?= Kohana::message('user', 'confirme') . " " . Kohana::message('user', 'password') ?></label>
            <input tabindex="5" name="password_confirm" type="password" class="form-control" id="password_confirm" placeholder="<?= Kohana::message('user', 'confirme') . " " . Kohana::message('user', 'password') ?>" required>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <hr class="mb-4">
        <input type="hidden" name="typeUser" value="Discente"/>
        <button tabindex="5" title="<?= Kohana::message('button', 'save') ?>" name="btnSave" id="btnSave" type="submit" class="btn btn-primary btn-lg btn-block"><?= HTML::image(Kohana::message('images', 'icons.save')) ?></button>
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