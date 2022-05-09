<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "N.Z Home Improvement & Renovations", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => '', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ["N.Z Home Improvement & Renovations","home","renovation","improvement","renovations","home improvements","home renovation","new york","bathroom remodeling","remodeling contractors","Connecticut","Fairfield","bathroom remodel","house remodeling","remodeling","contractors","bathroom renovation","home painting services","house repair contractor","house maintenance service","home repair contractors","bathroom remodel","home remodeling","kitchen makeovers","swimming pool contractors","landscape contractors","remodeling contractors","kitchen renovation","bathroom renovations","power home remodeling","home remodeling near me","renovating a house","remodeling home","home remodeling companies","home repair contractors near me","kitchen remodel new york","kitchen remodel connecticut","how to find a contractor for home addition","affordable home remodeling","home improvement contractors in connecticut","home renovations contractors","home remodeling connecticut","remodeling houses","home renovation services","connecticut kitchen remodeling contractors","home remodeling experts","home remodelers","home remodeler","home remodeling companies near me","home remodeling contractor","home remodel","home remodeling contractors near me","house renovation","house improvement","home repair contractors"],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'N.Z Home Improvement & Renovations', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'N.Z Home Improvement & Renovations', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
