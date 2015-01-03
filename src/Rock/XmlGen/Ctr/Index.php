<?php

class Rock_XmlGen_Ctr_Index implements Rock_Core_IController
{

    public function handle()
    {
        $vl = Rock_Core_ViewLoader::getInstance();
        $vl->load('Index');
    }
}
