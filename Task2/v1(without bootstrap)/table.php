<?php
// dynamic table
// dynamic rows //4 
// dynamic columns // 4
// check if gender of user == m ==> male // 1
// check if gender of user == f ==> female // 1

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
      

    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
       

    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],

    ],
    

];
$table = "<Table style ='border-bottom: 1px solid black; width :50% ;text-align:center; margin:auto;margin-top:40px;'> ";
$table .= "<tr style ='border-bottom: 1px solid black;'>";
foreach($users[0] as $tablehead=> $user){ // for table header
    $table .="<th style ='border-bottom: 1px solid black; padding: 5px;'>{$tablehead}</th>";
}
// start body of table
foreach ($users as $user) {
    $table .= "<tr style='width:100% ; border: 1px solid black; ' >";


    foreach ($user as $property => $clientdata) {
        if (gettype($clientdata) == "object" || gettype($clientdata) == "array") { 
            $table .= "<td style ='border-bottom: 1px solid black;padding: 5px;'>";
            foreach ($clientdata as $pos => $data) {                
                if($pos == "gender"){
                    if($data =="m"){
                        $table .="male";
    
                    }else{
                        $table .="female";
                    }
                }else{
                $table .= $data ."<br>"; 
            }
        }
            $table .= " </td>";
        } else {
            $table .= "<td style ='border-bottom: 1px solid black;padding: 5px;'> {$clientdata} </td>";
        }
    }
   
}



$table .= "</tr>";

$table .= "</Table>";
echo $table;
