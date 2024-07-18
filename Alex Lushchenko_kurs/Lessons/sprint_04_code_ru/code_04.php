<?php

$role = 'moderat2or';

switch ($role) {
    case 'admin':
        echo "полный контроль", "\n";
        break;
    case 'moderator':
        echo "управление статьями и комментариями", "\n";
        break;
    case 'user':
        echo "писать комментарии к статьям", "\n";
        break;
    default:
        echo "роль не найдена", "\n";
}