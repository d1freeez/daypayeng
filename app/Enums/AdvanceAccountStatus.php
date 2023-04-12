<?php

namespace App\Enums;

enum AdvanceAccountStatus: string
{
    case CREATED = 'Создан';
    case ON_MODERATE = 'На проверке';
    case ON_ACCEPT = 'Вы получили?';
    case ACCEPTED = 'Подтверждено';
    case COMPANY_REJECT = 'Отклонено работодателем';
}
