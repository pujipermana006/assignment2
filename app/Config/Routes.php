<?php
use App\Models\Classes;
use App\Models\Students;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('check-db', function () {
    try {
        $db = \Config\Database::connect();
        echo 'Database connection is OK';
    } catch (\Exception $e) {
        echo 'Database connection failed: ' . $e->getMessage();
    }
});
$routes->get('create/class', function () {
    $classModel = new App\Models\Classes;
    $resp = $classModel->insert([
        'name' => ""
    ]);
    if(!$resp){
        var_dump("gagal insert data, error : ");
    }else{
        var_dump("Class ID : ". $resp);
    }
    var_dump('Class ID : ' . $resp);
});

$routes->get('get/class', function () {
    $classModel = new App\Models\Classes;
    $resp = $classModel->findAll();

    echo"<pre>";
    var_dump($resp);
});

$routes->get('create/student', function () {
    $studentModel = new App\Models\Students;
    $resp = $studentModel->insert([
        'name' => 'Ramones',
        'class_id' => 2
    ]);
    var_dump('Student ID : ' . $resp);
});


$routes->get("get/student", function () {
    $classModel = new App\Models\Students;
    $resp = $classModel->findAll();
   echo"<pre>";
    var_dump($resp);
});

$routes->get('all-class-student', function () {
    $studentModel = new App\Models\Students;
    $resp = $studentModel->getStudentsWithClass();
    
    echo"<pre>";
    var_dump($resp);
});

$routes->get('get-class-student/(:segment)',  function ($id) {
    $studentModel = new App\Models\Students();
    $resp = $studentModel->getStudentWithClassById($id);
    echo '<pre>';
    var_dump($resp);
});

$routes->get('create/teacher', function () {
    $teacherModel = new App\Models\Teacher;
    $resp = $teacherModel->insert([
        'name' => "Busomi",
        'major'=> "IPA"
    ]);
    if(!$resp){
        var_dump("gagal insert data teacher: ");
    }else{
        var_dump("Class ID : ". $resp);
    }
    
});

$routes->get("get/teacher", function () {
    $teacherModel = new App\Models\Teacher;
    $resp = $teacherModel->findAll();
    echo"<pre>";
    var_dump($resp);
});