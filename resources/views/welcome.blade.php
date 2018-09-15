<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}" >
        <script>window.laravel = { csrftoken: '{{csrf_token()}}' }</script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
                <!--[if lte IE 9]>
        <div class="update_browser_fake_body">
            <div class="update_browser_container">
                <div class="update_browser">
                    <div class="update_browser_inner">
                        <h1>Please update your browser!</h1>
                        <p>You are using old browser version, which is not technically supported. That way some functions maybe are not available or aren't working right. Using information below please update or use another browser. </p>
                        <p>Free browsers - all browsers provide the same base functions and are easy to use. Choose which browser do you want to download:</p>
                        <div class="browser_icon_wrap" class="clear">
                            <a href="http://www.mozilla.org/en-US/firefox/new/" class="firefox" class="browser_link">
                                <span class="browser_icon">&nbsp;</span>
                                <span class="browser_name">Mozilla Firefox</span>
                            </a>
                            <a href="https://www.google.com/intl/en/chrome/browser/" class="chrome" class="browser_link">
                                <span class="browser_icon">&nbsp;</span>
                                <span class="browser_name">Google Chrome</span>
                            </a>
                            <a href="http://www.opera.com/" class="opera" class="browser_link">
                                <span class="browser_icon">&nbsp;</span>
                                <span class="browser_name">Opera</span>
                            </a>
                            <a href="https://safari.en.softonic.com/" class="safari" class="browser_link">
                                <span class="browser_icon">&nbsp;</span>
                                <span class="browser_name">Safari</span>
                            </a>
                            <a href="https://www.microsoft.com/en-us/windows/microsoft-edge" class="edge" class="browser_link">
                                <span class="browser_icon">&nbsp;</span>
                                <span class="browser_name">Microsoft Edge</span>
                            </a>
                        </div>
                        <div class="close_announcement_wrap">
                            <a href="javascript:void(0)" class="close_announcement">Aizvērt</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <![endif]-->
        <div id="app"></div>
        <script src="{{mix('js/app.js')}}" ></script>
    </body>
</html>
