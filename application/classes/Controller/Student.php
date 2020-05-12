<?php

/**
 * Description of Student
 *
 * @author EUDE LACERDA
 */
class Controller_Student extends Controller_Design {

    public function action_index() {

        POJO_Session::getInstance()->isLogged();
        
        $codeUser = Auth::instance()->get_user();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (HTTP_Request::POST == $this->request->method()) {

            $student = new POJO_Student();
            
            $student->getPerson()->setCode(DAO_User::getInstance()->findUserForCode($codeUser)->person->id);
            $student->getInstitution()->setCode($this->request->post('cmbInstitution'));
            $student->setClass($this->request->post('txtClass'));
            $student->setSerie($this->request->post('txtSerie'));

            if (DAO_Student::getInstance()->insert($student)) {
                $this->alert('success', 'student.studentSuccessSave', 'success', 'home');                
            }
        } else {

            $institutions = DAO_Institution::getInstance()->listInstitution();
            $this->actionForm = URL::site('student');
            $this->page = View::factory('student/new')
                    ->set('institutions', $institutions);
        }
    }
}
