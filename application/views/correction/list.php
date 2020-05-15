<div class="col h1"><?= Kohana::message('correction', 'corrected') ?></div>
<div class="row">
    <div class="col">
        <div class="btn-group" role="group" aria-label="Basic example">            
            <button title="<?= Kohana::message('button', 'update') ?>" name="btnUpdate" id="btnUpdate" disabled onclick="goActionButton('<?= URL::site('theme/update') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.update')) ?></button>
            <button title="<?= Kohana::message('button', 'view') ?>" name="btnView" id="btnView" disabled onclick="goActionButton('<?= URL::site('theme/view') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.view')) ?></button>
            <button title="<?= Kohana::message('button', 'delete') ?>" name="btnDelete" id="btnDelete" disabled type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><?= HTML::image(Kohana::message('images', 'icons.delete')) ?></button>
            <button title="<?= Kohana::message('button', 'return') ?>" name="btnBack" id="btnBack" onclick="back();" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.back')) ?></button>
            <button title="<?= Kohana::message('button', 'cancel') ?>" name="bnCancel" id="btnCancel" onclick="go('<?= URL::site('home') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.cancel')) ?></button>
        </div>
    </div>
    <div class="col">
        <?= $pagination ?>
    </div>
</div>
<br/>
<table class="table" id="list">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><?= Kohana::message('people', 'name') ?></th>
            <th scope="col"><?= Kohana::message('institution', 'institution.singular') ?></th>
            <th scope="col"><?= Kohana::message('correction', 'correction.singular') ?></th>
            <th scope="col"><?= Kohana::message('correction', 'broker') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($corrections)) {
            foreach ($corrections as $value) {
                ?>
                <tr onclick="setSelectedLine('#list',<?= $value->id ?>, null);">
                    <th scope="row"><?= $value->id ?></th>
                    <td><?= $value->wording->student->person->name ?></td>
                    <td><?= $value->wording->student->institution->institution ?></td>
                    <td><?= Date::formatted_time($value->date, 'd/m/Y') ?></td>
                    <td><?= $value->person->name ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5"><?= Kohana::message('information', 'correction.notFound') ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <?= Kohana::message('modal', 'notice') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= Kohana::message('warning', 'theme.deleteNotice') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= Kohana::message('button', 'no') ?></button>
                <button type="button" class="btn btn-primary" onclick="goActionButton('<?= URL::site('theme/delete') ?>');"><?= Kohana::message('button', 'yes') ?></button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

    });
</script>