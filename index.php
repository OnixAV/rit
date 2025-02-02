<?php
include 'Asset.php';
include 'AssetManager.php';

$assetManager = new AssetManager();
$assets = $assetManager->getAssets();

$cashAssets = array_filter($assets, function($asset) {
    return $asset->is_cash;
});
$nonCashAssets = array_filter($assets, function($asset) {
    return !$asset->is_cash;
});
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Редактор активов</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
  <div class="container mt-5">
    <h1>Список активов</h1>

    <!-- Таблица денежных активов -->
    <h2>Денежные активы</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th class="text-truncate">Имя</th>
            <th class="text-truncate">Тип</th>
            <th class="text-truncate">Вид</th>
            <th class="text-truncate">Банк</th>
            <th class="text-truncate">Счет</th>
            <th class="text-truncate">Сумма</th>
            <th class="text-truncate">Валюта</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cashAssets as $index => $asset): ?>
          <tr>
            <td class="text-center"><?php echo htmlspecialchars($asset->name); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->type); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->cash_register =='on' ? "В кассе" : "В банке"); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->bank); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->account); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->amount); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->currency); ?></td>
            <td class="text-center">
              <form action="edit.php" method="get" style="display:inline;">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <button type="submit" class="btn btn-link p-0" title="Редактировать">
                  <i class="fas fa-edit"></i>
                </button>
              </form>
              <form action="delete.php" method="post" style="display:inline;">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <input type="hidden" name="action" value="delete">
                <button type="submit" class="btn btn-link p-0" title="Удалить" onclick="return confirm('Вы уверены, что хотите удалить?');">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Таблица неденежных активов -->
    <h2>Неденежные активы</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th class="text-truncate">Имя</th>
            <th class="text-truncate">Тип</th>
            <th class="text-truncate">Вид</th>
            <th class="text-truncate">Начальная стоимость</th>
            <th class="text-truncate">Остаточная стоимость</th>
            <th class="text-truncate">Оценочная стоимость</th>
            <th class="text-truncate">Рыночная стоимость</th>
            <th class="text-truncate">Инвентарный номер</th>
            <th class="text-truncate">Дата производства</th>
            <th class="text-truncate">Кол-во</th>
            <th class="text-truncate">Единица измерения</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($nonCashAssets as $index => $asset): ?>
          <tr>
            <td class="text-center"><?php echo htmlspecialchars($asset->name); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->type); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->view); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->initial_value); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->residual_value); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->estimated_value); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->market_value); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->inventory_number); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->production_date); ?></td>
            <td class="text-right"><?php echo htmlspecialchars($asset->quantity); ?></td>
            <td class="text-center"><?php echo htmlspecialchars($asset->measure_unit); ?></td>
            <td class="text-center">
              <form action="edit.php" method="get" style="display:inline;">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <button type="submit" class="btn btn-link p-0" title="Редактировать">
                  <i class="fas fa-edit"></i>
                </button>
              </form>
              <form action="delete.php" method="post" style="display:inline;">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <input type="hidden" name="action" value="delete">
                <button type="submit" class="btn btn-link p-0" title="Удалить" onclick="return confirm('Вы уверены, что хотите удалить?');">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <a href="add.php" class="btn btn-success">Добавить актив</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
