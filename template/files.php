
<div>
	<fieldset><legend>creation fiche</legend>
		<form method="POST" action="traitement/creation_user.php">
			<label>Nom: <input  type="text" name="nom" required /></label></br>
			<label>Prenom: <input  type="text" name="prenom"/></label></br>
			<label>email: <input  type="text" name="email"/></label></br>
			<label>tel: <input type="text" name="tel"/></label></br>
			<label>ville: <input  type="text" name="ville"/></label></br>
			<label>nom du chien: <input  type="text" name="nomChien"/></label></br>
			<label>race: <input  type="text" name="race" required /></label></br>
			<label>date naisance: <input  type="text" name="date"/></label></br>
			<label>observation: <textarea name="observation" cols="35" rows="10"> </textarea></label></br>
			<input type="submit" value="registration">
		</form>
</div>