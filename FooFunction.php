<?php
// cette fonction vise à regrouper les nombres appartenant aux intervalles dans le tableau donné pour fournir de nouveaux intervalles 
function foo($array) {
$first=[$array[0]];
array_shift($array);
foreach($array as $value)
{
          $test='false';
        
         foreach($first as $key=> $interval)
        {
             if ($value[0]<=$interval[0] && $value[1]>$interval[0])
                {
                     $first[$key][0]= $value[0];
                     $first[$key][1]=max($value[1],$first[$key][1]);
                     $test='true';
                }
               if ($value[0]<=$interval[1] && $value[1]>$interval[0])
                {
                     $first[$key][1]=max($value[1],$first[$key][1]);
                     $test='true';
                }
        
        }
             if($test=='false')
                {
                    if(!in_array($value,$first)){ array_push($first,$value);}
                }
} 


  usort($first, function ($first, $second)  {return $first[0] <=> $second[0];});
      print_r($first);

}
// Ce travail m'a pris presque 2 heures pour comprendre et coder.
$test= [[3, 6], [3, 4], [15, 20], [16, 17],[30,35], [1, 4], [6, 10], [3, 6]];
echo "Exemple : " , print_r($test) ,"<br> Result : ", foo($test);
