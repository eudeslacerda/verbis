<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div style="float: right">
        <img src="<?= URL::site('storage/media/images/logoDoSite.png') ?>" width="300" height="240" style="margin-bottom: 5px"/><br/>
    </div>

    <div class="container">
        <h1 class="display-3">
            <img class="rounded-circle" src="/storage/media/images/chave.jpg" alt="Generic placeholder image" width="140" height="140">
            <?= Kohana::message('page', 'listof') . " " . Kohana::message('secret', 'secret.plural') ?>
        </h1>
        <p>
            Veja abaixo o que são as chaves e como utilizá las!
        </p>
    </div>
</div>

<div class="container marketing">
    <p class="lead" style="text-align: justify">
        A chave é uma combinação única de letras e números, cada instituição de ensino possui uma
        diferente, contendo um prazo de validade e quantidade. Será usada para validar o envio de
        redações para a correção, por isso o usuário deve se atentar para a validade da chave de
        sua instituição, pois se chaves inválidas forem inseridas o envio da redação será bloqueado.<br>
    </p>
    <div class="row featurette">
        <div class="col h1" style="text-align: center"></div>
        <table class="table" id="list">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">#</th>
                    <th scope="col"><?= Kohana::message('secret', 'value') ?></th>
                    <th scope="col"><?= Kohana::message('secret', 'validity') ?></th>
                    <th scope="col"><?= Kohana::message('secret', 'quantity') ?></th>
                    <th scope="col"><?= Kohana::message('institution', 'institution.singular') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($keys)) {
                    foreach ($keys as $liste) {
                        ?>
                        <tr class="table-bordered">
                            <th scope="row"><?= $liste->id ?></th>
                            <td><?= $liste->value ?></td>
                            <td><?= Date::formatted_time($liste->validity, "d/m/Y") ?></td>
                            <td><?= $liste->quantity ?></td>
                            <td><?= $liste->institution->institution ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5"><?= Kohana::message('information', 'secret.infoNotFoundMessege') ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <p class="lead" style="text-align: justify">
        A priori serão aceitas 40 redações mensais, 20 do IFNMG-Campus Arinos e outras 20 da Escola
        Estadual Major Sant'Clair, somente os alunos que enviarem antes da quantidade
        aceita se esgotar, terão suas redações corrigidas.<br><br>

        COMO USAR: Basta selecionar a chave referente a sua instituição, copiar e colar no campo
        destinado as chaves, no menu "Minhas Redações", se sua chave for válida o envio será autorizado.<br><br>
    </p>
</div>