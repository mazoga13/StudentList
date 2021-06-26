<?php 
session_start();
require_once __DIR__.'/../vendor/autoload.php';
use App\StudentModel;
$studentmodel=new StudentModel();
$page=1;
if($_POST['page']){
    $page=$_POST['page']+0;
}
$sortmode='DESC';
if($_SESSION['sortby']){
    $sortmode=$_SESSION['sortby'];
}

$students=$studentmodel->getAllStudents($_POST['page'],5,'egescore',$sortmode);

$output='';
foreach ($students as $item) {
	$output.='
	  <tr>
      
      <td>'.$item['id'].'</td>
      <td>'.$item['name'].'</td>
      <td>'.$item['surname'].'</td>
      <td>'.$item['email'].'</td>
      <td>'.$item['sex'].'</td>
      <td>'.$item['groupnum'].'</td>
      <td>'.$item['egescore'].'</td>

    </tr>';
}
echo json_encode($output,true);

