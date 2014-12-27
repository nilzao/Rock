<?php
$vl = Rock_Core_ViewLoader::getInstance();
$vwError = $vl->getVar('vwError');
$data = $vl->getVars();

if (count($vwError) === 0) {
    $data['success'] = true;
    $data['msg'] = '';
} else {
    $data['success'] = false;
    $data['title'] = 'Falha';
    $data['msg'] = 'Erro no login';
}

echo json_encode($data);
