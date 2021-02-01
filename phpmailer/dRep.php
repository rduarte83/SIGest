<?php
include_once 'phpmailer.php';
include_once 'tecnica.php';
include_once 'comercial.php';
include_once 'cobrancas.php';

tecnica('geral@segimprima.com');
tecnica('comercial@segimprima.pt');

tecnicaU('joao@segimprima.pt', 'joao');
tecnicaU('celso@segimprima.pt', 'celso');
tecnicaU('rui@segimprima.pt', 'rui');

comercial('geral@segimprima.com');
comercialU('tiago@segimprima.pt', 'tiago');
comercialU('ricardo@segimprima.pt', 'ricardo');
comercialU('pablo@segimprima.pt', 'pablo');

cobrancas('geral@segimprima.pt');
rmas('geral@segimprima.pt');

