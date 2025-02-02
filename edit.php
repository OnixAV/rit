<?php
include 'Asset.php';
include 'AssetManager.php';

$assetManager = new AssetManager();

$index = $_GET['index'];
$asset = $assetManager->getAsset($index);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assetManager->editAsset($index, $_POST);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Редактировать актив</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Редактировать актив</h1>
        <form action="" method="post">
            <input type="hidden" name="type" value="<?php echo htmlspecialchars($asset->type); ?>">
            <input type="hidden" name="cash_register" value="<?php echo htmlspecialchars($asset->cash_register); ?>">

            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($asset->name); ?>" required>
            </div>

            <!-- Поля для денег -->
            <div id="moneyFields" <?php echo $asset->type === 'деньги' ? '' : 'style="display:none;"'; ?>>
                <div class="form-group">
                    <label for="amount">Сумма:</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($asset->amount); ?>">
                </div>
                <?php if($asset->cash_register !='on'): ?>
                <div class="form-group">
                    <label for="bank">Банк:</label>
                    <input type="text" class="form-control" id="bank" name="bank" value="<?php echo htmlspecialchars($asset->bank); ?>">
                </div>
                <div class="form-group">
                    <label for="account">Счет:</label>
                    <input type="text" class="form-control" id="account" name="account" value="<?php echo htmlspecialchars($asset->account); ?>">
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="currency">Валюта:</label>
                    <input type="text" class="form-control" id="currency" name="currency" value="<?php echo htmlspecialchars($asset->currency); ?>">
                </div>
            </div>

            <!-- Поля для неденежных активов -->
            <div id="nonMoneyFields" <?php echo $asset->type === 'неденежный' ? '' : 'style="display:none;"'; ?>>
                <div class="form-group">
                    <label for="initial_value">Начальная стоимость:</label>
                    <input type="number" class="form-control" id="initial_value" name="initial_value" value="<?php echo htmlspecialchars($asset->initial_value); ?>">
                </div>
                <div class="form-group">
                    <label for="residual_value">Остаточная стоимость:</label>
                    <input type="number" class="form-control" id="residual_value" name="residual_value" value="<?php echo htmlspecialchars($asset->residual_value); ?>">
                </div>
                <?php if($asset->view === 'строение'): ?>
                <div class="form-group">
                    <label for="estimated_value">Оценочная стоимость:</label>
                    <input type="number" class="form-control" id="estimated_value" name="estimated_value" value="<?php echo htmlspecialchars($asset->estimated_value); ?>">
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="market_value">Рыночная стоимость:</label>
                    <input type="number" class="form-control" id="market_value" name="market_value" value="<?php echo htmlspecialchars($asset->market_value); ?>">
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="inventory_number">Инвентарный номер:</label>
                    <input type="number" class="form-control" id="inventory_number" name="inventory_number" value="<?php echo htmlspecialchars($asset->inventory_number); ?>">
                </div>
                <div class="form-group">
                    <label for="production_date">Дата производства:</label>
                    <input type="date" class="form-control" id="production_date" name="production_date" value="<?php echo htmlspecialchars($asset->production_date); ?>">
                </div>
                <div class="form-group">
                    <label for="quantity_input">Количество:</label>
                    <input type="number" class="form-control" id="quantity_input" name="quantity" value="<?php echo htmlspecialchars($asset->quantity); ?>">
                </div>
                <div class="form-group">
                    <label for="measure_unit">Единица измерения:</label>
                    <select class="form-control" id="measure_unit" name="measure_unit">
                        <option value="кг" <?php echo $asset->measure_unit === 'кг' ? 'selected' : ''; ?>>Кг</option>
                        <option value="шт" <?php echo $asset->measure_unit === 'шт' ? 'selected' : ''; ?>>Шт.</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
