<?php

if (!function_exists('get_array_value')) {
    /**
     * check the array key and return the value 
     * 
     * @param array $array
     */
    function get_array_value($array, $key)
    {
        if (is_array($array) && array_key_exists($key, $array)) {
            return $array[$key];
        }
    }
}


if (!function_exists('strTrim')) {
    /**
     * STR Trim 
     * 
     * Trim String 
     * 
     * @param string $str
     * @return string 
     */
    function strTrim($str)
    {
        if (!empty($str)) {
            return trim($str);
        }
    }
}

if (!function_exists('strReplace')) {
    /**
     * STR Replace 
     * 
     * Replace some string with new String. 
     * 
     * @param string $search
     * @param string $replace
     * @param string $str
     * @return string 
     */
    function strReplace($search, $replace, $str)
    {
        if (!empty($str)) {
            return str_replace($search, $replace, $str);
        }
    }
}

if (!function_exists('cleanSlug')) {
    /**
     * Clean Slug 
     * 
     * Decodes URL-encoded string.
     * strip_tags || urldecode || 
     * removeSpecialCharacters
     * 
     * @param string $slug
     * @return string 
     */
    function cleanSlug($slug)
    {
        $slug = strTrim($slug);
        if (!empty($slug)) {
            $slug = urldecode($slug);
        }
        if (!empty($slug)) {
            $slug = strip_tags($slug);
        }
        return removeSpecialCharacters($slug);
    }
}

if (!function_exists('cleanStr')) {
    /**
     * Clean String 
     * 
     * Clean remove special character string.
     * 
     * @param string $str
     * @return string 
     */
    function cleanStr($str)
    {
        $str = strTrim($str);
        $str = removeSpecialCharacters($str);
        return esc($str);
    }
}

if (!function_exists('cleanNumber')) {
    /**
     * Clean Number 
     * 
     * Remove string on number.
     * 
     * @param string|int $num
     * @return int 
     */
    function cleanNumber($num)
    {
        $num = strTrim($num);
        $num = esc($num);
        if (empty($num)) {
            return 0;
        }
        return intval($num);
    }
}

if (!function_exists('clrQuotes')) {
    /**
     * Clean Quotes 
     * 
     * Remove Quote String.
     * 
     * @param string $str
     * @return string 
     */
    function clrQuotes($str)
    {
        $str = strReplace('"', '', $str);
        $str = strReplace("'", '', $str);
        return $str;
    }
}

if (!function_exists('removeForbiddenCharacters')) {
    /**
     * Remove Forbidden Characters 
     * 
     * Clean forbidden Charater on string.
     * used this for santiaze string on database.
     * 
     * @param string $str
     * @return string 
     */
    function removeForbiddenCharacters($str)
    {
        $str = strTrim($str);
        $str = strReplace(';', '', $str);
        $str = strReplace('"', '', $str);
        $str = strReplace('$', '', $str);
        $str = strReplace('%', '', $str);
        $str = strReplace('*', '', $str);
        $str = strReplace('/', '', $str);
        $str = strReplace('\'', '', $str);
        $str = strReplace('<', '', $str);
        $str = strReplace('>', '', $str);
        $str = strReplace('=', '', $str);
        $str = strReplace('?', '', $str);
        $str = strReplace('[', '', $str);
        $str = strReplace(']', '', $str);
        $str = strReplace('\\', '', $str);
        $str = strReplace('^', '', $str);
        $str = strReplace('`', '', $str);
        $str = strReplace('{', '', $str);
        $str = strReplace('}', '', $str);
        $str = strReplace('|', '', $str);
        $str = strReplace('~', '', $str);
        $str = strReplace('+', '', $str);
        return $str;
    }
}

if (!function_exists('removeSpecialCharacters')) {
    /**
     * Remove Special Characters 
     * 
     * Clean Special Charater on string.
     * used this for santiaze string on database.
     * 
     * @param string $str
     * @return string 
     */
    function removeSpecialCharacters($str, $removeQuotes = false)
    {
        $str = removeForbiddenCharacters($str);
        $str = strReplace('#', '', $str);
        $str = strReplace('!', '', $str);
        $str = strReplace('(', '', $str);
        $str = strReplace(')', '', $str);
        if ($removeQuotes) {
            $str = clrQuotes($str);
        }
        return $str;
    }
}

if (!function_exists('createCustomKeyboard')) {
    function createCustomKeyboard(array $keyboard_array, $row = 2, $backButton = false, $backCommand = '', $backAction = '')
    {
        $keyboard_buttons = [];
        foreach ($keyboard_array as $keybutton) {
            if (isset($keybutton['url'])) {
                $keyboard_buttons[] = [
                    'text' => $keybutton['text'],
                    'url' => $keybutton['url']
                ];
            } elseif (isset($keybutton['callback_data'])) {
                $keyboard_buttons[] = [
                    'text' => $keybutton['text'],
                    'callback_data' => $keybutton['callback_data']
                ];
            } elseif (isset($keybutton['web_app'])) {
                $keyboard_buttons[] = [
                    'text' => $keybutton['text'],
                    'web_app' =>  new \Reactmore\TelegramBotSdk\Entities\WebAppInfo(['url' => $keybutton['web_app']])
                ];
            }
        }

        // Chunk the keyboard into rows
        $chunked_keyboard_array = array_chunk($keyboard_buttons, $row);

        // Add a back button if requested
        if ($backButton) {
            $back_button = [
                'text' => lang("Back"),
                'callback_data' => "c={$backCommand}&a={$backAction}"
            ];
            $chunked_keyboard_array[] = [$back_button];
        }

        // Create the keyboard entity
        $keyboard = new \Reactmore\TelegramBotSdk\Entities\InlineKeyboard(...$chunked_keyboard_array);
        $keyboard->setResizeKeyboard(true);

        return $keyboard;
    }
}

if (!function_exists('createKeyboard')) {
    function createKeyboard(array $keyboard_array, $row = 2)
    {
        $keyboard_buttons = [];
        foreach ($keyboard_array as $keybutton) {
            $keyboard_buttons[] = [
                'text' => $keybutton
            ];
        }

        $chunked_keyboard_array = array_chunk($keyboard_buttons, $row);
        $keyboard = new \Reactmore\TelegramBotSdk\Entities\Keyboard(...$chunked_keyboard_array);
        $keyboard->setResizeKeyboard(true);
        $keyboard->setOneTimeKeyboard(true);
        $keyboard->setSelective(true);

        return $keyboard;
    }
}