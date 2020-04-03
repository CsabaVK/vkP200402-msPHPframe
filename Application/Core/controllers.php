<?php

function homeController($datas)
{
    view([
        "home"  => 'active',
        "title" => "- Home",
        'view'  => 'home'
    ]);
}

// ---------------------------------

function testesController($matches)
{
    $id = $matches['id'];

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

    $testes = getTestes($pdo, $id)
    var_dump($matches); die;
    
    view([
        "title"         => "- Vizsgálatok",
        'view'          => 'testes',
        'testes'        => $testes,
        'numOfTestes'   => count($testes)
    ]);
}

// ----------------------------------------

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
