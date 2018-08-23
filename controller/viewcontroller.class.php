<?php
//controleur
class ViewController
{
	public function homePage()
	{
        $view = new Vue('Home');
        $view->generer(array());
	}

	public function quizPage()
	{
        $view = new Vue('Quiz');
        $view->generer(array());
	}

	public function aproposPage()
	{
        $view = new Vue('Apropos');
        $view->generer(array());
	}

	public function usersPage()
	{
        $view = new Vue('Users');
        $view->generer(array());
	}

	public function userSigningUp($name,$email,$pwd)
	{
		$oForm = new Form();
		$insert = $oForm->signUpDB($name,$email,$pwd);
		return $insert;
	}

	public function userSigningIn($email,$pwd)
	{
		$oForm = new Form();
		$select = $oForm->signInDB($email,$pwd);
		return $select;
	}

	public function initiateScoreboard($id)
	{
		$oForm = new Form();
		$score = 0;
		$initiate = $oForm->initiateScoreDB($id,$score);
	}

	public function updateUserScoreboard($id,$score)
	{
		$oForm = new Form();
		$update = $oForm->updateScoreDB($id,$score);
	}

	public function selectCurrentScore($id)
	{
		$oForm = new Form();
		$select = $oForm->selectScoreDB($id);
		return $select;
	}

	public function selectAllScores()
	{
		$oForm = new Form();
		$select = $oForm->selectAllScoreDB();
		return $select;
	}

}