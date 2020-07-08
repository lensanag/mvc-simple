<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Actor as ActorModel;
use Lib\Controller;

class Actor extends Controller {

    private $model;

    public function __construct() {

        $this->model = new ActorModel();
    }

    public function index() {

        $actorList = $this->model->getAll(['actor_id', 'first_name', 'last_name', 'last_update']);
        
        return $this->view(['actorList' => $actorList]);
    }

    public function edit() {

        $currentActor = $this->model->find(['actor_id', 5], ['actor_id', 'first_name', 'last_name', 'last_update']);
        echo var_dump($currentActor);
        echo "pendiente de implementar edicion";
    }
}
