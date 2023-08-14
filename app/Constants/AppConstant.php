<?php

namespace App\Constants;

class AppConstant{

    const REQUIRED = [
        ['value' => 0, 'title' => 'No'],
        ['value' => 1, 'title' => 'Yes']
    ];
    const TYPE = ['Full Time', 'Part Time', 'Contract'];
    const APPLY_STATUS = ['Pending', 'Interview', 'Assisment', 'Final Interview', 'Selected'];
    const ACTIVE = 1;
}
