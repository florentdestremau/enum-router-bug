<?php

namespace App\Model;

enum PostEnum: string
{
    case BLOG = 'blog';
    case VLOG = 'vlog';
    case OTHER = 'other';
}
