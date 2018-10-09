<?php
require 'helpers.php';
require 'logic.php';
require 'foodsJson.php';
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>calorie calculator</title>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>

<h1>Calorie Calculator</h1>
<p>This food Calorie Calculator below allows you to choose from dozens of foods, and see nutrition facts such as calories, fat, protein, etc.</p>
<form method='GET' action='calc.php'>

    <label>Qty:<input type="number" name="quantity" placeholder="How much do you eat?"></label>
    <label><input type='radio' name="unit" id="lb" value="lb" checked> lb</label>
    <label><input type="radio" name="unit" id='kg' value="kg"> kg</label><br><br>
    <label>Food name:
        <select name='food' id='food'>
            <?php foreach ($foods as $food): ?>
                <option value='<?= $food["name"] ?>'><?= $food["name"] ?></option>
            <?php endforeach ?>
        </select>
    </label>
    <input type='submit' value='submit'><br>
    <?php if ($hasErrors): ?>
        <ul class='warning'>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
</form>
<?php if (!$hasErrors): ?>
    <div id='result'>
        <?php if (isset($foodName)): ?>
            <p class='alert' role='alert'><?= $quantity ?> <?= $unit ?> <?= $foodName ?> contains</p>
            <dl>
                <?php foreach ($nutrList as $nutr => $nutrAmout): ?>
                    <dt><?= $nutr ?></dt>
                    <dd><?= $nutrAmout ?></dd>
                <?php endforeach; ?>
            </dl>
        <?php endif; ?>
    </div>
<?php endif ?>
</body>
</html>
