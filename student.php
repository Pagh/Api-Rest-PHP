<?php
  include('./class/Student.php');
  $method = $_SERVER["REQUEST_METHOD"];
  $student = new Student();

  switch($method) {
    case 'GET': 
      $id = $_GET['id'];
      if (isset($id)) 
      {
        $student = $student->find($id);
        $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
      }else 
      {
        $students = $student->all();
        $js_encode = json_encode(array('state'=>TRUE, 'students'=>$students),true);
      }
      header("Content-Type: application/json");
      echo($js_encode);
      break;

    case 'POST': 
      $studentLenght = count($student->all()); 
      $result = $student->all();

      $student->_id = $result[$studentLenght-1]['id'] + 1; 
      $student->_name = $_POST["name"];
      $student->_surname = $_POST["surname"];
      $student->_sidiCode = $_POST["sidi_code"];
      $student->_taxCode = $_POST["tax_code"];
      $student->add($student);
      echo "Aggiunto nel db";
      break;

    case 'DELETE': 
      break;

    case 'PUT':
      break;

    default: 
      echo "Errore"; 
      break;
      
  }
?>