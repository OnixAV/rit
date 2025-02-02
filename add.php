<?php
include 'AssetManager.php';

$assetManager = new AssetManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assetManager->addAsset($_POST);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Добавить актив</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Добавить актив</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="type">Тип:</label>
                <select class="form-control" id="type" name="type" onchange="toggleFields()">
                    <option value="деньги">Деньги</option>
                    <option value="неденежный">Недежный актив</option>
                </select>
            </div>

            <!-- Поля для денег -->
            <div id="moneyFields">
                <div class="form-group">
                    <label for="amount">В кассе:</label>
                    <input type="checkbox" id="cash_register" name="cash_register">
                </div>
                <div class="form-group">
                    <label for="amount">Сумма:</label>
                    <input type="number" class="form-control" id="amount" name="amount">
                </div>
                <div class="form-group" id="bank_input">
                    <label for="bank">Банк:</label>
                    <input type="text" class="form-control" id="bank" name="bank">
                </div>
                <div class="form-group" id="account_input">
                    <label for="account">Счет:</label>
                    <input type="text" class="form-control" id="account" name="account">
                </div>
                <div class="form-group">
                    <label for="currency">Валюта:</label>
                    <input type="text" class="form-control" id="currency" name="currency">
                </div>
            </div>

            <!-- Поля для неденежных активов -->
            <div id="nonMoneyFields" style="display:none;">
                <div class="form-group">
                    <label for="view">Вид:</label>
                    <select class="form-control" id="view" name="view">
                        <option value="строение">Строение</option>
                        <option value="материал">Материал</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="initial_value">Начальная стоимость:</label>
                    <input type="number" class="form-control" id="initial_value" name="initial_value">
                </div>
                <div class="form-group">
                    <label for="residual_value">Остаточная стоимость:</label>
                    <input type="number" class="form-control" id="residual_value" name="residual_value">
                </div>
                <div class="form-group" id="estimatedValue">
                    <label for="estimated_value">Оценочная стоимость:</label>
                    <input type="number" class="form-control" id="estimated_value" name="estimated_value">
                </div>
                <div class="form-group" id="marketValue" style="display:none;">
                    <label for="market_value">Рыночная стоимость:</label>
                    <input type="number" class="form-control" id="market_value" name="market_value">
                </div>
                <div class="form-group">
                    <label for="inventory_number">Инвентарный номер:</label>
                    <input type="number" class="form-control" id="inventory_number" name="inventory_number">
                </div>
                <div class="form-group">
                    <label for="production_date">Дата производства:</label>
                    <input type="date" class="form-control" id="production_date" name="production_date">
                </div>
                <div class="form-group" id="quantity" style="display:none;">
                    <label for="quantity_input">Количество:</label>
                    <input type="number" class="form-control" id="quantity_input" name="quantity">
                </div>
                <div class="form-group" id="measureUnit" style="display:none;">
                    <label for="measure_unit">Единица измерения:</label>
                    <select class="form-control" id="measure_unit" name="measure_unit">
                        <option value="кг">Кг</option>
                        <option value="шт">Шт.</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

    <script src="/scripts/add.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
