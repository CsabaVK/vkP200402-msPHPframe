<div class="all-test-container">
    A buszjáratom <?= $numOfTestes ?> vizsgálatot végeztek
</div>

<table class="allbus-table">
    <tr>
      <th>Busz azonosító</th>
      <th>Dátum</th>
      <th>Megjegyzés</th>
      <th>Engedélyezve</th>
    </tr>

    <?php foreach($testes as $test): ?>
      <tr>
        <?php for($i=1; $i<count($test); $i++): ?>
        <td> <?= $test[$i] ?> </td>
        <?php endfor ?>
      </tr>

      <?php endforeach ?>
</table>