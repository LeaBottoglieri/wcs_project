<?php

namespace Controllers;

class MemberController {

    public function verifAddMember() {

        $errors = [];

        $addMember = ['addNom' => ''];

        if (array_key_exists('name', $_POST)) {

            $addMember = ['addNom' => trim($_POST['name'])];

            if ($addMember['addNom'] == '')
                $errors[] = "Veuillez remplir le champ 'Charalampos' !";

            if (strlen($addMember['addNom']) < 3)
            $errors[] = "Le champ 'Charalampos' doit contenir au moins 3 caractères !";

            if (count($errors) == 0) {
                $data = [
                    $addMember['addNom']
                ];

                $model = new \Models\Member();
                $add = $model->addNewMember($data);

                $_SESSION['message'] = "Le membre a bien été enregistré !";
                header('Location: index.php?route=home');
                exit();
            }

            $model = new \Models\Member();
            $users = $model->getAllMembers();
            $i = 0;
            $columns = 3;
            $template = "home.phtml";
            include_once 'views/layout.phtml';
        }
    }
}
