<?php

namespace App\Enums;

enum UserType:string
{
    case ADMIN = 'Администратор';
    case DIRECTOR = 'Ген. Директор';
    case MANAGER = 'Менеджер';
    case EMPLOYEES = 'Работник';
    case SUPER_MANAGER = 'Супер-Менеджер';
}
