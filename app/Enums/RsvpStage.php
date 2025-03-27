<?php

namespace App\Enums;

enum RsvpStage: string
{
    case FORM = 'form';
    case CONFIRM = 'confirm';
    case OVERVIEW = 'overview';
}
