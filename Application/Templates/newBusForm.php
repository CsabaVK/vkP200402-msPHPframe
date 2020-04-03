<form action="<?= APPROOT ?>/modifyBus" method="POST"> 
    <fieldset class="modify-bus-form">
        <legend>Buszjárat módosítása</legend>

        <label for="">Indulás</label>
        <input type="text" name="indulas" required autofocus>
        
        <label for="">Cél</label>
        <input type="text" name="cel" required>

        <label for="">Menetidő</label>
        <input type="number" name="menetido" min="0" step="1"  required>

        <label for="">Alacsony</label>
        <input type="number" name="alacsony" min="0" max="1" step="1"  required>


        <input type="submit" value="Submit" class="btn btn-grn">

    </fieldset>
</form>