<table class="allbus-table">
  <tr>
      <th>Azonosító</th>
      <th>Indulás</th>
      <th>Cél</th>
      <th>Menetidő</th>
      <th>Alacsony</th>
      <th>Adatok</th>
      <th>Modosítás</th>
  </tr>
      <?php foreach($buses as $bus): ?>
  <tr>
      <?php for($i = 0;$i < count($bus); $i++): ?>
      <td> <?= $bus[$i] ?> </td>
      <?php endfor ?>
        <td>
          <a href="<?= APPROOT ?>/testes/<?= $bus[0] ?>" class="btn btn-grn">Lekér</a>
        </td>
        <td>
          <a href="<?= APPROOT ?>/modifyBusForm/<?= $bus[0] ?>" class="btn btn-rng">Ugrás</a>
        </td>
  </tr>
  <?php endforeach ?>

</table>