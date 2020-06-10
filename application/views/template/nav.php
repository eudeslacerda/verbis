<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= URL::site('/') ?>">LABORATÓRIO NOTA MIL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= Kohana::message('menu', 'external.projeto.objetivo.url') ?>"><?= Kohana::message('menu', 'external.projeto.objetivo.text') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Kohana::message('menu', 'external.redacao.url') ?>"><?= Kohana::message('menu', 'external.redacao.text') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Kohana::message('menu', 'external.chave.url') ?>"><?= Kohana::message('menu', 'external.chave.text') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Kohana::message('menu', 'external.acesso.url') ?>"><?= Kohana::message('menu', 'external.acesso.text') ?></a>
            </li>
        </ul>
    </div>
</nav>