<?php

namespace App\Enums;

enum OcidStatus: string
{
    case Active = "active";
    case Offline = "offline";
    case Invalid = "invalid";
}