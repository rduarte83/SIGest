<?php
include_once 'tecnica.php';
include_once 'comercial.php';
include_once 'contratos.php';
include_once 'cobrancas.php';
include_once 'phpmailer.php';

tecnica('geral@segimprima.com');
tecnica('comercial@segimprima.pt');
tecnicaU('joao@segimprima.pt', 'joao');
tecnicaU('celso@segimprima.pt', 'celso');
tecnicaU('rui@segimprima.pt', 'rui');

comercial('geral@segimprima.com');
comercialU('tiago@segimprima.pt', 'tiago');
comercialU('ricardo@segimprima.pt', 'ricardo');
comercialU('pablo@segimprima.pt', 'pablo');

cobrancas('geral@segimprima.com');
cobrancas('geral@segimprima.pt');
rmas('geral@segimprima.com');
rmas('geral@segimprima.pt');

copia('geral@segimprima.com');
copia('comercial@segimprima.pt');
sw('geral@segimprima.com');
sw('comercial@segimprima.pt');

