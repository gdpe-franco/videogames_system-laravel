<?php

//Función que checa si estamos en la ruta y asigna active
function setActive($routeName) 
{
    return request()->routeIs($routeName) ? 'active' : '';
}