<?php

$host = $argv[1] ?? null;
if ($host) {
    $host = rtrim($host, '/');
}

$mode = $argv[2] ?? null;

$sitemaps = [];

if ($mode === 'robots') {
    $robotsUrl = $host . '/robots.txt';

    echo "load $robotsUrl\n";
    
    // load robots.txt
    $robots_file = file_get_contents($robotsUrl);
    
    $pattern = '/Sitemap: ([^\s]+)/';
    preg_match_all($pattern, $robots_file, $match);
    $sitemaps = $match[1];
} else {
    $sitemaps[] = $argv[1];
}

$urls = [];

foreach ($sitemaps as $sitemap) {
    $sitemaps = simplexml_load_file($sitemap);
    if (isset($sitemaps->sitemap)) {
        foreach ($sitemaps->sitemap as $sitemap) {
            echo "load " . $sitemap->loc . "\n";
            $sitemapData = simplexml_load_file((string) $sitemap->loc);

            foreach($sitemapData as $entry) {
                $urls[] = (string) $entry->loc;
            }
        }
    }
}

array_unique($urls);
sort($urls);

file_put_contents('urls.txt', implode("\n", $urls));