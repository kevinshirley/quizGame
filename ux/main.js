$(document).ready(function(){

	// is obj empty
	function isEmpty(obj) {
    for (const key in obj) {
      if (obj.hasOwnProperty(key)) {
        return false;
      }
    }

    return true;
  }

	//////////////////////////////////
	// Mobile Nav
	/////////////////////////////////

	$('#toggle').click(function() {
		$(this).toggleClass('active');
		$('#overlay').toggleClass('open');
	});

	//////////////////////////////////
	// Quiz
	/////////////////////////////////

	// creating the variables
	var pos = 0, quiz, quiz_status, question, choice, choices, chA, chB, chC, correct = 0, html;

	// all the individual questions in a bigger array
	var questions = [
		[ 'Quel est 10 + 4?', '12', '14', '16', 'B' ],
		[ 'Quel est 20 - 9?', '7', '13', '11', 'C' ],
		[ 'Quel est 7 x 3?', '21', '24', '25', 'A' ],
		[ 'Quel est 8 / 2?', '10', '2', '4', 'C' ],
		[ 'Quel est la capitale de France?', 'Marseille', 'Lyon', 'Paris', 'C' ],
		[ 'Quel est la capitale de l\'Australie?', 'Canberra', 'Sydney', 'Melbourne', 'A' ],
		[ 'Quel est la capitale des États-Unis?', 'New York', 'Washington DC', 'Las Vegas', 'B' ],
		[ 'Quel est la capitale des Irlande?', 'Dublin', 'Galway', 'Cork', 'A' ]
	];

	// render a question
	function renderQuestion() {
		// #quiz div element
		quiz = $('#quiz');

		// checking if the quiz is done
		if (pos >= questions.length) {
			$('#quiz_status').html('Quiz Terminé !');

			html = 'Tu as '+correct+' réponse(s) correct sur '+questions.length;
			html += '<br><button id="redoQuiz">← Refaire le quiz</button>'
			quiz.html(html);

			var url = "index.php?action=incrementSessionScore";
			var $setName = {
				userscore: correct
			};
			$.post(url, $setName);

			// quiz back at beginning
			pos = 0;
			correct = 0;

			// redo the quiz
			$('#redoQuiz').on('click',function(){
				renderQuestion();
			});

			// prevent the survey from running
			return false;
		}

		// appending question status
		$('#quiz_status').html('Question '+(pos+1)+' sur '+questions.length);

		// filling up question & A B C choice variables
		question = questions[pos][0];
		chA = questions[pos][1];
		chB = questions[pos][2];
		chC = questions[pos][3];

		// appending the question and the choices
		html = '<h3>'+question+'</h3>';
		html += '<input type="radio" name="choices" value="A"> '+chA+'<br>';
		html += '<input type="radio" name="choices" value="B"> '+chB+'<br>';
		html += '<input type="radio" name="choices" value="C"> '+chC+'<br>';
		html += '<button id="submitBtn">Submit Answer</button>';
		quiz.html(html);

		// submit answer button
		$('#submitBtn').on('click',function(){
			// placing all the choices arr in an array, affecting to choices var
			choices = $('[name="choices"]');

			// grabbing the input value user has selected
			for (var i = 0; i < choices.length; i++) {
				if (choices[i].checked) {
					choice = choices[i].value;
				}
			}

			// checking if is the right answer
			if (choice == questions[pos][4]) {
				correct++;
			}

			pos++;
			renderQuestion();
		});
	}

	$(window).on('load',renderQuestion(),false);

	//// connexion
	//  create acc
	$("#createacc").on("click",function(){
		$("#signup").css({
			"display": "flex",
			"flex-direction": "column",
			"align-items": "center"
		});

		$("#signin").css({
			"display": "none"
		});
	});

	// already acc btn
	$("#already").on("click",function(){
		$("#signup").css({
			"display": "none"
		});

		$("#signin").css({
			"display": "flex",
			"flex-direction": "column",
			"align-items": "center"
		});
	});

	// access btn
	$("#access").on("click",function(){
		$("#signup").css({
			"display": "none"
		});

		$("#signin").css({
			"display": "none"
		});

		$("#area-box .connection").fadeOut(700);

		$("#area-box .daily").fadeIn(1400);
	});

	// signup form
	$('#signup-btn').on('click', function(e){
		e.preventDefault();
		var url = "index.php?action=signUpForm";
		var $data = {
			namesignup: $('#name-signup').val(),
			emailsignup: $('#email-signup').val(),
			pwdsignup: $('#pwd-signup').val()
		};
		if ($('#name-signup').val() != '' && $('#email-signup').val() != '' && $('#pwd-signup').val() != '') {
			$.post(url, $data, function(resultat){
				$('#name-signup').val('');
				$('#email-signup').val('');
				$('#pwd-signup').val('');
				$('#pwd2-signup').val('');
				$('.login-results').html('');
				$('#signup').css('display', 'none');
				var obj = JSON.parse(resultat);
				if (!isEmpty(obj)) {
					for (var i = 0; i < obj.length; i++) {
						console.log(obj[i]);
						var url = "index.php?action=sessionName";
						var $setName = {
							sessionName: obj[i].name,
							sessionID: obj[i].id
						};
						$.post(url, $setName);
						var url = "index.php?action=sessionScore";
						var $setName = {
							sessionScore: 0
						};
						$.post(url, $setName);
					}
				}
				$('.success-signup').css('display', 'flex');
				$('.success-signup').css('flex-direction', 'column');
				$('.success-signup').css('align-items', 'center');
			});
		} else {
			$('.login-results').html('<p>Entre toutes les infos necessaires</p>');
		}
	});

	// signin form
	$('#signin-btn').on('click', function(e){
		e.preventDefault();
		var url = "index.php?action=signInForm";
		var $data = {
			emailsignin: $('#email-signin').val(),
			pwdsignin: $('#pwd-signin').val()
		};
		if ($('#email-signin').val() != '' && $('#pwd-signin').val() != '') {
			$.post(url, $data, function(resultat){
				$('#email-signin').val('');
				$('#pwd-signin').val('');
				var obj = JSON.parse(resultat);
				if (!isEmpty(obj)) {
					for (var i = 0; i < obj.length; i++) {
						if (obj[i].email === $data.emailsignin && obj[i].password === $data.pwdsignin) {
							var url = "index.php?action=sessionName";
							var $setName = {
								sessionName: obj[i].name,
								sessionID: obj[i].id
							};
							$.post(url, $setName, function(resultat){
								var obj = JSON.parse(resultat);
								if (!isEmpty(obj)) {
									for (var i = 0; i < obj.length; i++) {
										var url = "index.php?action=sessionScore";
										var $setName = {
											sessionScore: obj[i].user_score
										};
										$.post(url, $setName);

										$('.login-results').html('');
										
										window.location.replace("index.php?action=quiz");
									}
								}
							});

							$('.login-results').html('');
							
							window.location.replace("index.php?action=quiz");
						} else {
							$('.login-results').html('<p>Le courriel ou le mot de passe est incorrect</p>');
						}
					}
				} else {
					$('.login-results').html('<p>Le courriel ou le mot de passe est incorrect</p>');
				}
			});
		} else {
			$('.login-results').html('<p>Entrez toutes les infos necessaires</p>');
		}
	});

	$('#usersTable').on('load', function(){
		var url = "index.php?action=getUsersScore";
		$.get(url, function( data ) {
			var obj = JSON.parse(data);
			for (var i = 0; i < obj.length; i++) {
				confirm.log('users score');
				console.log(obj[i]);
			}
		});
	});



});








































