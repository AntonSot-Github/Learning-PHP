<?php

   if(file_exists(__DIR__ . "/functions.php")){
      require_once __DIR__ . "/functions.php";
   } else {
      echo "Error \n";
   }

   if(file_exists(__DIR__ . "/../db/db.php")){
      require_once __DIR__ . "/../db/db.php";  
   } else {
      echo "error \n";
   }

   $input = file_get_contents('php://input');
   //file_put_contents("debug.txt", $input); // Сохраняем для отладки

   $data = json_decode($input, true);
   $timeStart = date('H : i : s',$data['time_Start']);
   $timeEnd = date('H : i : s',$data['time_End']);
   $lesDur = intval(($data['time_End'] - $data['time_Start']) / 60);
   $lesFactDur = $data['lesson_Duration'];


  /*  print_r($data);
   var_dump($timeStart);
   var_dump($timeEnd);
   var_dump($lesDur);
   var_dump($curDate); */

   if($data && isset($data['time_Start'], $data['time_End'], $data['lesson_Duration'])){
      $sqlIns = "INSERT INTO lesson_time (date, time_start, time_end, learning_time, les_duration) VALUES (?, ?, ?, ?, ?)";
      $stmt = $db->prepare($sqlIns);
      try {
            $stmt->execute([
               $curDate,
               $timeStart,
               $timeEnd,
               $lesDur,
               $lesFactDur
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo 'DB error';
        }
      }
      
?>