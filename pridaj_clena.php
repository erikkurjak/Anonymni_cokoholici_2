<h1>Pridaj clena</h1>

<form action="pridaj_clena_zpracuj.php" method="post" id="reg">
<input type="hidden" name="sent" value=""/>
	<label>Meno</label>
	<input type="text" name="meno" id="in0" maxlength="25" />
	<label>Priezvisko</label>
        <input type="text" name="priezvisko" id="in1" maxlength="50" />
	<label>Ulica</label>
	<input type="text" name="ulica" id="in2" value="" maxlength="25" />
	<label>Mesto</label>
	<input type="text" name="mesto" id="in3" maxlength="14" />
        <label>PSC</label>
	<input type="text" name="psc" id="in3" maxlength="5" />
	<br/>
        <br/>
        <input id="buttn" type="submit" id="submit" name="send" value="Pridaj!" />      
</form>

