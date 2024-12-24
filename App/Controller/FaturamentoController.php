<?php

declare(strict_types=1);

namespace App\Controller;
use App\Controller\Component\AppComponent;
use App\Controller\Component\DataComponent;
use App\Controller\Component\HoldComponent;
use App\Controller\GenericosController;

/**
 * Create Class FaturamentoController
 * @author João Vitor Esequiel Vieira
 */

 class FaturamentoController extends AppComponent {
    public $App;  
    public $Data;
    public $Hold;
    public $Genericos;

    /**
     * Create _construct 
     */

     public function __construct() 
     {
        $this->Data = new DataComponent();
        $this->Hold = new HoldComponent();
        $this->Genericos = new GenericosController();

        /**
         * Create Model
         * @author João Vitor Esequiel Vieira
         */

        //  $this->Genericos = new Genericos();
     }

     public function index() {
        $this->Data->bdConnect();

        $teste = $this->Genericos->search('getUsersErp');
     }
}