<?php

return array(
    'menu' => array(
        'plural' => 'Menus',
        'singular' => 'Menu'
    ),
    'address' => 'Endereço',
    'parent' => 'Filho',
    'ordinance' => 'Ordem',
    'published' => 'Publicado',
    'external' => array(
        'projeto' => array(
            'projeto' => array(
                'text' => "Projeto",
                'url' => "#"
            ),
            'objetivo' => array(
                'text' => "Objetivo",
                'url' => URL::site('site/objetivo')
            ),
            'publico' => array(
                'text' => "Público-Alvo",
                'url' => URL::site('site/publico')
            )
        ),
        'acesso' => array(
            'text' => "Acesso",
            'url' => URL::site('auth')
        ),
        'chave' => array(
            'text' => "Chave",
            'url' => URL::site('site/chave')
        ),
        'redacao' => array(
            'text' => "Redações",
            'url' => URL::site('site/redacao')
        )
    ),
    'internal' => array(
        'exit' => array(
            'text' => 'Sair',
            'url' => URL::site('auth/logout')
        )
    )
);
