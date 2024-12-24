<?php

declare(strict_types=1);

namespace App\Controller;
use App\Controller\Component\AppComponent;
use App\Controller\Component\DataComponent;
use App\Controller\Component\HoldComponent;

/**
 * Create Class GenericosController
 * @author João Vitor Esequiel Vieira
 */

 class GenericosController extends AppComponent {
    public $App;  
    public $Data;
    public $Hold;

    /**
     * Create _construct 
     */

     public function __construct() 
     {
        $this->Data = new DataComponent();
        $this->Hold = new HoldComponent();

        /**
         * Create Model
         * @author João Vitor Esequiel Vieira
         */
     }


     public function search($keySearch) {
        $this->Data->bdConnect();

        switch($keySearch) {
            case 'getUsersErp':
                $strQuery = " SELECT * FROM SRA010 WHERE D_E_L_E_T_ != :DEL ";
                $strBind  = [':DEL' => '*'];
                $stId = $this->Data->bdExecBind('ERP', $strQuery, $strBind, true);
                while($itens = $this->Data->bdQueryFetchAll($stId, true)) {
                    $res[] = $itens;
                }
                return $res;
            break;
        }
     }

     
 }