parse_tweet
===========

This package adds a single function called `parse_tweet` to your project. It does one thing. Parses tweets.

This function can parse @mentions, #hashtags, and URLs. All links are given `target="_blank"` and a title when appropriate.

## Installation

Put a file named composer.json at the root of your project, containing your project dependencies:

```json
{
    "require": {
        "james2doyle/parsetweet": ">=1.0"
    }
}
```

Or use `composer require james2doyle/parsetweet`

## Examples

Here are some example outputs:

```
"This is a simple link https://google.com" == "This is a simple link <a href="https://google.com" target="_blank">https://google.com</a>"

"This is a simple mention for @james2doyle" == "This is a simple mention for <a title="@james2doyle" href="http://twitter.com/james2doyle" target="_blank">@james2doyle</a>"

"This is a simple #hashtag" == "This is a simple <a title="#hashtag" href="https://twitter.com/search?q=%23hashtag&src=hash" target="_blank">#hashtag</a>"

"This #weather is crazy! @weatherchannel" == "This <a title="#weather" href="https://twitter.com/search?q=%23weather&src=hash" target="_blank">#weather</a> is crazy! <a title="@weatherchannel" href="http://twitter.com/weatherchannel" target="_blank">@weatherchannel</a>"

"@james2doyle you need to visit https://warpaintmedia.ca because it is #cool!" == "<a title="@james2doyle" href="http://twitter.com/james2doyle" target="_blank">@james2doyle</a> you need to visit <a href="https://warpaintmedia.ca" target="_blank">https://warpaintmedia.ca</a> because it is <a title="#cool" href="https://twitter.com/search?q=%23cool&src=hash" target="_blank">#cool</a>!"
```

## Running tests

Go to the project root and run `phpunit`.

## License

**The MIT License**

Copyright (c) 2014 [James Doyle](http://twitter.com/james2doyle) james2doyle@gmail.com

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.