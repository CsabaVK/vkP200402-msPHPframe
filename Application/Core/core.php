<?php
  
    /**
     * Az URL szétszedése. Első körben megtisztítjuk a ?-jel utáni
     * query_string-től.
     */
    $uriPart = explode('?', $_SERVER['REQUEST_URI'])[0]; 

    /**
     * Második körben az APPROOT értékét kivágjuk az URL-ből.
     */
    $cleanedUri = str_replace(APPROOT, '', $uriPart);

    /**     
     * A $stepBack változó, ha a tisztított url üres string,
     * vagyis a tratalmazó mappa végén nem szerepel /-jel, akkor
     * értékül kapja az APPROOT konstanst egy / jellel megtoldva.
     * Ez ahhoz kell, hogy a css letöltés ne egy mappával a projektmappa 
     * fölött keresse az APPPATH mappát.
     */ 
    $stepBack = $cleanedUri == '' ? APPROOT.'/' : '';

    /** 
     * Aktuális gyökérmappa visszakeresése és a visszalépés (STEPBACK) 
     * konstans definiálása. A példában a böngésző a /jhhj/Application/Style/style.css-t
     * keresné, mert az url-ben a /jhhj/ az aktuális mappa, amihez hozzáfűzi 
     * a kapott path. Ezért nekünk ki kell számolni, hogy hány mappával feljebb található
     * az Application mappa, hogy a kérés helyes útvonalra mutasson. Mivel az explode függvény
     * a /jhhj/ stringet a / jelek mentén három részre osztja, de nekünk innen csak egyel kell
     * visszalápnünk, ezért:
     * Pl.: /jhhj/ 
     *      0 => string '' (length=0)
     *      1 => string 'jhhj' (length=4)
     *      2 => string '' (length=0)
     * 
     * ...a ciklusnak 2-től kell indulnia
     */       
    for($i = 2; $i< count(explode('/', $cleanedUri)); $i++)
    {
        $stepBack .= '../';
    }
    define('STEPBACK', $stepBack);
    /**
     * A $routes tömb tartalmazza majd az egyes útvonalakhoz tartozó
     * controllereket.
     */
    $routes = [];
  
    /**
     * Az addRout függvény végzi a regisztrációt.
     * Ezen a ponton vesszük fel az egyes controllereket a kapott útvonalakhoz.
     */
    addRoute('/?', 'homeController');      
    addRoute('/about/?', 'aboutController');

    
    addRoute('/allBus/?', 'allBusController');   
    

    /**
     * A routing függvény végzi a kikeresést és a controller függvény meghívását.
     */
    routing($cleanedUri);