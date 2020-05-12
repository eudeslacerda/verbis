<div class="col h1"><?= "Meus Dados" ?></div>
<div class="col-md-8 order-md-1">
    <form name="frmUserNew" action="<?= $actionForm ?>" method="post" accept-charset="uft-8" class="needs-validation" novalidate>
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
            <label  for="cmbInstitution"><?= Kohana::message('institution', 'institution.singular') ?></label>
            <select class="form-control" tabindex="1" name="cmbInstitution" id="cmbInstitution" required>
                <option value="">Selecione</option>
                <?php
                foreach ($institutions as $institution) {
                    ?>
                    <option value="<?= $institution->id ?>"><?= $institution->institution ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label for="txtSerie"><?= Kohana::message('student', 'serie') ?></label>
            <input tabindex="2" type="number" name="txtSerie" class="form-control" id="txtValidity" placeholder="" required/>
            <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
        </div>
        <div class="mb-3">
            <label for="txtClass"><?= Kohana::message('student', 'class') ?></label>
            <div class="input-group">
                <input tabindex="3" name="txtClass" type="text" class="form-control" id="txtQunatity" placeholder="" required />
                <div class="invalid-feedback"><?= Kohana::message('warning', 'requiredField') ?></div>
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