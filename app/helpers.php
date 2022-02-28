<?php

//Función que checa si estamos en la ruta y asigna active
function setActive($routeName) 
{
    return request()->routeIs($routeName) ? 'active' : '';
}

function calculateSalePrice($purchace_price) 
{
    $price = (double)$purchace_price;
    return (string) $price * 1.4;
}