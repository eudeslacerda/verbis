<div class="col h1"><?= Kohana::message('correction', 'correct') ?></div>
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
            <label for="cmbTheme"><b><?= Kohana::message('people', 'name') ?></b>: </label>
            <?= $wording->student->person->name; ?>
        </div>
        <div class="mb-3">
            <label for="cmbTheme"><b><?= Kohana::message('theme', 'theme.singular') ?></b>: </label>
            <?= $wording->theme->theme; ?>
        </div>
        <div class="mb-3">
            <label for="txtSecret"><b><?= Kohana::message('secret', 'secret.singular') ?></b>: </label>
            <?= $wording->secret->value ?>
        </div>
        <div class="mb-3">
            <embed src="<?= URL::site('wordings') . "/" . $wording->url ?>" width="800" height="300"> 
        </div>
        <div class="mb-3">
            <label for="txtNote"><?= Kohana::message('correction', 'note') ?></label>
            <input tabindex="2" type="text" name="txtNote" class="form-control" id="txtNote" placeholder="" required/>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label for="txtNote"><?= Kohana::message('correction', 'comments') ?></label>
            <textarea class="form-control" name="txtComments" id="txtComments" cols="63" rows="10" required></textarea>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <div class="form-check">            
                <input class="form-check-input" type="checkbox" name="chkSelect" id="chkSelect"/>
                <label for="chkSelect"><?= Kohana::message('correction', 'isselected') ?></label>
            </div>
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