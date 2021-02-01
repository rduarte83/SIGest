<?php
include_once 'phpmailer.php';
include_once 'contratos.php';
include_once 'comercial.php';

copia('geral@segimprima.com');
copia('comercial@segimprima.pt');

sw('geral@segimprima.com');
sw('comercial@segimprima.pt');

compras('geral@segimprima.com');
comprasU('tiago@segimprima.pt', 'tiago');
comprasU('ricardo@segimprima.pt', 'ricardo');
comprasU('pablo@segimprima.pt', 'pablo');