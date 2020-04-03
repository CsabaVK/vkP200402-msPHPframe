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



function newBusFormController()
{
    view([
        "title"     => "- Új buszjárat felvétele",
        'view'      => 'newBusForm'
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

    $result = modifyBus($pdo, $bus);

    if (!$result)
    {
        header('refresh: 2; url='.APPROOT.'/modifyBusForm');

        view([
            "title"     => "- Sikertelen módosítás",
            'view'      => 'unsuccessfullModify'
        ]);

    }
    else
    {
        header('refresh: 2; url='.APPROOT.'/allBus');

        view([
            "title"     => "- Sikertelen módosítás",
            'view'      => 'unsuccessfullModify'
        ]);
    }


    header('refresh: 2; url='.APPROOT.'/allBusz');
}

/*
HTTP Resonse

    status row
    header:value
    header:value
    header:value
    header:value

    content -> html
*/




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
