<?php

class Controller {

    private $_ctrlView;

    public function __construct() {
        if(!isset($_GET['action'])){
            $_GET['action'] = 'home';
        }

        $this->_ctrlView = new ViewController();
    }

    public function router() {
        switch($_GET['action']){
            case 'home':
                $this->_ctrlView->homePage();
                break;
            case 'apropos':
                $this->_ctrlView->aproposPage();
                break;
            case 'users':
                $this->_ctrlView->usersPage();
                break;
            case 'quiz':
                if (!empty($_SESSION["user"])) {
                    $this->_ctrlView->quizPage();
                } else {
                    header("location:index.php");
                }
                break;
            case 'quiz-first-time':
                if (!empty($_SESSION["user"])) {
                    $this->_ctrlView->initiateScoreboard($_SESSION["id"]);
                    $this->_ctrlView->quizPage();
                } else {
                    header("location:index.php");
                }
                break;
            case 'signUpForm':
                if (isset($_POST['namesignup']) && !empty($_POST['namesignup']) && isset($_POST['emailsignup']) && !empty($_POST['emailsignup']) && isset($_POST['pwdsignup']) && !empty($_POST['pwdsignup']))
                {
                    $name = Utils::getPOST('namesignup');
                    $email = Utils::getPOST('emailsignup');
                    $pwd = Utils::getPOST('pwdsignup');

                    $result = $this->_ctrlView->userSigningUp($name,$email,$pwd);

                    echo json_encode($result);
                }
                break;
            case 'signInForm':
                if (isset($_POST['emailsignin']) && !empty($_POST['emailsignin']) && isset($_POST['pwdsignin']) && !empty($_POST['pwdsignin']))
                {
                    $email = Utils::getPOST('emailsignin');
                    $pwd = Utils::getPOST('pwdsignin');

                    $searchResult = $this->_ctrlView->userSigningIn($email,$pwd);

                    echo json_encode($searchResult);
                }
                break;
            case 'sessionName':
                if (isset($_POST['sessionName'])) {
                    $_SESSION["user"] = $_POST['sessionName'];
                    $_SESSION["id"] = $_POST['sessionID'];
                    $result = $this->_ctrlView->selectCurrentScore($_SESSION["id"]);
                    echo json_encode($result);
                }
                break;
            case 'sessionScore':
                if (isset($_POST['sessionScore'])) {
                    $_SESSION["score"] = $_POST['sessionScore'];
                }
                break;
            case 'incrementSessionScore':
                if (isset($_POST['userscore'])) {
                    if ($_SESSION["score"] > 0) {
                        $_SESSION["score"] += $_POST['userscore'];
                    } else {
                        $_SESSION["score"] = $_POST['userscore'];
                    }
                    $this->_ctrlView->updateUserScoreboard($_SESSION['id'],$_SESSION['score']);
                }
                break;
            case 'getUsersScore':
                $users = $this->_ctrlView->selectAllScores();
                echo json_encode($users);
                break;
            case 'logout':
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                    unset($_SESSION['id']);
                    unset($_SESSION['score']);
                    session_destroy();
                    header("location:index.php");
                    exit();
                }
                break;
            default:
                $this->_ctrlView->homePage();
        }
    }
    
    /**
    * Lorsque la requête demande la page d'accueil
    * @access public
    */

}