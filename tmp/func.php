<?php

function header_get_authorization()
{
    $headers = null;

    if (isset($_SERVER['Authorization']))
    {
        list($headers['type'], $headers['token']) = explode(" ", trim($_SERVER["Authorization"]));
    }
    elseif (isset($_SERVER['HTTP_AUTHORIZATION']))
    {
        list($headers['type'], $headers['token']) = explode(" ", trim($_SERVER["HTTP_AUTHORIZATION"]));
    }
    elseif (function_exists('apache_request_headers'))
    {
        $requestHeaders = apache_request_headers();

        $requestHeaders = array_combine(
            array_map(
                'ucwords',
                array_keys($requestHeaders)
            ),
            array_values($requestHeaders)
        );

        if (isset($requestHeaders['Authorization']))
        {
            $parsed_auth = explode(" ", trim($requestHeaders['Authorization']));
            $headers['type'] = $auth_type = $parsed_auth[0];

            switch ($auth_type)
            {
                case "Basic":
                    @list($user, $password) = explode(":", base64_decode($parsed_auth[1]));
                    if (isset($user))
                    {
                        $headers['user'] = $user;

                        if (isset($password))
                            $headers['pass'] = $password;
                    }
                    break;

                case "Bearer":
                    $headers['token'] = $parsed_auth[1];
                    break;
            }
        }
    }

    return $headers;
}

function header_user_verify($user, $password)
{
    if ($auth = header_get_authorization())
    {
        if ($auth['type'] != "Basic")
            return null;

        return ($user == $auth['user'] && $password == $auth['pass']);
    }

    return null;
}

function header_token_verify($token)
{
    if ($auth = header_get_authorization())
    {
        if ($auth['type'] != "Bearer")
            return null;

        return ($token == $auth['token']);
    }

    return null;
}

function token_generate($user, $password)
{
    return $user . ":"
        . md5(md5($user . ":" . $password) . ":"
            . md5(date("H:i:s")));
}