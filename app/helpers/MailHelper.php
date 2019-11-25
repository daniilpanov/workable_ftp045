<?php


namespace app\helpers;


use app\factories\Factory;
use app\models\MailModel;

class MailHelper extends Helper
{
    public static $options = [
        "MIME-Version" => "1.0"
    ];

    public static function mail($to, $from, $reply_to, $subject, $message, $files = null): MailModel
    {
        return ($files
            ? self::buildWithAttachments($to, $from, $reply_to, $subject, $message, $files)
            : self::build($to, $from, $reply_to, $subject, $message)
        );
    }

    private static function build($to, $from, $reply_to, $subject, $message)
    {
        $options = [
            "From" => "<$from>",
            "Reply-To" => "<$reply_to>",
            "Content-Type" => "text/html;"
        ];

        $options = array_merge($options, self::$options);
        $options_str = self::optionsEncode($options);

        return Factory::models()->createModel("Mail", [$to, $subject, $message, $options_str]);
    }

    private static function buildWithAttachments($to, $from, $reply_to, $subject, $message, $files)
    {
        $boundary = md5(date('r'));

        $options = [
            "From" => "<$from>",
            "Reply-To" => "<$reply_to>",
            "Content-Type" => "multipart/mixed; boundary=\"$boundary\""
        ];

        $options = array_merge($options, self::$options);
        $options_str = self::optionsEncode($options);
        ///
        $msg = "
Content-Type: multipart/mixed; boundary=\"$boundary\"

--$boundary
Content-Type: text/html; charset=\"utf - 8\"
Content-Transfer-Encoding: 7bit

$message";
        ///
        for ($i = 0; $i < count($files['name']); $i++)
        {
            $attachment = chunk_split(base64_encode(file_get_contents($files['tmp_name'][$i])));
            $filename = $files['name'][$i];
            $filetype = $files['type'][$i];
            //$filesize = $files['size'][$i];
            $msg .= "
--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"

$attachment";
        }
        ///
        $msg .= "
--$boundary--";
        ///

        return Factory::models()
            ->createModel("Mail", [$to, $subject, $msg, $options_str]);
    }

    private static function optionsEncode($opt)
    {
        $res = "";

        foreach ($opt as $name => $value)
        {
            $res .= $name . ": " . $value . "\r\n";
        }

        return $res;
    }
}