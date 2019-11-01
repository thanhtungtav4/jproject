<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($pageLang as $lang)
        @foreach ($routeMatch as $page)
            @if (strpos($page[$lang], '{') === false)
                <url>
                    <loc>{!! url($page[$lang]) !!}</loc>
                    <changefreq>daily</changefreq>
                </url>
            @endif
        @endforeach
    @endforeach
</urlset>
