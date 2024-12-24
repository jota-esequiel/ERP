<?php

declare(strict_types=1);

namespace App\Controller;
use App\Controller\Component\AppComponent;
use App\Controller\Component\DataComponent;
use App\Controller\Component\UserAuthComponent;
use App\Controller\Component\HoldComponent;

    /**
     * Create Class AcessosController
     * @author João Vitor Esequiel Vieira
     */

class AcessosController extends AppComponent {

    public function __construct()
    {
        $this->Data = new DataComponent();
        $this->UserAuth = new UserAuthComponent();
        $this->Hold = new HoldComponent();
    }

    public function index($controller, $action) {
        $this->Data->bdConnect();

    }

    public function liberarAcesso($group) {
        $this->Data->bdConnect();

        if(empty($group)) {
            echo "Deu problema"; //Implementar sistema de Flash;
            return $this->redirect(['controller' => 'acessos', 'action' => 'index']);
        }

        if(!$this->UserAuth->grupoExiste($group)) {
            echo "Grupo não encontrado";
            return $this->redirect(['controller' => 'acessos', 'action' => 'index']);
        }

        $pGroup = $this->UserAuth->atualizarPermissao($group);

        if($pGroup) {
            echo "Grupo atualizado com sucesso!";
            return $this->redirect(['controller' => 'acessos', 'action' => 'index']);
        } else {
            echo "Grupo não atualizado";
            return $this->redirect(['controller' => 'acessos', 'action' => 'index']);
        }
    }


}