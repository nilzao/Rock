<?php
require_once dirname(dirname(__FILE__)) . '/src/Rock/Core/AutoLoad.php';

$parseadora = new Rock_Cert_Parseadora();
try {
    $cert = $parseadora->getCertificado();
} catch (Exception $e) {
    $cert = new Cert_IcpBrasil('', '');
    echo "Erro no certificado";
}
echo $cert->getCpfCnpj();
echo $cert->getRazaoSocial();
