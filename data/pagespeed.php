<?php
$reportList = Array
(
    'http://www.seopanel.in' => Array
        (
            'desktop' => Array
                (
                    'speed_score' => 82
                    ,'usability_score' => 0
                    ,'details' => Array
                        (
                            'AvoidLandingPageRedirects' => Array
                                (
                                    'localizedRuleName' => "Avoid landing page redirects"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => 'Your page has no redirects. Learn more about <a href="https://developers.google.com/speed/docs/insights/AvoidRedirects">avoiding landing page redirects</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                            ,'EnableGzipCompression' => Array
                                (
                                    'localizedRuleName' => "Enable compression"
                                    ,'ruleImpact' => 9.7953
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => "Compressing 
resources with gzip or deflate can reduce the number of bytes sent over 
the network."
                                    ,'urlBlocks' => Array
                                        (
                                            '0' => Array
                                                (
                                                    'header' => '<a href="https://developers.google.com/speed/docs/insights/EnableCompression">Enable compression</a>
 for the following resources to reduce their transfer size by 95.7KiB 
(66% reduction).'
                                                    ,'urls' => Array
                                                        (
                                                            '0' => 
"Compressing http://www.seopanel.in/js/jquery.min.js?v1.2 could save 
58.4KiB (64% reduction)."
                                                            ,'1' => 
"Compressing http://www.seopanel.in/js/bootstrap.min.js?v1.2 could save 
22.7KiB (73% reduction)."
                                                            ,'2' => 
"Compressing http://www.seopanel.in/js/jquery.magnific-popup-min.js?v1.2 
could save 12.3KiB (63% reduction)."
                                                            ,'3' => 
"Compressing http://www.seopanel.in/js/common.js?v1.2 could save 2.2KiB 
(71% reduction)."
                                                        )

                                                )

                                        )

                                )

                            ,'LeverageBrowserCaching' => Array
                                (
                                    'localizedRuleName' => "Leverage 
browser caching"
                                    ,'ruleImpact' => 0.41666666666667
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => "Setting an expiry 
date or a maximum age in the HTTP headers for static resources instructs
 the browser to load previously downloaded resources from local disk 
rather than over the network."
                                    ,'urlBlocks' => Array
                                        (
                                            '0' => Array
                                                (
                                                    'header' => '<a href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">Leverage browser caching</a> for the following cacheable resources:'
                                                    ,'urls' => Array
                                                        (
                                                            '0' => "http://www.google-analytics.com/analytics.js (2 hours)"
                                                        )

                                                )

                                        )

                                )

                            ,'MainResourceServerResponseTime' => Array
                                (
                                    'localizedRuleName' => "Reduce server response time"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => 'Your server responded quickly. Learn more about <a href="https://developers.google.com/speed/docs/insights/Server">server response time optimization</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )
                            ,'OptimizeImages' => Array
                                (
                                    'localizedRuleName' => "Optimize images"
                                    ,'ruleImpact' => 1.782
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => "Properly formatting and compressing images can save many bytes of data."
                                    ,'urlBlocks' => Array
                                        (
                                            '0' => Array
                                                (
                                                    'header' => '<a href="https://developers.google.com/speed/docs/insights/OptimizeImages">Optimize the following images</a>
 to reduce their size by 14.6KiB (33% reduction).'
                                                    ,'urls' => Array
                                                        (
                                                            '0' => 
"Compressing http://www.seopanel.in/images/seo_ad.jpg could save 10.4KiB 
(34% reduction)."
                                                            ,'1' => 
"Compressing http://www.seopanel.in/images/logo_red_sm.png could save 
2.7KiB (65% reduction)."
                                                            ,'2' => 
"Compressing http://www.seopanel.in/images/subs.jpg could save 767B (20% 
reduction)."
                                                            ,'3' => 
"Compressing http://www.seopanel.in/images/inst.jpg could save 763B (12% 
reduction)."
                                                        )

                                                )

                                        )

                                )

                            ,'PrioritizeVisibleContent' => Array
                                (
                                    'localizedRuleName' => "Prioritize
 visible content"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => 'You have the 
above-the-fold content properly prioritized. Learn more about <a href="https://developers.google.com/speed/docs/insights/PrioritizeVisibleContent">prioritizing visible content</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                        )

                )

            ,'mobile' => Array
                (
                    'speed_score' => 69
                    ,'usability_score' => 100
                    ,'details' => Array
                        (
                            'AvoidLandingPageRedirects' => Array
                                (
                                    'localizedRuleName' => "Avoid landing page redirects"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => 'Your page has no redirects. Learn more about <a href="https://developers.google.com/speed/docs/insights/AvoidRedirects">avoiding landing page redirects</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                            ,'AvoidPlugins' => Array
                                (
                                    'localizedRuleName' => "Avoid 
plugins"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "USABILITY"
                                    ,'summary' => 'Your page does not 
appear to use plugins, which would prevent content from being usable on 
many platforms. Learn more about the importance of <a href="https://developers.google.com/speed/docs/insights/AvoidPlugins">avoiding plugins</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                            ,'ConfigureViewport' => Array
                                (
                                    'localizedRuleName' => "Configure 
the viewport"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "USABILITY"
                                    ,'summary' => 'Your page specifies a
 viewport matching the device\'s size, which allows it to render properly
 on all devices. Learn more about <a href="https://developers.google.com/speed/docs/insights/ConfigureViewport">configuring viewports</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                            ,'EnableGzipCompression' => Array
                                (
                                    'localizedRuleName' => "Enable 
compression"
                                    ,'ruleImpact' => 9.7953
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => "Compressing 
resources with gzip or deflate can reduce the number of bytes sent over 
the network."
                                    ,'urlBlocks' => Array
                                        (
                                            '0' => Array
                                                (
                                                    'header' => '<a href="https://developers.google.com/speed/docs/insights/EnableCompression">Enable compression</a>
 for the following resources to reduce their transfer size by 95.7KiB 
(66% reduction).'
                                                    ,'urls' => Array
                                                        (
                                                            '0' => 
"Compressing http://www.seopanel.in/js/jquery.min.js?v1.2 could save 
58.4KiB (64% reduction)."
                                                            ,'1' => 
"Compressing http://www.seopanel.in/js/bootstrap.min.js?v1.2 could save 
22.7KiB (73% reduction)."
                                                            ,'2' => 
"Compressing http://www.seopanel.in/js/jquery.magnific-popup-min.js?v1.2 
could save 12.3KiB (63% reduction)."
                                                            ,'3' => 
"Compressing http://www.seopanel.in/js/common.js?v1.2 could save 2.2KiB 
(71% reduction)."
                                                        )

                                                )

                                        )

                                )

                            ,'LeverageBrowserCaching' => Array
                                (
                                    'localizedRuleName' => "Leverage 
browser caching"
                                    ,'ruleImpact' => 0.625
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => "Setting an expiry 
date or a maximum age in the HTTP headers for static resources instructs
 the browser to load previously downloaded resources from local disk 
rather than over the network."
                                    ,'urlBlocks' => Array
                                        (
                                            '0' => Array
                                                (
                                                    'header' => '<a href="https://developers.google.com/speed/docs/insights/LeverageBrowserCaching">Leverage browser caching</a> for the following cacheable resources:'
                                                    ,'urls' => Array
                                                        (
                                                            '0' => "http://www.google-analytics.com/analytics.js (2 hours)"
                                                        )

                                                )

                                        )

                                )

                            ,'MainResourceServerResponseTime' => Array
                                (
                                    'localizedRuleName' => "Reduce server response time"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => 'Your server responded quickly. Learn more about <a href="https://developers.google.com/speed/docs/insights/Server">server response time optimization</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                            ,'MinifyCss' => Array
                                (
                                    'localizedRuleName' => "Minify CSS"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => 'Your CSS is minified. Learn more about <a href="https://developers.google.com/speed/docs/insights/MinifyResources">minifying CSS</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                            ,'MinifyHTML' => Array
                                (
                                    'localizedRuleName' => "Minify HTML"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => "SPEED"
                                    ,'summary' => 'Your HTML is minified. Learn more about <a href="https://developers.google.com/speed/docs/insights/MinifyResources">minifying HTML</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )                            

                            ,'UseLegibleFontSizes' => Array
                                (
                                    'localizedRuleName' => "Use legible font sizes"
                                    ,'ruleImpact' => 0
                                    ,'impactGroup' => USABILITY
                                    ,'summary' => 'The text on your page is legible. Learn more about <a href="https://developers.google.com/speed/docs/insights/UseLegibleFontSizes">using legible font sizes</a>.'
                                    ,'urlBlocks' => Array
                                        (
                                        )

                                )

                        )

                )

        )

);
?>