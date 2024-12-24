<?php

namespace App\Controller\Component;

class UserAuthComponent extends AppComponent {
    
    public function __construct()
    {
        $this->Data = new DataComponent();
        $this->Hold = new HoldComponent();
    }

    public function grupoExiste($group) {
        $this->Data->bdConnect();
        $strQuery = "";
        $strBind = [':DEL' => '*', ':GRUPO' => $group];
        $stId = $this->Data->bdExecBind('ERP', $strQuery, $strBind, true);
        while($itens = $this->Data->bdQueryFetchAll($strQuery, true)) {
            $item = $itens;
        }
        return $item;
    }

    public function atualizarPermissao($group) {

    }
}