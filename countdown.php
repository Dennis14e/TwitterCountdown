<?php
function twitterCountdown($to, $from = null)
{
  // array shifting
  $diff = ($from !== null) ? $to - $from : $to;

  $units = array(
    'years' => array(
      'sec'      => 31557600,
      'singular' => 'Jahr',
      'plural'   => 'Jahre'
    ),
    'months' => array(
      'sec'      => 2629800,
      'singular' => 'Monat',
      'plural'   => 'Monate'
    ),
    'weeks' => array(
      'sec'      => 604800,
      'singular' => 'Woche',
      'plural'   => 'Wochen'
    ),
    'days' => array(
      'sec'      => 86400,
      'singular' => 'Tag',
      'plural'   => 'Tage'
    ),
    'hours' => array(
      'sec'      => 3600,
      'singular' => 'Stunde',
      'plural'   => 'Stunden'
    ),
    'minutes' => array(
      'sec'      => 60,
      'singular' => 'Minute',
      'plural'   => 'Minuten'
    ),
    'seconds' => array(
      'sec'      => 1,
      'singular' => 'Sekunde',
      'plural'   => 'Sekunden'
    )
  );

  $addedUnits = array();

  foreach($units as $value)
  {
    $res = floor($diff / $value['sec']);
    $diff -= $res * $value['sec'];

    if($res == 0 && empty($arrayString))
    {
      continue;
    }

    $addedUnits[] = $res . ' ' . (($res == 1) ? $value['singular'] : $value['plural']);
  }

  $string = '';
  $unitsCount = count($addedUnits);

  foreach($addedUnits as $key => $value)
  {
    if($unitsCount < 2 || $key == ($unitsCount - 1))
    {
      $string .= $value . ' ';
      break;
    }

    $string .= $value . (($key == ($unitsCount - 2)) ? ' und ' : ', ');
  }

  return trim($string);
}
