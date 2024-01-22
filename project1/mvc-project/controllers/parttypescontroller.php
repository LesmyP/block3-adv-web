<?php

include_once 'models/parttypesmodel.php';


class TypeController {
    private $typemodel;
    public function __construct($connection) {
        $this->typemodel = new partTypeModel($connection);
    }
    public function showType() {
        // echo "SELECT * FROM partType";
        $partType = $this->typemodel->selectType();
        include 'views/parttypeview.php';
    }
    
    public function showFormType() {
        include 'views/parttypeform.php';
    }
    public function addType() {
        $nameone = $_POST['typeName'];
        if (!$nameone) {
            echo "<p>Missing information</p>";
            $this->showFormType();
            return;
        } else if($this->typemodel->insertPartType($nameone)){
            echo "<p>Added part type: $nameone</p>";
        } else {
            echo "<p>Could not add part type</p>";
        }
        // $this->showType();
    }
}


include_once 'controllers/connection.php';
$connection3 = new connectionType($host, $username, $password, $database);
$controllertype = new TypeController($connection3);

$controllertype->showType();

if(isset($_POST['submitType'])) {
    $controllertype->addType();
} else {
    $controllertype->showFormType();
}

?>