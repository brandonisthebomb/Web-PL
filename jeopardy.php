<html>
<head>
	<title>Jeopardy</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<script type="text/javascript">

		// Keep track of the current active form selected.
		var activeForm = "mc";

		// Show form based on which type of question is picked.
		function showForm(form) {
			if(form == "mc")
			{
				document.getElementById("multipleChoice").style.display = "block";
				document.getElementById("trueFalse").style.display = "none";
				document.getElementById("shortAnswer").style.display = "none";
			}
			else if(form == "tf")
			{
				document.getElementById("multipleChoice").style.display = "none";
				document.getElementById("trueFalse").style.display = "block";
				document.getElementById("shortAnswer").style.display = "none";
			}
			else {
				document.getElementById("multipleChoice").style.display = "none";
				document.getElementById("trueFalse").style.display = "none";
				document.getElementById("shortAnswer").style.display = "block";
			}
			activeForm = form;
		}

		// Check if any boxes are empty for the currently selected form.
		function submitForm() {
			if(activeForm == "mc") 
			{
				if(document.getElementById("multipleChoiceQuestion").value != "" && 
					document.getElementById("aAnswer").value != "" && 
					document.getElementById("bAnswer").value != "" && 
					document.getElementById("cAnswer").value != "" && 
					document.getElementById("dAnswer").value != "") 
				{
					document.getElementById("multipleChoice2").submit();
				}
				else {
					alert("Please fill out every field")
				}
			}
			else if(activeForm == "tf") 
			{
				if(document.getElementById("trueFalseQuestion").value != '' && 
					document.getElementById("falseAnswer").value != '' && 
					document.getElementById("trueAnswer").value != '') 
				{
					document.getElementById("trueFalse").submit();
				}
				else {
					alert("Please fill out every field")
				}
			}
			else {
				if(document.getElementById("shortAnswerQuestion").value != '' && 
					document.getElementById("shortAnswerAnswer").value != '') 
				{
					document.getElementById("shortAnswer").submit();
				}
				else {
					alert("Please fill out every field")
				}
			}
		}

		// When the reset button is pressed, clears all of the form entries.
		function resetForm() {
			if(activeForm == "mc")
			{
				document.getElementById("multipleChoice2").reset();
			}
			else if(activeForm == "tf")
			{
				document.getElementById("trueFalse").reset();
			}
			else {
				document.getElementById("shortAnswer").reset();
			}
		}

		// Change the background color based on which form is selected.
		function changeBackground(form) {
			if(form == "mc")
			{
				document.body.style.backgroundColor = "lightblue";
			}
			else if(form == "tf")
			{
				document.body.style.backgroundColor = "lightgreen";

			}
			else {
				document.body.style.backgroundColor = "pink";
			}
		}

	</script>
</head>
<body>
	<h2> A project by Addison Dunn (awd5eg) and Brandon Liu (bl6aw). <h2>
		<h1 id="header1"> Choose a Question Type </h1>
		<p>Choose the type of question you'd like to create:
			<br>
			<br>
			<select id="dropdown1" onchange="showForm(this.value); changeBackground(this.value);"> 
				<option value="mc">Multiple Choice</option> 
				<option value="tf">True/False</option> 
				<option value="sa">Short Answer</option> 
			</select> <br>
			<br>

			<div id="multipleChoice">
				<form name="multipleChoice" id="multipleChoice2" style="display: block;" method="post" action="formHandler.php">
					Enter a multipleChoice Choice Question:
					<table cellspacing="10">
						<tbody><tr>
							<td><label>Question:</label></td>
							<td><textarea name="multipleChoiceQuestion" id="multipleChoiceQuestion" value="" rows="2" style="width: 200%;"></textarea></td>
						</tr>
						<tr>
							<td><label>A:</label></td>
							<td><textarea name="aAnswer" id="aAnswer" value="" rows="1" style="width: 250%;"></textarea></td>
						</tr>
						<tr>
							<td><label>B:</label></td>
							<td><textarea name="bAnswer" id="bAnswer" value="" rows="1" style="width: 250%;"></textarea></td>
						</tr>
						<tr>
							<td><label>C:</label></td>
							<td><textarea name="cAnswer" id="cAnswer" value="" rows="1" style="width: 250%;"></textarea></td>
						</tr>
						<tr>
							<td><label>D:</label></td>
							<td><textarea name="dAnswer" id="dAnswer" value="" rows="1" style="width: 250%;"></textarea></td>
						</tr>
					</tbody></table>
				</form>
			</div>

			<form name="trueFalse" id="trueFalse" style="display: none;" method="post" action="formHandler.php">
				Enter a True/False Question:
				<table cellspacing="10">
					<tbody><tr>
						<td><label>Question:</label></td>
						<td><textarea name="trueFalseQuestion" id="trueFalseQuestion" value="" rows="2" style="width: 200%;"></textarea></td>
					</tr>
					<tr>
						<td><label>True Answer:</label></td>
						<td><textarea name="trueAnswer" id="trueAnswer" value="" rows="1" style="width: 250%;"></textarea></td>
					</tr>
					<tr>
						<td><label>false Answer:</label></td>
						<td><textarea name="falseAnswer" id="falseAnswer" value="" rows="1" style="width: 250%;"></textarea></td>
					</tr>
				</tbody></table>
			</form>

			<form name="shortAnswer" id="shortAnswer" style="display: none;" method="post" action="formHandler.php">
				Enter a Short Answer Question:
				<table cellspacing="10">
					<tbody><tr>
						<td><label>Question:</label></td>
						<td><textarea name="shortAnswerQuestion" id="shortAnswerQuestion" value="" rows="2" style="width: 200%;"></textarea></td>
					</tr>
					<tr>
						<td><label>Answer:</label></td>
						<td><textarea name="shortAnswerAnswer" id="shortAnswerAnswer" value="" rows="4" style="width: 250%;"></textarea></td>
					</tr>
				</tbody></table>
			</form>

			<button id="submitButton" type="button" onclick="submitForm();">Submit</button>
			<button id="clearButton" type="button" onclick="resetForm();">Clear</button>

		</p>
	</body>