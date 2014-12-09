<?php

CroogoNav::add('sidebar', 'event', array(
    'icon' => 'tags',
    'title' => __d('croogo', 'Events'),
    'url' => array(
        'admin' => true,
        'plugin' => 'adpageoptions',
        'controller' => 'adpageoptions',
        'action' => 'index',
    ),
    'weight' => 30,
    'children' => array(
        'categories' => array(
            'title' => __d('croogo', 'Categories'),
            'url' => array(
                'admin' => true,
                'plugin' => 'categories',
                'controller' => 'categories',
                'action' => 'index',
            ),
        ),
        'events' => array(
            'title' => __d('croogo', 'Events'),
            'url' => array(
                'admin' => true,
                'plugin' => 'events',
                'controller' => 'events',
                'action' => 'index',
            ),
        ),
        'featuredarticles' => array(
            'title' => __d('croogo', 'Featuredarticles'),
            'url' => array(
                'admin' => true,
                'plugin' => 'featuredarticles',
                'controller' => 'featuredarticles',
                'action' => 'index',
            ),
        ),
        'networkevents' => array(
            'title' => __d('croogo', 'Networkevents'),
            'url' => array(
                'admin' => true,
                'plugin' => 'networkevents',
                'controller' => 'networkevents',
                'action' => 'index',
            ),
        ),
        'networkorgs' => array(
            'title' => __d('croogo', 'NetworkOrgs'),
            'url' => array(
                'admin' => true,
                'plugin' => 'networkorgs',
                'controller' => 'networkorgs',
                'action' => 'index',
            ),
        ),
    ),
));


CroogoNav::add('sidebar', 'advert', array(
    'icon' => 'magnet',
    'title' => __d('croogo', 'Advert'),
    'url' => array(
        'admin' => true,
        'plugin' => 'adpageoptions',
        'controller' => 'adpageoptions',
        'action' => 'index',
    ),
    'weight' => 30,
    'children' => array(
        'adpageoptions' => array(
            'title' => __d('croogo', 'Adpageoptions'),
            'url' => array(
                'admin' => true,
                'plugin' => 'adpageoptions',
                'controller' => 'adpageoptions',
                'action' => 'index',
            ),
        ),
        'adpositions' => array(
            'title' => __d('croogo', 'Adpositions'),
            'url' => array(
                'admin' => true,
                'plugin' => 'adpositions',
                'controller' => 'adpositions',
                'action' => 'index',
            ),
        ),
        'adtrackers' => array(
            'title' => __d('croogo', 'Adtrackers'),
            'url' => array(
                'admin' => true,
                'plugin' => 'adtrackers',
                'controller' => 'adtrackers',
                'action' => 'index',
            ),
        ),
        'adtypes' => array(
            'title' => __d('croogo', 'Adtypes'),
            'url' => array(
                'admin' => true,
                'plugin' => 'adtypes',
                'controller' => 'adtypes',
                'action' => 'index',
            ),
        ),
        'advertisements' => array(
            'title' => __d('croogo', 'Advertisements'),
            'url' => array(
                'admin' => true,
                'plugin' => 'advertisements',
                'controller' => 'advertisements',
                'action' => 'index',
            ),
        ),
        'advertstatuses' => array(
            'title' => __d('croogo', 'Advertstatuses'),
            'url' => array(
                'admin' => true,
                'plugin' => 'advertstatuses',
                'controller' => 'advertstatuses',
                'action' => 'index',
            ),
        ),
        'adverttariff' => array(
            'title' => __d('croogo', 'Adverttariff'),
            'url' => array(
                'admin' => true,
                'plugin' => 'adverttariff',
                'controller' => 'adverttariff',
                'action' => 'index',
            ),
        )
    ),
));

CroogoNav::add('sidebar', 'company', array(
    'icon' => 'bookmark',
    'title' => __d('croogo', 'Companies'),
    'url' => array(
        'admin' => true,
        'plugin' => 'adpageoptions',
        'controller' => 'adpageoptions',
        'action' => 'index',
    ),
    'weight' => 30,
    'children' => array(
        'companiesfeatured' => array(
            'title' => __d('croogo', 'Companiesfeatured'),
            'url' => array(
                'admin' => true,
                'plugin' => 'companiesfeatured',
                'controller' => 'companiesfeatured',
                'action' => 'index',
            ),
        ),
        'companyentries' => array(
            'title' => __d('croogo', 'Companyentries'),
            'url' => array(
                'admin' => true,
                'plugin' => 'companyentries',
                'controller' => 'companyentries',
                'action' => 'index',
            ),
        ),
        'companyprofile' => array(
            'title' => __d('croogo', 'Companyprofile'),
            'url' => array(
                'admin' => true,
                'plugin' => 'companyprofile',
                'controller' => 'companyprofile',
                'action' => 'index',
            ),
        ),
    ),
));

CroogoNav::add('sidebar', 'transactions', array(
    'icon' => 'list-alt',
    'title' => __d('croogo', 'Transactions'),
    'url' => array(
        'admin' => true,
        'plugin' => 'adpageoptions',
        'controller' => 'adpageoptions',
        'action' => 'index',
    ),
    'weight' => 30,
    'children' => array(
        'transactions' => array(
            'title' => __d('croogo', 'Transactions'),
            'url' => array(
                'admin' => true,
                'plugin' => 'transactions',
                'controller' => 'transactions',
                'action' => 'index',
            ),
        ),
        'transactiontypes' => array(
            'title' => __d('croogo', 'TransactionTypes'),
            'url' => array(
                'admin' => true,
                'plugin' => 'transactiontypes',
                'controller' => 'transactiontypes',
                'action' => 'index',
            ),
        ),
    ),
));
