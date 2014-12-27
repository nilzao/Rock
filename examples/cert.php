<?php
require_once 'Rock/AutoLoad.php';

$parseadora = new Cert_Parseadora();
try {
    $cert = $parseadora->getCertificado();
} catch (Exception $e) {
    $cert = new Cert_IcpBrasil('', '');
    echo "Erro no certificado";
}
echo $cert->getCpfCnpj();
echo $cert->getRazaoSocial();
