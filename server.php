<?php
/*
-----------------------------------------------
            سكربت المدير الرقمي            
-----------------------------------------------
برمجة وتطوير: عادل قصي
البريد الإلكتروني: adelbak2014@gmail.com
الموقع الرسمي: www.cem11.com
الصفحة الرسمية للمبرمج: https://www.facebook.com/adel.qusay.9
-----------------------------------------------
السكربت مجاني، يرجى طلب الإذن عند الرغبة في
التطوير.
-----------------------------------------------
*/

require 'config.php';

if (@$_SERVER['REQUEST_METHOD'] !== 'POST') { die('0'); }

/*------------------------
          Login
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'login') {

    $engine->Login($_POST);

}

/*------------------------
          Update
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'SDDU') {

    $engine->SDDU($_POST);

}

if (isset($_SESSION['educ_institution_name']) == '') { die('0'); }

/*========================
     تسيير المستخدمين
/*========================*/

/*------------------------
         Users
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'show') {

    $engine->getUsers();

}

/*------------------------
          Delete
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'delete') {

    $engine->deleteUser($_POST);

}
/*------------------------
         Add
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'add' or isset($_POST['act']) && $_POST['act'] === 'edit') {

    $engine->aeUser($_POST);

}

/*------------------------
         Settings
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'settings') {

    $engine->saveSettings($_POST);

}

/*------------------------
       User to edit
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'utoedit') {

    $engine->userToEdit($_POST);

}

/*------------------------
      Settings to edit
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'stoedit') {

    $engine->settingsToEdit();

}

/*------------------------
         Export
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'export') {

    $engine->exportUsers();

}

/*------------------------
         Import
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'import') {

    $engine->amattiImportUsers($_POST);

}

/*------------------------
         cleanDB
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'cleanDB') {

    $engine->cleanDB();

}

/*========================
     إدارة التلاميذ
/*========================*/
/*------------------------
       Students
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'showS') {

    $engine->getStudents($_POST);

}

/*------------------------
          Delete
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'deleteS') {

    $engine->deleteStudent($_POST);

}
/*------------------------
     Student to edit
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'sToEdit') {

    $engine->studentToEdit($_POST);

}
/*------------------------
       Edit Student
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'sEdit' && !isset($_POST['op'])) {

    $engine->editStudents($_POST);

}

/*------------------------
         Import
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'sImport' && !isset($_POST['op'])) {

    $engine->amattiImportStudents($_POST);

}

/*------------------------
    Import Students Info
------------------------*/
if (isset($_POST['op']) && $_POST['op'] === 'importAllInfo') {

    $engine->amattiImportStudentsInfo($_POST);

}

/*------------------------
     Import Student Info
------------------------*/
if (isset($_POST['op']) && $_POST['op'] === 'importInfo') {

    $engine->amattiImportStudentInfo($_POST);

}

/*------------------------
     Delete Students Info
------------------------*/
if (isset($_POST['op']) && $_POST['op'] === 'sfCleanDB') {

    $engine->deleteStudents($_POST);

}

/*------------------------
         cleanDB
------------------------*/
if (isset($_POST['act']) && $_POST['act'] === 'sCleanDB') {

    $engine->sCleanDB();

}

/*========================
         الرقمنة
/*========================*/

/*------------------------
     CEM Generate Lists
------------------------*/
if (isset($_POST['annee_school']) && isset($_POST['educ_ins_name']) && isset($_FILES['eleve'])) {
	
   $engine->CEM_Upl_Gen_lists($_FILES['eleve'], $_POST);	  
	  
} 

/*------------------------
     CEM Send Notes
------------------------*/
if (isset($_POST['go']) && $_POST['go'] === 'submit' && isset($_FILES['list'])) {

    $engine->CEM_Upl_Pre_Send_list($_FILES['list']);

} 

/*------------------------
     Lycee Generate Lists
------------------------*/
if (isset($_POST['L_annee_school']) && isset($_POST['L_educ_ins_name']) && isset($_FILES['L_eleve'])) {
	
   $engine->Lycee_uplGenLists($_FILES['L_eleve'], $_POST);	  
	  
} 

/*------------------------
     Lycee Send Notes
------------------------*/
if (isset($_POST['go']) && $_POST['go'] === 'Lycee_submit' && isset($_FILES['list'])) {

    $engine->Lycee_uplPreSendList($_FILES['list']);

} 



?>