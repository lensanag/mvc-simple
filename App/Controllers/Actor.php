<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Actor as ActorModel;

class Actor
{
    private $model;

    public function __construct() {

        $this->model = new ActorModel();
    }

    public function index() {

        $actorList = $this->model->getAll(['actor_id', 'first_name', 'last_name', 'last_update']);

        require(BASE_PATH . '/App/Views/Actor/index.php');
    }

    public function edit() {

        $currentActor = $this->model->find(['actor_id', 5], ['actor_id', 'first_name', 'last_name', 'last_update']);
        echo var_dump($currentActor);
        echo "pendiente de implementar edicion";
    }
}
