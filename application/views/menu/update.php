<div class="col h1"><?= Kohana::message('page', 'update') . " " . Kohana::message('menu', 'menu.singular') ?></div>
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
            <label for="cmbParent"><?= Kohana::message('menu', 'parent') ?></label>
            <select tabindex="1" name="cmbParent" class="form-control" id="cmbParent" required>
                <option value="">Selecione</option>
                <option value="0">Nenhum</option>
                <?php
                foreach ($menus as $value) {
                    ?>
                    <option value="<?= $value->id ?>" <?= ($value->id == $menu->getParent()) ? 'selected' : '' ?>><?= $value->menu ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label for="txtMenu"><?= Kohana::message('menu', 'menu.singular') ?></label>
            <input value="<?= $menu->getMenu() ?>" tabindex="1" name="txtMenu" type="text" class="form-control" id="txtMenu" placeholder="<?= Kohana::message('menu', 'menu.singular') ?>" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label for="txtAddress"><?= Kohana::message('menu', 'address') ?></label>
            <input value="<?= $menu->getAddress() ?>" tabindex="2" name="txtAddress" type="text" class="form-control" id="txtAddress" placeholder="<?= Kohana::message('menu', 'address') ?>" required />
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label for="txtOrdinance"><?= Kohana::message('menu', 'ordinance') ?></label>
            <input value="<?= $menu->getOrdinance() ?>" tabindex="4" name="txtOrdinance" type="number" class="form-control" id="txtOrdinance" required/>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <input tabindex="5" name="chkPublished" type=checkbox id="chkPublished" <?= ($menu->getPublished()) ? 'checked' : '' ?>/>
            <label for="chkPublished"><?= Kohana::message('menu', 'published') ?></label>
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