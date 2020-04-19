<?php
 require_once 'secure.php';
    if (!Helper::can('admin') && !Helper::can('manager')) {
        header('Location: 404.php');
        exit();
        }
    $size = 5;
    if (isset($_GET['page'])) {
        $page = Helper::clearInt($_GET['page']);
    } 
    else {
        $page = 1;
    } 
    $studentMap = new StudentMap();
    $count = $studentMap->count();
    $students = $studentMap->findAll($page*$size-$size,$size);
    $header = 'Список студентов';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
        <h1>Список студентов</h1>
        <ol class="breadcrumb">
            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Список студентов</li>
        </ol>
    </section>
    <div class="box-body">
    <a class="btn btn-success" href="add-student.php">Добавить студента</a>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($students) {
?>

<table id="example2" class="table table-bordered table-hover">

<thead>
    <tr>
        <th>Ф.И.О</th>
        <th>Пол</th>
        <th>Дата рождения</th>
        <th>Отделение</th>
        <th>Роль</th>
    </tr>
</thead>
<tbody>
<?php
foreach ($students as $student) {
echo '<tr>';
echo '<td><a href="profile-
teacher.php?id='.$student->user_id.'">'.$student->fio.'</a> '. '<a href="add-student.php?id='.$student->user_id.'"><i class="fa fa-pencil"></i></a></td>';

echo '<td>'.$student->gender.'</td>';

echo '<td>'.$student->birthday.'</td>';
echo '<td>'.$student->otdel.'</td>';
echo '<td>'.$student->role.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одного студента не найдено';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page,$size); ?>
</div>
<!-- /.box-body -->
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
