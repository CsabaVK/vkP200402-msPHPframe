<?php

function getConnection($config)
{
  extract($config);

  try
  {
    //code...
    return new PDO
    (
      "mysql:host={$hostName};dbname={$database};charset=utf8",
      $userName,
      $password 
    );
    }

    catch (PDOException $e) 
    {
      //throw $th;
      error_log("[".date('Y-m-d H:i:s')."]".$e->getMessage().PHP_EOL, 3, APPPATH.'Log/dberror.log');
      return false;
    }

}


function modifyBus( PDO $pdo, $bus)
{
  $smt = $pdo->prepare('UPDATE busz SET
                      indulas     = :indulas,
                      cel         = :cel,
                      menetido    = :menetido,
                      alacsony    = :alacsony
                      WHERE id    = :buszId');

  $smt->bindParam(':indulas',     $indulas);
  $smt->bindParam(':cel',         $cel);
  $smt->bindParam(':menetido',    $menetido);
  $smt->bindParam(':alacsony',    $alacsony);
  $smt->bindParam(':id',          $id);

  try
  {
    if( !$smt->execute() )
    {
      throw new RuntimeException( $smt->errorInfo()[2] );
    }

    return true;

  }
  catch (RuntimeException $e)
  {
    error_log("[".date('Y-m-d H:i:s')."]".$e->getMessage().PHP_EOL, 3, APPPATH.'Log/dberror.log');

    return false;
  }
}




function getBusById(PDO $pdo, $buszId)
{
  $smt = $pdo->prepare('SELECT * FROM busz WHERE id = :buszId');
  $smt->bindParam(':buszId', $buszId);

  try
  {
    if( !$smt->execute() )
    {
      throw new RuntimeException( $smt->errorInfo()[2] );
    }

    return $smt->fetch( PDO::FETCH_ASSOC);
  }
  catch (RuntimeException $e)
  {
    error_log("[".date('Y-m-d H:i:s')."]".$e->getMessage().PHP_EOL, 3, APPPATH.'Log/dberror.log');

    return [];
  }
}





function getTestes( PDO $pdo, $buszId )
{
  $smt = $pdo->prepare('SELECT * FROM szerviz WHERE buszId = :buszId');
  $smt->bindParam(':buszId', $buszId);

  try
  {
    if( !$smt->execute() )
    {
      throw new RuntimeException( $smt->errorInfo()[2] );
    }

    return $smt->fetchAll( PDO::FETCH_NUM );
  }
  catch (RuntimeException $e)
  {
    error_log("[".date('Y-m-d H:i:s')."]".$e->getMessage().PHP_EOL, 3, APPPATH.'Log/dberror.log');

    return [];
  }
}






function getAllBuses( PDO $pdo)
{
  $smt = $pdo->prepare('SELECT * FROM busz');

  try
  {
    if( !$smt->execute() )
    {
      throw new RuntimeException( $smt->errorInfo()[2] );
    }

    return $smt->fetchAll( PDO::FETCH_NUM );
  }
  catch (RuntimeException $e)
  {
    error_log("[".date('Y-m-d H:i:s')."]".$e->getMessage().PHP_EOL, 3, APPPATH.'Log/dberror.log');

    return [];
  }

}