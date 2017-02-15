<meta property="og:title" content="{{ $title or 'sdfsdfsdf' }}">
<meta property="og:image" content="{{ $image or 'default.png' }}">
<meta property="og:url" content="{{ isset($url) ? $url : str_replace('http://', 'https://', Request::url()) }}">