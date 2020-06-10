<?php

/**
 * Description of Wording
 *
 * @author EUDE LACERDA
 */
class Controller_Wording extends Controller_Design {

    public function action_index() {

        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        //$lista = DAO_Wording::getInstance()->listWording();

        $lista = DAO_User::getInstance()->findUserForCode(Auth::instance()->get_user());

        $pagination = Pagination::factory(array(
                    'total_items' => $lista->person->student->wordings->find_all()->count(),
                    'items_per_page' => 5
        ));

        $wordings = ORM::factory('Wording')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $this->page = View::factory('wording/list')
                ->set('wordings', $lista->person->student->wordings->limit($pagination->items_per_page)->offset($pagination->offset)->find_all())
                ->set('pagination', $pagination)
                ->set('urlNew', URL::site('wording/new'));
    }

    public function action_new() {

        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (HTTP_Request::POST == $this->request->method()) {

            $wording = new POJO_Wording();

            $dao = DAO_Secret::getInstance();

            $daouser = DAO_User::getInstance();

            $wording->getSecret()->setValue($this->request->post('txtSecret'));
            $wording->getTheme()->setCode($this->request->post('cmbTheme'));

            $wording->setSecret($dao->findId($dao->secretFound($wording->getSecret()->getValue())->id));

            if ($wording->getSecret()->getCode()) {
                if (!$wording->getSecret()->isExpired()) {
                    if ($wording->getSecret()->quantityExceeded($dao->secretFound($wording->getSecret()->getValue())->wordings->count_all())) {
                        if ($wording->essayPerPerson($daouser->findUserForCode(Auth::instance()->get_user())->person->student->wordings->count_all())) {
                            $fileName = $_FILES['flWording']['name'];
                            $fileName = explode('.', $fileName);
                            $fileExtension = strtolower(end($fileName));
                            if (!strcmp($fileExtension, 'pdf')) {

                                $fileType = $_FILES['flWording']['type'];
                                $fileSize = $_FILES['flWording']['size'];
                                $fileTmpName = $_FILES['flWording']['tmp_name'];

                                $currentDir = getcwd();
                                $uploadDirectory = DIRECTORY_SEPARATOR . "storage/wordings" . DIRECTORY_SEPARATOR;

                                $fileName = Date::formatted_time('now', "d_m_Y") . "_" . str_replace(" ", "_", $daouser->findUserForCode(Auth::instance()->get_user())->person->name);

                                $uploadPath = $currentDir . $uploadDirectory . basename($fileName) . ".pdf";

                                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                                    $wording->setInsertDate(Date::formatted_time('now'));
                                    $wording->getStudent()->setCode($daouser->findUserForCode(Auth::instance()->get_user())->person->student->id);
                                    $wording->setUrl(basename($fileName) . ".pdf");
                                    if (DAO_Wording::getInstance()->insert($wording)) {
                                        $this->alert('success', 'wording.wordingSuccessSave', 'success', 'wording');
                                    }
                                } else {
                                    $this->alert('warning', 'wording.fileNotSent', 'warning', 'wording/new');
                                }
                            } else {
                                $this->alert('warning', 'wording.invalidFormatFile', 'warning', 'wording/new');
                            }
                        } else {
                            $this->alert('warning', 'wording.perPerson', 'warning', 'wording');
                        }
                    } else {
                        $this->alert('warning', 'wording.wordingQuantitySecret', 'warning', 'wording');
                    }
                } else {
                    $this->alert('warning', 'secret.expired', 'warning', 'wording');
                }
            } else {
                $this->alert('warning', 'secret.unknown', 'warning', 'wording');
            }
        } else {


            $this->actionForm = URL::site('wording/new');

            $this->page = View::factory('wording/new')
                    ->set('themes', DAO_Theme::getInstance()->listTheme());
        }
    }

    public function action_view() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $correction = new POJO_Correction();

        $correction->getWording()->setCode($this->request->param('id'));
        $wordingDAO = DAO_Wording::getInstance();

        $this->page = View::factory('wording/view')
                ->set('wording', $wordingDAO->findWordingForCode($correction->getWording()));
    }

    public function action_delete() {

        POJO_Session::getInstance()->isLogged();

        $daowording = DAO_Wording::getInstance();

        $wording = $daowording->findForCode($this->request->param('id'));

        $currentDir = getcwd();
        $uploadDirectory = DIRECTORY_SEPARATOR . "storage/wordings" . DIRECTORY_SEPARATOR;

        if (unlink($currentDir . $uploadDirectory . $wording->getUrl())) {
            if (is_null($daowording->delete($wording->getCode()))) {
                $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
                $this->alert('success', 'wording.delete', 'success', 'wording');
            }
        } else {
            $this->alert('warning', 'wording.fileNotRemoved', 'warning', 'wording');
        }
    }

    public function action_selecteds() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $wordingDAO = DAO_Wording::getInstance();

        $pagination = $wordingDAO->pagination($wordingDAO->wordingListSelected()
                        ->find_all()
                        ->count());

        $selecteds = $wordingDAO->wordingListSelected()
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $this->page = View::factory('wording/selected/list')
                ->set('selecteds', $selecteds)
                ->set('pagination', $pagination);
    }

}
