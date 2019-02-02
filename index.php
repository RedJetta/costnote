<?php

require_once 'connection.php';
require_once 'functions.php';
//if(!empty($_POST)){
//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';
//}


if(!empty($_GET)){
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
}

if(!empty($_POST) && !($_POST['deleteButton']) && !($_POST['updateButton'])){
    save_mess();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

if($_POST['deleteButton']){
    delete_mess();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

if($_POST['updateButton']){
    update_mess();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

$baseres = get_mess();
//print_array($baseres);
$activeSum = get_sum('active');
$passiveSum = get_sum('passive');
$incomeSum = get_sum('income');
$outlaySum = get_sum('outlay');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>costnote</title>

</head>
<body>

<form action="index.php" method="post">
    <p>
    <label for="type">Choose:</label>
    <select name="type" id="type">
        <option value="">--Please choose an option--</option>
        <option value="ACTIN">Active-Income</option>
        <option value="PASSOUT">Passive-Outlay</option>
    </select>
    </p>
    <p>
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="full">Full:</label><br>
        <input type="text" name="full" id="full">
    </p>
    <p>
        <label for="pm">Per Month:</label><br>
        <input type="text" name="pm" id="pm">
    </p>
    <button type="submit">Write</button>
</form>
<?php
    print_r($_POST);
?>
<div>
    <div style="border:4px solid gray; display: inline-block; width: 20%; border-radius: 3%">
        <div style="background-color: greenyellow; border: 2px solid yellow; margin: 10px; text-align: center">
            <p>Income : <?= $incomeSum ?></p>
        </div>
        <?php if(!empty($baseres)): ?>
            <?php foreach ($baseres as $basere): ?>
                <?php if(!($basere['income'] == NULL)): ?>
        <form action="index.php" method="post">
            <div style="border: 2px solid blueviolet; margin: 5px;" ">
                <p><?=$basere['text']?> ||| <?=$basere['income']?>
                        <button type="submit" name="deleteButton" value="<?= $basere['id'] ?>" >Delete</button>
                    <button type="submit" name="updateButton" value="<?= $basere['id'] ?>" >Update</button>
                </p>
            <input type="text" name="update">
            </div>
        </form>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div style="border:4px solid gray; display: inline-block; width: 20%; border-radius: 3%">
        <div style="background-color: indianred; border: 2px solid yellow; margin: 10px; text-align: center">
            <p>Outlay : <?= $outlaySum ?></p>
        </div>
        <?php if(!empty($baseres)): ?>
            <?php foreach ($baseres as $basere): ?>
                <?php if(!($basere['outlay'] == NULL)): ?>
        <form action="index.php" method="post">
                    <div style="border: 2px solid blueviolet; margin: 5px;">
                    <p><?=$basere['text']?> ||| <?=$basere['outlay']?>
                            <button type="submit" name="deleteButton" value="<?= $basere['id'] ?>">Delete</button>
                    </p>
                </div>
        </form>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div style="border:4px solid gray; display: inline-block; width: 20%; border-radius: 3%">
        <div style="background-color: greenyellow; border: 2px solid yellow; margin: 10px; text-align: center">
            <p>Actives : <?= $activeSum ?></p>
        </div>
        <?php if(!empty($baseres)): ?>
            <?php foreach ($baseres as $basere): ?>
                 <?php if(!($basere['income'] == NULL)): ?>
        <form action="index.php" method="post">
            <div style="border: 2px solid blueviolet; margin: 5px;">
                    <p><?=$basere['text']?> ||| <?=$basere['active']?>

                            <button type="submit" name="deleteButton" value="<?= $basere['id'] ?>">Delete</button>

                    </p>
                </div>
        </form>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div style="border:4px solid gray; display: inline-block; width: 20%; border-radius: 3%">
        <div style="background-color: indianred; border: 2px solid yellow; margin: 10px; text-align: center">
            <p>Passive : <?= $passiveSum ?></p>
        </div>
        <?php if(!empty($baseres)): ?>
            <?php foreach ($baseres as $basere): ?>
                 <?php if(!($basere['outlay'] == NULL)): ?>
        <form action="index.php" method="post">
            <div style="border: 2px solid blueviolet; margin: 5px;">
                    <p><?=$basere['text']?> ||| <?=$basere['passive']?>

                            <button type="submit" name="deleteButton" value="<?= $basere['id'] ?>">Delete</button>

                    </p>
                </div>
        </form>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
