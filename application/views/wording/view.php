<div class="col h1"><?= Kohana::message('page', 'view') ?></div>
<div class="col-md-8 order-md-1">

    <div class="row">
        <div class="col">
            <div class="btn-group" role="group" aria-label="Basic example">                    
                <button title="<?= Kohana::message('button', 'return') ?>" name="btnBack" id="btnBack" onclick="back();" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.back')) ?></button>
                <button title="<?= Kohana::message('button', 'cancel') ?>" name="bnCancel" id="btnCancel" onclick="go('<?= URL::site('home') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.cancel')) ?></button>
            </div>
        </div>
    </div>
    <br/>
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('correction', 'iscorrected') ?>: </label>
        <?= ($wording->iscorrected)? Kohana::message('button', 'yes') : Kohana::message('button', 'no') ?>
    </div>
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('correction', 'isselected') ?>: </label>
        <?= ($wording->correction->isselected)? Kohana::message('button', 'yes') : Kohana::message('button', 'no') ?>
    </div>
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('theme', 'theme.singular') ?>: </label>
        <?= $wording->theme->theme; ?>
    </div>
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('secret', 'secret.singular') ?>: </label>
        <?= $wording->secret->value ?>
    </div>    
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('correction', 'note') ?>:</label>
        <?= ($wording->correction->note)? $wording->correction->note : '-' ?>
    </div>
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('correction', 'comments') ?>:</label>
        <?= ($wording->correction->comments)? $wording->correction->comments : '-' ?>
    </div>
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('correction', 'broker') ?>:</label>
        <?= ($wording->correction->person->name)? $wording->correction->person->name : '-' ?>
    </div>
    <div class="mb-3">
        <label class="bold"><?= Kohana::message('correction', 'correction.singular') ?>:</label>
        <?= ($wording->correction->person->name)? Date::formatted_time($wording->correction->date, 'd/m/Y') : '-' ?>
    </div>
    <div class="mb-3">
        <embed src="<?= URL::site('wordings') . "/" . $wording->url ?>" width="800" height="300"> 
    </div>
</div>