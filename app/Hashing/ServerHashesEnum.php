<?php

namespace App\Hashing;

enum ServerHashesEnum: string
{
    case PLAINTEXT = 'plaintext';
    case MD5 = 'md5';
}
