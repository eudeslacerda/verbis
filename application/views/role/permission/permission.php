<div class="col h1"><?= Kohana::message('role', 'permission') . " " . Kohana::message('page', 'of') . " " . Kohana::message('role', 'role.singular') ?></div>
<div class="col-md-8 order-md-1">
    <form name="frmUserNew" enctype="multipart/form-data" action="<?= $actionForm ?>" method="post" accept-charset="uft-8" class="needs-validation" novalidate>
        <div class="row">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button title="<?= Kohana::message('button', 'save') ?>" name="btnSave" id="btnSave" type="submit" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.save')) ?></button>                    
                    <button title="<?= Kohana::message('button', 'clear') ?>" name="btnClear" id="btnClear" type="reset" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.clear')) ?></button>                    
                    <button title="<?= Kohana::message('button', 'return') ?>" name="btnBack" id="btnBack" onclick="back();" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.back')) ?></button>
                    <button title="<?= Kohana::message('button', 'cancel') ?>" name="bnCancel" id="btnCancel" onclick="go('<?= URL::site('home') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.cancel')) ?></button>
                </div>
            </div>
        </div>
        <br/>
        <div class="mb-3">
            <label for="txtRole"><?= Kohana::message('role', 'role.singular') ?></label>
            <input tabindex="1" value="<?= $role->getName() ?>" readonly name="txtRole" type="text" class="form-control" id="txtTheme" placeholder="<?= Kohana::message('role', 'role.singular') ?>" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label for="txtDescription"><?= Kohana::message('role', 'description') ?></label>
            <textarea name="txtDescription" class="form-control" id="txtDescription" required readonly><?= $role->getDescription() ?></textarea>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label><?= Kohana::message('menu', 'menu.plural') ?></label>
            <?php
            $checked='';
            foreach ($menus as $value) {
                foreach ($perfis as $menu) {
                    if ($value->id == $menu->id) {
                        $checked = 'checked';
                        break;
                    } else {
                        $checked = '';
                    }
                }
                ?>
                <div class="form-check">
                    <input id="chkMenu" name="chkMenu[]" type="checkbox" value="<?= $value->id ?>" class="form-check-input" <?= $checked ?>/>
                    <label class="form-check-label" for="chkMenu"><?= $value->menu ?></label>
                </div>
                <?php
            }
            ?>
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