<?php
include_once 'tecnica.php';
include_once 'comercial.php';
include_once 'phpmailer.php';

tecnica('geral@segimprima.com');
tecnicaU('joao@segimprima.pt', 'joao');
tecnicaU('celso@segimprima.pt', 'celso');
tecnicaU('rui@segimprima.pt', 'rui');

comercial('geral@segimprima.com');
comercialU('tiago@segimprima.pt', 'tiago');
comercialU('ricardo@segimprima.pt', 'ricardo');
comercialU('pablo@segimprima.pt', 'pablo');