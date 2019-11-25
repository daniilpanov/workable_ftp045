<form method="post" enctype="multipart/form-data" action="tests.php">
    <label>Кому: <input type="email" name="to"></label>
    <label>От: <input type="email" name="from"></label>
    <label>Кому ответить: <input type="email" name="reply-to"></label>
    <label>Тема: <input type="text" name="subject"></label>
    <label>Текст: <textarea name="message"></textarea></label>
    <label>Файлы: <input type="file" multiple="multiple" name="attachments[]"></label>
    <button type="submit" name="send">Отправить</button>
</form>