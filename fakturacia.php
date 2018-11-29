<h1>Fakturacia</h1>

<form action="fakturacia_zpracuj.php" method="post" id="reg">
    <input type="hidden" name="sent" value=""/>
    <label>ID ukonu</label>
    <input type="text" name="idukonu" id="in0" maxlength="25" />
    <label>ID clena</label>
    <input type="text" name="idclena" id="in2" value="" maxlength="25" />
    <label>Datum poskytnutia (yyyy-MM-dd)</label>
    <input type="text" name="datumposkytnutia" id="in3" maxlength="14" />
    <label>Komentar</label>
    <input type="text" name="komentar" id="in4" maxlength="50" />
    <br/>
    <br/>
    <input id="buttn" type="submit" id="submit" name="send" value="Fakturuj!" />
</form>

