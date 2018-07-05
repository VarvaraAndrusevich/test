<?php require_once 'db.php';?>

<meta charset="UTF-8">

<style type="text/css">
    form {
        border: 1px solid black;
        margin-top: 10px;
        padding: 10px;
        display: inline-block
    }
    form button, form input {
        margin: 5px 0px;
    }
    td {
        border: 1px solid black;
        padding: 5px;

    }
</style>

<?
$data = $_POST;
$string = $data['string'] ? $data['string'] : '';
$char = $data['char'] ? str_split( $data['char'] ) : '';

if ( isset($data['add']) ) {
    if ( !empty($string) ) {
        $stringAdd = str_replace($char, '', $string);
        mysqli_query(
            $con,
            'INSERT INTO Test (String) VALUE ("' . $stringAdd . '")'
        );
    } else {
        echo '<div id="errors" style="color:red;">Введите строку!</div><hr>';
    }
}

if ( isset($data['show']) ) {
    $result = mysqli_query(
        $con,
        'SELECT * FROM Test'
    );
    if ( !empty($result) ) {?>
        <table>
            <tr>
                <th>ID</th>
                <th>String</th>
            </tr>
        <?while ($row = mysqli_fetch_assoc($result))
        {?>
            <tr>
                <td><?=$row['Id'];?></td>
                <td><?=$row['String'];?></td>
            </tr>

        <?}?>
        </table>
    <?} else {
        echo '<div id="errors" style="color:red;">База данных не содержит ни одной записи</div><hr>';
    }
}

/**
 * Created by PhpStorm.
 * User: Варвара
 * Date: 05.07.2018
 * Time: 18:43
 */
?>

<form action="index.php" method="POST">
    <label>Введите строку:<br>
        <input type="text" name="string" value="<?php echo $string; ?>"></label><br>

    <label>Введите символы, которые необходимо удалить:<br>
        <input type="text" name="char" value="<?php echo (!$char ? '' : implode( $char )); ?>"></label><br>

    <button type="submit" name="add">Обработать строку</button>
    <button type="submit" name="show">Вывести на экран</button>
</form>