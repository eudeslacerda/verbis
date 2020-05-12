<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= URL::site('/') ?>">Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">        
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="<?= URL::site('home') ?>" class="nav-link">Home</a>
            </li>
            <?php
            if (!is_null($itensMenu)) {

                $itens = $itensMenu;
                foreach ($itens as $item) {
                    if ($item->parent == 0) {
                        $menus['id'][] = $item->id;
                        $menus['parent'][] = $item->parent;
                        $menus['menu'][] = $item->menu;
                        $menus['address'][] = $item->address;
                    } else {
                        $submenus['id'][] = $item->id;
                        $submenus['parent'][] = $item->parent;
                        $submenus['menu'][] = $item->menu;
                        $submenus['address'][] = $item->address;
                    }
                }
                if (isset($menus)) {
                    for ($i = 0; $i < count($menus['id']); $i++) {
                        if (isset($submenus)) {
                            $indices = array_search($menus['id'][$i], $submenus['parent']);
                        } else {
                            $indices = -1;
                        }
                        ?>
                        <li class="nav-item <?= ($indices > -1) ? 'dropdown' : '' ?>">
                            <a class="nav-link <?= ($indices > -1) ? 'dropdown-toggle' : '' ?>" <?= ($indices > -1) ? 'href="#" id="dropdown' . $i . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : 'href="' . URL::site($menus['address'][$i]) . '"' ?>><?= $menus['menu'][$i] ?></a>
                            <?php
                            if ($indices > -1) {
                                ?>
                                <div class="dropdown-menu" aria-labelledby="dropdown<?= $i ?>">
                                    <?php
                                    for ($a = 0; count($submenus['id']) > $a; $a++) {
                                        if ($submenus['parent'][$a] == $menus['id'][$i]) {
                                            ?>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?= URL::site($submenus['address'][$a]) ?>"><?= $submenus['menu'][$a] ?></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </li>
                        <?php
                    }
                }
            }
            ?>

        </ul>
    </div>
    <?php
    $user = DAO_User::getInstance()->findUserForCode(Auth::instance()->get_user());
    ?>
    <form class="form-inline my-2 my-lg-0">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">        
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $user->person->name ?>
                    </a>                        
                    <div class="dropdown-menu" aria-labelledby="dropdown">
                        <a class="dropdown-item" href="#">
                            <?php
                            foreach ($user->roles->find_all() as $value) {
                                echo $value->name;
                            }
                            ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= URL::site('user/myaccount/') . '/' . Auth::instance()->get_user() ?>">Minha Conta</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= URL::site('auth/logout') ?>">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</nav>