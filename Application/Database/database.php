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