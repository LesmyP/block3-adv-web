<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once 'models/parttypesmodel.php';

class TypeController {
    private $typemodel;

    public function __construct($connection) {
        $this->typemodel = new partTypeModel($connection);
    }

    public function showType() {
        $partTypes = $this->typemodel->selectType();
        include 'views/parttypeview.php';
    }

    

    public function showForm() {
        $partType = $this->typemodel->selectType();
        include 'views/parttypeform.php';
    }

    public function addType() {
        try {
            $name = $_POST['typeName'];

            if (empty($name)) {
                throw new Exception('Part type name is required.');
            }

            if ($this->typemodel->insertPartType($name)) {
                $_SESSION['success_message'] = "Part type added successfully.";
            }

        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error: " . $e->getMessage();
        }

        header("Location: index.php");
        exit(); 
    }

    public function edit ($typeID) {
        $partType = $this->typemodel->getPartTypeByID($typeID);
        include 'views/parttypeeditform.php';
    }

    public function update() {
        try {
            $typeID = $_POST['partTypeID'];
            $name = $_POST['typeName'];

            if (empty($name) || empty($typeID)) {
                throw new Exception('Part type ID and name are required.');
            }

            if ($this->typemodel->updatePartType($typeID, $name)) {
                $_SESSION['success_message'] = "Part type updated successfully.";
            } else {
                $_SESSION['error_message'] = "Could not update part type.";
            }
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error: " . $e->getMessage();
        }

        header("Location: index.php");
        exit();
    }

 

    public function delete($typeID) {
        if ($this->typemodel->deletePartType($typeID)) {
            $_SESSION['success_message'] = "Part type deleted successfully.";
        } else {
            $_SESSION['error_message'] = "Could not delete part type.";
        }

        header("Location: index.php");
        exit();
    }

}

    
include_once 'controllers/connection.php';
$connection3 = new connectionType($host, $username, $password, $database);
$controllertype = new TypeController($connection3);

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    // Handle edit action
    if (isset($_GET['id'])) {
        $controllertype->edit($_GET['id']);
    } else {
        echo "Invalid ID for editing";
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
    // Handle delete action
    if (isset($_GET['id'])) {
        $controllertype->delete($_GET['id']);
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid ID for deletion";
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'update') {
    // Handle update action
    $controllertype->update();
    header("Location: index.php");
    exit();
} elseif (isset($_POST['submitType'])) {
    $controllertype->addType();
    header("Location: index.php");
    exit();
} else {
    $controllertype->showForm();
}

$controllertype->showType();

?>
