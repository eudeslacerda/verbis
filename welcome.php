<?php
$temaDoMes = "Temas Especiais Para Você!";
$proposta = "Precisa estudar para a segunda etapa do PAS - UNB? Está no 9º ano da "
        . "Escola Estadual Major Saint´Clair? Aproveite, temos temas especiais direcionado"
        . "para você! Se ainda não fez suas redações, não perca tempo, veja os temas logo "
        . "abaixo e comece a se preparar agora mesmo! BONS ESTUDOS!";
//$proposta = "A partir da leitura dos textos motivadores seguintes e com base nos
//conhecimentos construídos ao longo de sua formação, redija um texto
//dissertativo-argumentativo em norma padrão da língua portuguesa sobre o
//tema: ".$temaDoMes." Apresente proposta de intervenção, que respeite os direitos
//humanos. Selecione, organize e relacione, de forma coerente e coesa, argumentos
//e fatos para defesa de seu ponto de vista.";

$dicasTitulo = "Dicas de escrita que poderão te ajudar na elaboração de redações!";
$dicas = "Nós do Laboratório Nota Mil decidimos disponibilizar algumas dicas 
para te ajudar na elaboração de suas redações, fique a vontade para acessar o
link abaixo, ver as suas dicas, ler as correções em destaque e estudar através dos materiais
disponibilizados, para melhorar cada vez mais a sua elaboração de redações.";

$correcoesTitulo = "10 Correções Mais Relevantes!";
?>

<div class="jumbotron" style="padding-top: 10px; padding-bottom: 15px">
    <div style="float: left">
        <img src="storage/media/images/logoDoSite.png" width="300" height="325" style="margin-bottom: 5px"/><br/>
    </div>

    <div style="float: right">
        <img src="storage/media/images/logo_ifnmg.png" width="225" height="160" style="margin-bottom: 5px"/><br/>
        <img src="storage/media/images/logo_ifnmg_10_anos.png" width="225" height="160" style="margin-bottom: 5px"/><br/>
    </div>

    <div class="container">
        <center><br/><br/><h1 class="display-3" style="font-size: 53pt">Laboratório Nota Mil!</h1>
            <p>Bem vindo(a) ao seu local de preparação para obter nota MIL em redações!<br/><br/><br/><br/> </p>

            <p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInformações" style=" font-size: 18pt">
                    Mais Informações &raquo;
                </button>

                <!-- Modal -->
            <div class="modal fade" id="modalInformações" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalInformaçõesTitulo" style="font-size: 22pt">Laboratório Nota Mil!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="text-align: justify; font-size: 16pt">
                            O “Laboratório Nota Mil” é um projeto que tem como objetivo auxiliar alunos que pretendem 
                            atingir nota mil em redações! click no botão abaixo para acessar e ver detalhadamente os 
                            objetivos desse maravilhoso projeto!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <a class="btn btn-primary" href="<?= Kohana::message('menu', 'external.projeto.objetivo.url') ?>" role="button">Objetivo &raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            </p>

        </center>
    </div>
</div>



<div class="container marketing">



    <div class="row">
        <center>
            <div style="float: left" class="col-lg-4">
                <img class="rounded-circle" src="storage/media/images/acesso.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Acesso!</h2>
                <p style="text-align: justify">
                    É muito importante que, como usuário do nosso site, você tenha uma conta e faça login para que assim, possa ter acesso a todas as funcionalidades que te proporcionamos. Caso ainda não tenha criado uma conta de usuário, click na opção abaixo e logo após em "Inscrever", para se cadastrar e desfrutar de todos os recursos disponíveis e totalmente gratuitos.
                </p>
                <p><a class="btn btn-dark" href="<?= Kohana::message('menu', 'external.acesso.url') ?>" role="button">Logar-se Agora! &raquo;</a></p>
            </div>



            <div style="float: left" class="col-lg-4">
                <img class="rounded-circle" src="storage/media/images/chave.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Chave de Envio!</h2>
                <p style="text-align: justify">
                    Não é possível que o envio de redações para correção seja em tempo ilimitado e, muito menos em quantidade ilimitada. Por isso, para que tenhamos um maior controle dessa situação, criamos o método de envio por chaves. Somente chaves disponibilizadas em cada mês, poderão ser usadas. Para mais informações, acesse a opção abaixo.
                </p>
                <p><a class="btn btn-dark" href="<?= Kohana::message('menu', 'external.chave.url') ?>" role="button">Lista de Chaves &raquo;</a></p>
            </div>



            <div style="float: left" class="col-lg-4">
                <img class="rounded-circle" src="storage/media/images/redacao.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Redações!</h2>
                <p style="text-align: justify">
                    Para que suas redações sejam enviadas e corrigidas corretamente, é necessário que seu login seja efetuado com sucesso e que a chave utilizada esteja dentro do prazo de validade. Confira também se o arquivo que será enviado está no formato "PDF". Para mais informações, acesse a opção abaixo para ser redirecionado ao menu "Redações".
                </p>
                <p><a class="btn btn-dark" href="<?= Kohana::message('menu', 'external.redacao.url') ?>" role="button">Ver Redações &raquo;</a></p>
            </div>
        </center>
    </div>


    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading" style="text-align: center">Tema do Mês!</h2><br>
            <h2 style="text-align: center"><span class="text-muted">COMBATE A
			PANDEMIAS NO MUNDO GLOBALIZADO</span></h2><br>

            <p class="lead" style="text-align: justify">
                Está no 3º ano do CAMPUS - ARINOS ou da E.E Garibaldina? Aproveite, temos um 
                tema especial direcionado para você! Se ainda não fez sua redação deste mês, 
                não perca tempo, veja o tema logo abaixo e comece a se preparar agora mesmo! BONS ESTUDOS!
            </p><br>

            <p style="text-align: center">
                <a class="btn btn-primary" href="storage/document/combate pandemia.pdf" role="button">Textos Motivadores &raquo;</a>
                <a class="btn btn-primary" href="storage/document/rascunho.pdf" role="button">Rascunho &raquo;</a>
            </p>
        </div>

        <div class="col-md-5 order-md-1">
            <img src="storage/media/images/tema_terceiranistas.png" width="390" height="400">
        </div>
    </div>

    <!--
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading" style="text-align: center">Tema do Mês!</h2><br>
            
            <h2 style="text-align: center">
                <span class="text-muted">
                    CAMINHOS PARA SUPERAR A DESIGUALDADE SOCIAL NO BRASIL
                </span>
            </h2><br>

            <p class="lead" style="text-align: justify">
                Está se preparando para a segunda etapa do PAS - UNB? Aproveite, temos um 
                tema especial direcionado para você! Se ainda não fez sua redação deste mês, 
                não perca tempo, veja o tema logo abaixo e comece a se preparar agora mesmo! BONS ESTUDOS!
            </p><br>

            <p style="text-align: center">
                <a class="btn btn-primary" href="storage/document/PROPOSTA PAS UNB 2 ETAPA.pdf" role="button">Textos Motivadores &raquo;</a>
                <a class="btn btn-primary" href="storage/document/rascunho.pdf" role="button">Rascunho &raquo;</a>
            </p>
        </div>

        <div class="col-md-5">
            <img src="storage/media/images/tema do PAS - UNB.png" width="390" height="400">
        </div>
    </div>
	-->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading" style="text-align: center">Dicas de Escrita!</h2><br>
            <h2 style="text-align: center"><span class="text-muted"><?php echo $dicasTitulo; ?></span></h2><br>

            <p class="lead" style="text-align: justify"><?php echo $dicas; ?></p><br>

            <p style="text-align: center"><a class="btn btn-primary" href="<?= Kohana::message('menu', 'external.redacao.url') ?>" role="button">Veja aqui suas dicas &raquo;</a></p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="storage/media/images/dicas_redacao.png" width="350" height="400">
        </div>
    </div>

    <hr class="featurette-divider">

    <!--    <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading" style="text-align: center">Destaques do Mês!</h2><br>
                <h2 style="text-align: center"><span class="text-muted"><?php echo $correcoesTitulo; ?></span></h2><br>
    
                <p class="lead" style="text-align: center">EM BREVE!</p><br>
    
            </div>
            <div class="col-md-5">
                <img src="storage/media/images/correcao_redacao.jpg" width="370" height="400">
            </div>
        </div>-->
</div>