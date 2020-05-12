<div class="col h1"><?= Kohana::message('menu', 'menu.plural') ?></div>
<div class="row">
    <div class="col">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button title="<?= Kohana::message('button', 'new.male') ?>" name="btnNew" id="btnNew" onclick="go('<?= $urlNew ?>')" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.new')) ?></button>
            <button title="<?= Kohana::message('button', 'update') ?>" name="btnUpdate" id="btnUpdate" disabled onclick="goActionButton('<?= URL::site('menu/update') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.update')) ?></button>
            <button title="<?= Kohana::message('button', 'view') ?>" name="btnView" id="btnView" disabled onclick="goActionButton('<?= URL::site('menu/view') ?>');" type="button" class="btn btn-primary"><?= HTML::image(Kohana::message('images', 'icons.view')) ?></button>
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
            <th scope="col"><?= Kohana::message('menu', 'menu.singular') ?></th>
            <th scope="col"><?= Kohana::message('menu', 'parent') ?></th>
            <th scope="col"><?= Kohana::message('menu', 'address') ?></th>
            <th scope="col"><?= Kohana::message('menu', 'ordinance') ?></th>
            <th scope="col"><?= Kohana::message('menu', 'published') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($menus)) {
            $itens = $menus;
            foreach ($menus as $menu) {
                ?>
                <tr onclick="setSelectedLine('#list',<?= $menu->id ?>, ['#btnUpdate', '#btnDelete']);">                    
                    <td><?= $menu->menu ?></td>                    
                    <td>
                        <?php
                        foreach ($itens as $item)
                            if ($menu->id == $item->parent)
                                echo $item->menu;
                        ?>
                    </td>
                    <td><?= $menu->address ?></td>
                    <td><?= $menu->ordinance ?></td>
                    <td><?= ($menu->published)? Kohana::message('button', 'yes') : Kohana::message('button', 'no') ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5"><?= Kohana::message('information', 'menu.infoNotFoundMessege') ?></td>
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
                <?= Kohana::message('warning', 'menu.deleteNotice') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= Kohana::message('button', 'no') ?></button>
                <button type="button" class="btn btn-primary" onclick="goActionButton('<?= URL::site('menu/delete') ?>');"><?= Kohana::message('button', 'yes') ?></button>
            </div>
        </div>
    </div>
</div>