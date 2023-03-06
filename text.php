<!DOCTYPE html>
<html>
<head>
<title>Learning javascript</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/w3v3.css">
	<link rel="stylesheet" type="text/css" href="css/css/css/fontawesome-all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/responsive-voice.js"></script>
	<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
</head>
<body>
<div class=" w3-content well" style="max-width: 900px;">
	<h3 class="text-primary text-center">Chat bot</h3>
	<br>
	<div class="well text-box w3-white" contenteditable="true">
	</div>
	<button class="btn btn-sm btn-primary"><i class="fa fa-microphone"></i>&nbspStart recording</button>
</div>

<script>
	window.SpeechRecognition=window.webkitSpeechRecognition ||window.SpeechRecognition;
	const recognition=new SpeechRecognition();
	const icon=document.querySelector('i.fa.fa-microphone');
	let paragraph=document.createElement('p');
	let container=document.querySelector('.text-box');
	container.appendChild(paragraph);

	icon.addEventListener('click',()=>{
		dictate();
	});

	const dictate=()=>{
		recognition.start();
		recognition.onresult=(event)=>{
			const SpeechToText=event.results[0][0].transcript;
			paragraph.textContent=SpeechToText;
		}
	}
	</script>
</body>
</html>