<?php
/*
# Author Felixander Loetama
# Professional Email: floetama@gmail.com
# Coding Challenge - Count Chains

## Task

- Count the number of horizontal and vertical chains in a square grid modelling a Bejeweled board.
- A chain consists of 3 or more consecutive items that are the same. The digits 0-9 are used to represent items.
- Your solution will be tested as follows:

  ```
  // Result should be 4 for this board
  $board = [
      [0,3,3,3],
      [0,0,0,2],
      [0,1,4,2],
      [0,9,8,2],
  ];
  $result = $countChains($board);
  ```
- Restrictions:
  + Only `while` loops are allowed.
  + Only one-dimensional arrays are allowed, except for the argument.
  + No using of in-built array functions except for `count()`.

*/
$board = [
      [0,3,3,2,1,2,1],
      [0,0,0,2,1,1,1],
      [0,1,4,2,1,1,1],
      [3,9,8,2,1,1,2],
      [3,3,3,3,2,3,2],
 ];

$result = countChains($board);
echo $result;

function countChains($data = "") {
    $horizontal = countHorizontal($data);
    $vertical = countVertical($data);
    if($vertical >= $horizontal) return $vertical;
    else return $horizontal;
}

function countVertical($data = "") {
    if(empty($data)) return 0;
    else {
        $j = 0;
        $no_occurrence = array();
        while($j < count($data[0])) {
            $i = 0;
            $tempData = array(); 
            $totalArray = array();
            while($i < count($data)) {
                $tempData[] = $data[$i][$j];
                $totalArray[] = getTotal($tempData);
                $i++;
            }
            $total_occurrence[] = max($totalArray);
            $j++;
        }
        return max($total_occurrence);
    }
}

function countHorizontal($data = "") {
    if(empty($data)) return 0;
    else {
        $i = 0;
        $total_occurrence = array();
        while($i < count($data)) {
            $j = 0;
            $tempData = array(); 
            $totalArray = array();
            while($j < count($data[$i])) {
                $tempData[] = $data[$i][$j];
                $totalArray[] = getTotal($tempData);
                $j++;
            }
            $total_occurrence[] = max($totalArray);
            $i++;
        }
        return max($total_occurrence);
    }
} 

function getTotal($data = "") {
    $i = 0;
    $unique = array();
    $counter = 0;
    while($i < count($data)) {
        $unique[$data[$i]] = 1;
        if(count($unique) > 1) {
            if(isset($data[$i-1])) unset($unique[$data[$i-1]]);
            $counter = 1;
        } else {
            $counter++;
        }
        $i++;
    }
    return $counter;
}

?>