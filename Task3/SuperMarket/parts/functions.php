<?php function calculatedescount($price)
{
    if ($price < 1000 && $price > 0)
        return 0;
    elseif ($price < 3000 && $price >= 1000)
        return 10;
    elseif ($price < 4500 && $price >= 3000)
        return 15;
    elseif ($price > 4000)

        return 20;
}
function calculatedelivery($city)
{
    if ($city == 'giza')
        return 30;
    elseif ($city == 'alex')
        return 50;
    elseif ($city == 'others')
        return 200;
    else
        return 0;
}
function calculateProductPrice($products ,$quantite){
    foreach ($products as $producrname=>$product){
    }
}
// function calculateRecipe()
// {
//     foreach($products as $producrname=> $product){
//         if()
//     }
// }
function customerinfo ($customerinfo){
    $information=[];
    foreach($customerinfo as $key=> $customer){
        $information[$key]=$customer;
    }
    return $information;
}
function calculateSubTotal($prices,$quantite){
    $subTotal=[];
    foreach ($prices as $index=> $price){
        $subTotal=[$price*$quantite[$index]];
    }
    return $subTotal;

}