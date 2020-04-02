<?php

function homeController($datas)
{
    view([
        "home"  => 'active',
        "title" => "- Home",
        'view'  => 'home'
    ]);
}

function allBusController($matches)
{
    $config = getConfig(CONFPATH);
    $pdo    = getConnection($config);

    if (!$pdo) 
    {
        view([
            "allBus"    => 'active',
            "title"     => "- Hiba",
            'view'      => '_error'
        ]);
    }

    view([
        "allBus"        => 'active',
        "title"         => "- Menetrendek",
        'view'          => 'allBus',
        'buses'         => getallBuses($pdo)
    ]);
}








function aboutController($datas)
{
    view([
        "about"  => 'active',
        "title" => "- About",
        'view'  => 'about'
    ]);
}


function notFoundController()
{
    view([        
        "title" => "- Page Not Found",
        'view' => '_404'
    ]);   
}
