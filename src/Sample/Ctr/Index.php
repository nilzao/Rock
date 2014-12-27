<?php

/**
 * Exemplo de ws
 * 
 * @service Sample_Ctr_Index
 */
class Sample_Ctr_Index implements Rock_Core_IController
{

    public function handle()
    {
        $vl = Rock_Core_ViewLoader::getInstance();
        $vl->load('Index');
    }

    /**
     * Exemplo de metodo ws
     *
     * @param string $variavel1            
     * @param integer $quantidade            
     * @param boolean $valida            
     * @return string
     */
    public function lst()
    {
        $input = Rock_Core_Input::getInstance();
        $var1 = $input->getRequest('variavel1');
        $qtd = $input->getRequest('quantidade');
        $valida = $input->getRequest('valida');
        $dados = array(
            'calc1' => $var1,
            'calc2' => $qtd,
            'calc3' => $valida
        );
        $vl = Rock_Core_ViewLoader::getInstance();
        return $vl->load('Lista', $dados);
    }
}
