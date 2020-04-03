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

    $testes = getTestes($pdo, $id);
    // var_dump($matches); die;
    
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

function modifyBusController($datas)
{
    $bus = $_POST;

    $config = getConfig(CONFPATH);
    $pdo    = getConnection($config);

    if (!$pdo) 
    {
        view([
            "title"     => "- Hiba",
            'view'      => '_error'
        ]);
    }

    $result = modifyBus($pdo, $bus)

    if (!$result) 
    {
        view([
            "title"     => "- Sikertelen módosítás",
            'view'      => 'unsuccessfullModify'
        ]);

        header('refresh: 2; url=/modifyBusForm');
    }
    else
    {
        view([
            "title"     => "- Sikertelen módosítás",
            'view'      => 'unsuccessfullModify'
        ]);
        header('refresh: 2; url=/allBus')
    }


    header('refresh: 2; url='.APPROOT.'/allBusz');
}


function modifyBusFormController($datas)
{
    $id = $datas['id'];

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
    
    $bus = getBusById($pdo, $id);
    // var_dump($bus);

    
    if (!$bus)
    {
        view([
            "title"     => "- Hiba",
            'view'      => '_error'
        ]);
    }

    extract($bus);

    
    view([
        "title"     => "- Buszjárat módosítása",
        'view'      => 'modifyBusForm',
        'id'        => $id,
        'indulas'   => $indulas,
        'cel'       => $cel,
        'menetido'  => $menetido,
        'alacsony'  => $alacsony
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
