<?php 

namespace App\Model;
use App\Controller\Component\DataComponent;

class Categorias {
    public $Data;

    public function __construct()
    {
        $this->Data = new DataComponent();
        $this->Data->bdConnect('ERP');
    }

    public function sqlVisualizar() {
        $strQuery = " SELECT * FROM categorias ";
        return $strQuery;
    }
}
