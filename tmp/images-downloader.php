<form method="get" action="./images-downloader.php">
    <label><input type="text" name="from" value="<?= @$_GET['from'] ?>"></label>
    <label><input type="text" name="to" value="<?= @$_GET['to'] ?>"></label>
    <button type="submit">Скопировать</button>
</form>
<?php
if (@$_GET['to'] || @$_GET['from'])
{
    copy($_GET['from'], $_GET['to']);
}