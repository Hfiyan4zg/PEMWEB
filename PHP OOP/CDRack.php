<?php
class CDRack extends Product{
    public $capacity;
    public $model;

    public function __construct($name,$price,$discount,$capacity,$model){
        parent::__construct($name,$price,$discount);
        $this->capacity=$capacity;
        $this->model=$model;
    }

    public function setCapacity($capacity){
        $this->capacity=$capacity;
    }

    public function getCapacity(){
        return $this->capacity;
    }

    public function setModel($model){
        $this->model=$model;
    }

    public function getModel(){
        return $this->model;
    }
}
?>