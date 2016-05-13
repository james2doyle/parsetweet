<?php

if (! function_exists('parse_tweet')) {

    /**
     * Parse the a Twitter tweet.text string
     *
     * @param string $text
     *
     * @return string|array
     */
    function parse_tweet($text)
    {
        // links
        $text = preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $text);
        // mentions
        $text = preg_replace('/(?<=^|\s)@([\w.]+)(?<!\.)/', '<a title="@$1" href="http://twitter.com/$1" target="_blank">@$1</a>', $text);
        // hashtags
        $text = preg_replace('/\s+#(\w+)/', ' <a title="#$1" href="https://twitter.com/search?q=%23$1&src=hash" target="_blank">#$1</a>', $text);

        return $text;
    }
}
