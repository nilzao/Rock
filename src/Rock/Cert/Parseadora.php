<?php

class Rock_Cert_Parseadora
{

    public function getCertificado()
    {
        $this->validaTunelSSLHabilitado();
        $certificado = $_SERVER['SSL_CLIENT_CERT'];
        $dadosCertificado = openssl_x509_parse($certificado, false);
        $razaoSocial = '';
        $cpfCnpj = '';
        // DOCUMENTACAO DA REFEITA FEDERAL DO BRASIL ONDE INFORMA QUE O PADRAO DO COMMOM NAME
        // EH A RAZAO SOCIAL CONCATENADO COM DOIS PONTOS, CONCATENADO COM O CPF/CNPJ DO DONO
        // http://www.receita.fazenda.gov.br/acsrf/LeiautedeCertificadosdaSRF.pdf
        if (array_key_exists('commonName', $dadosCertificado['subject'])) {
            list ($razaoSocial, $cpfCnpj) = explode(':', $dadosCertificado['subject']['commonName']);
        } elseif (array_key_exists('CN', $dadosCertificado['subject'])) {
            list ($razaoSocial, $cpfCnpj) = explode(':', $dadosCertificado['subject']['CN']);
        }
        return new Rock_Cert_IcpBrasil($razaoSocial, $cpfCnpj);
    }

    private function validaTunelSSLHabilitado()
    {
        $chaves = array();
        $chaves[] = 'SSL_CLIENT_M_SERIAL';
        $chaves[] = 'SSL_CLIENT_V_END';
        $chaves[] = 'SSL_CLIENT_VERIFY';
        $chaves[] = 'SSL_CLIENT_I_DN';
        foreach ($chaves as $v) {
            if (! isset($_SERVER[$v])) {
                throw new Exception('Certificado inv�lido.');
            }
        }
        if ($_SERVER['SSL_CLIENT_VERIFY'] !== 'SUCCESS' || $_SERVER['SSL_CLIENT_V_REMAIN'] <= 0) {
            throw new Exception('Certificado inv�lido.');
        }
    }
}