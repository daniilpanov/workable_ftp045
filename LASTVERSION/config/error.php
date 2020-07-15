<?php
/** @var $exception Throwable */

echo "<div class='error'>";
echo "<code class='err_type'>Exception class &mdash; &ldquo;" . get_class($exception) . "&rdquo;</code><p></p>";
echo "<code class='err_code'>Код ошибки: " . $exception->getCode() . "</code>";
echo "<p class='err_msg'>Сообщение: &ldquo;" . $exception->getMessage() . "&rdquo;</p>";
echo "<code class='err_file_line'>Error was occurred at "
    . $exception->getFile() . " on line "
    . $exception->getLine() . "</code>";
echo "<div class='err_tracing'><h4 class='err_tracing_header'>Tracing</h4>"
    . str_replace("#", "<p class='err_trace_item'>#", $exception->getTraceAsString())
    . "</div>";
echo "</div>";