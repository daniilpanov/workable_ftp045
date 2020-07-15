<?php


namespace app\helpers;


use app\factories\Factory;
use app\models\MailModel;

class MailHelper extends Helper
{
    public static $options = [
        "MIME-Version" => "1.0"
    ];

    public static function mail($to, $from, $reply_to, $subject, $message, $files = null)
    {
        return ($files
            ? self::buildWithAttachments($to, $from, $reply_to, $subject, $message, $files)
            : self::build($to, $from, $reply_to, $subject, $message)
        );
    }

    private static function build($to, $from, $reply_to, $subject, $message)
    {
        //
        $options = [
            "Content-Type" => "text/html;"
        ];
        //
        $options['From'] = (isset($from[1])
            ? "<" . (is_array($from)
                ? $from[0]
                : $from) . ">"
            : $from[1] . "<" . $from[0] . ">"
        );
        //
        $options['Reply-To'] = (isset($reply_to[1])
            ? "<" . (is_array($reply_to)
                ? $reply_to[0]
                : $reply_to) . ">"
            : $reply_to[1] . "<" . $reply_to[0] . ">"
        );

        $options = array_merge($options, self::$options);
        $options_str = self::optionsEncode($options);

        return Factory::models()->createModel("MailModel", [$to, $subject, $message, $options_str]);
    }

    private static function buildWithAttachments($to, $from, $reply_to, $subject, $message, $files)
    {
        $boundary = md5(date('r'));
        //
        $options = [
            "Content-Type" => "multipart/mixed; boundary=\"$boundary\""
        ];
        //
        $options['From'] = (isset($from[1])
            ? "<" . (is_array($from)
                ? $from[0]
                : $from) . ">"
            : $from[1] . "<" . $from[0] . ">"
        );
        //
        $options['Reply-To'] = (isset($reply_to[1])
            ? "<" . (is_array($reply_to)
                ? $reply_to[0]
                : $reply_to) . ">"
            : $reply_to[1] . "<" . $reply_to[0] . ">"
        );

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
            ->createModel("MailModel", [$to, $subject, $msg, $options_str]);
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