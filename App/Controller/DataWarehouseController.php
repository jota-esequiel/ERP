<?php

declare(strict_types=1);

namespace App\Controller;
use App\Controller\Component\AppComponent;
use App\Controller\Component\DataComponent;
use App\Controller\Component\HoldComponent;
use App\Controller\Component\UserAuthComponent;


class DataWarehouseController extends AppComponent {
    public $Data;
    public $Hold;
    public $UserAuth;


    public function __construct()
    {
        $this->Data = new DataComponent();
        $this->Hold = new HoldComponent();
        $this->UserAuth = new UserAuthComponent();
    }

    public function indexTeste() {
        $cmps = [
            'CAMPOS' => [
                ['LABEL' => 'Banco de Dados', 'type' => 'select', 'options' => ['1' => 'ERP', '2' => 'Protheus'], 'OBG' => 'S', 'CLASS' => 'frm1'],
                ['LABEL' => 'Buscar', 'type' => 'submit', 'NAME' => 'POST', 'CLASS' => 'frm1']
            ]
        ];

        $filtros = [];
        $this->setFrm($cmps, $filtros);

        if($this->isSubmit('POST')) {
            $formData = $this->getFormData($cmps);

            if(!empty($formData)) {
                $this->Hold->comandosBd('ERP', 'INSERT', 'SRA010', $formData, null);
                return $this->redirect(['controller' => 'DataWarehouse', 'action' => 'teste']);
            } else {
                return $this->redirect(['controller' => 'DataWarehouse', 'action' => 'index']);
            }
        }
    }
}