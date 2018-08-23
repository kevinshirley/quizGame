<?php 

class Form
{
	public function signUpDB($name,$email,$pwd) {
	    $bdd = SingletonPDO::getInstance();
	    $donnees = $bdd->prepare(
            'INSERT INTO quizusers (name, email, password) VALUES (:name, :email, :pwd)'
        );
	    $donnees->bindParam(':name', $name, PDO::PARAM_STR);
	    $donnees->bindParam(':email', $email, PDO::PARAM_STR);
	    $donnees->bindParam(':pwd', $pwd, PDO::PARAM_STR);
		$donnees->execute();

		$bdd = SingletonPDO::getInstance();
	    $donnees = $bdd->query('SELECT id, name, email FROM quizusers WHERE email LIKE "' . '%' . $email . '%' . '"');
	    return $donnees->fetchAll();
	}

	public function initiateScoreDB($id,$score) {
	    $bdd = SingletonPDO::getInstance();
	    $donnees = $bdd->prepare(
            'INSERT INTO quizscoreboard (user_id, user_score) VALUES (:id, :score)'
        );
	    $donnees->bindParam(':id', $id, PDO::PARAM_STR);
	    $donnees->bindParam(':score', $score, PDO::PARAM_STR);
        $donnees->execute();
        return true;
	}

	public function signInDB($email,$pwd) {
	    $bdd = SingletonPDO::getInstance();
	    $donnees = $bdd->query('SELECT id, name, email, password FROM quizusers WHERE email LIKE "' . '%' . $email . '%' . '"');
	    return $donnees->fetchAll();
	}

	public function updateScoreDB($id,$score) {
	    $bdd = SingletonPDO::getInstance();
	    $donnees = $bdd->prepare(
			'UPDATE quizscoreboard SET user_score = :score WHERE user_id = :id'
        );
	    $donnees->bindParam(':id', $id, PDO::PARAM_STR);
	    $donnees->bindParam(':score', $score, PDO::PARAM_STR);
        $donnees->execute();
        return true;
	}

	public function selectScoreDB($id) {
	    $bdd = SingletonPDO::getInstance();
	    $donnees = $bdd->query('SELECT user_score FROM quizscoreboard WHERE user_id LIKE "' . '%' . $id . '%' . '"');
	    return $donnees->fetchAll();
	}

	public function selectAllScoreDB() {
	    $bdd = SingletonPDO::getInstance();
	    $donnees = $bdd->query('SELECT score.users_id, score.users_score, users.id, users.name FROM (SELECT id, name FROM quizusers) AS users JOIN (SELECT user_id, user_score FROM quizscoreboard) AS score ON users.id = score.users_id');
	    return $donnees->fetchAll();
	}
}