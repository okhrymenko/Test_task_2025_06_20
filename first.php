<?php

$data = [
    [
        'guest_id' => 177,
        'guest_type' => 'crew',
        'first_name' => 'Marco',
        'middle_name' => null,
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 20008683,
                'ship_code' => 'OST',
                'room_no' => 'A0073',
                'start_time' => 1438214400,
                'end_time' => 1483142400,
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 20009503,
                'status_id' => 2,
                'account_limit' => 0,
                'allow_charges' => true,
            ],
        ],
    ],
    [
        'guest_id' => 10000113,
        'guest_type' => 'crew',
        'first_name' => 'Bob Jr ',
        'middle_name' => 'Charles',
        'last_name' => 'Hemingway',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 10000013,
                'room_no' => 'B0092',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000522,
                'account_limit' => 300,
                'allow_charges' => true,
            ],
        ],
    ],
    [
        'guest_id' => 10000114,
        'guest_type' => 'crew',
        'first_name' => 'Al ',
        'middle_name' => 'Bert',
        'last_name' => 'Santiago',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 10000014,
                'room_no' => 'A0018',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000013,
                'account_limit' => 300,
                'allow_charges' => false,
            ],
        ],
    ],
    [
        'guest_id' => 10000115,
        'guest_type' => 'crew',
        'first_name' => 'Red ',
        'middle_name' => 'Ruby',
        'last_name' => 'Flowers ',
        'gender' => 'F',
        'guest_booking' => [
            [
                'booking_number' => 10000015,
                'room_no' => 'A0051',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000519,
                'account_limit' => 300,
                'allow_charges' => true,
            ],
        ],
    ],
    [
        'guest_id' => 10000116,
        'guest_type' => 'crew',
        'first_name' => 'Ismael ',
        'middle_name' => 'Jean-Vital',
        'last_name' => 'Jammes',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 10000016,
                'room_no' => 'A0023',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000015,
                'account_limit' => 300,
                'allow_charges' => true,
            ],
        ],
    ],
];

function printNested(array $data, int $level = 0): void
{
    $indent = str_repeat('  ', $level); // 2 spaces per level
    
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            echo "{$indent}{$key}:\n";
            printNested($value, $level + 1);
        } else {
            echo "{$indent}{$key}: {$value}\n";
        }
    }
}



foreach ($data as $index => $guest) {
    echo "Guest #{$index}:\n";
    printNested($guest);
    echo str_repeat('-', 40) . "\n";
}
/*
############################################## Console Output #########################################################
Guest #0:
guest_id: 177
guest_type: crew
first_name: Marco
middle_name: 
last_name: Burns
gender: M
guest_booking:
  0:
    booking_number: 20008683
    ship_code: OST
    room_no: A0073
    start_time: 1438214400
    end_time: 1483142400
    is_checked_in: 1
guest_account:
  0:
    account_id: 20009503
    status_id: 2
    account_limit: 0
    allow_charges: 1
----------------------------------------
Guest #1:
guest_id: 10000113
guest_type: crew
first_name: Bob Jr 
middle_name: Charles
last_name: Hemingway
gender: M
guest_booking:
  0:
    booking_number: 10000013
    room_no: B0092
    is_checked_in: 1
guest_account:
  0:
    account_id: 10000522
    account_limit: 300
    allow_charges: 1
----------------------------------------
Guest #2:
guest_id: 10000114
guest_type: crew
first_name: Al 
middle_name: Bert
last_name: Santiago
gender: M
guest_booking:
  0:
    booking_number: 10000014
    room_no: A0018
    is_checked_in: 1
guest_account:
  0:
    account_id: 10000013
    account_limit: 300
    allow_charges: 
----------------------------------------
Guest #3:
guest_id: 10000115
guest_type: crew
first_name: Red 
middle_name: Ruby
last_name: Flowers 
gender: F
guest_booking:
  0:
    booking_number: 10000015
    room_no: A0051
    is_checked_in: 1
guest_account:
  0:
    account_id: 10000519
    account_limit: 300
    allow_charges: 1
----------------------------------------
Guest #4:
guest_id: 10000116
guest_type: crew
first_name: Ismael 
middle_name: Jean-Vital
last_name: Jammes
gender: M
guest_booking:
  0:
    booking_number: 10000016
    room_no: A0023
    is_checked_in: 1
guest_account:
  0:
    account_id: 10000015
    account_limit: 300
    allow_charges: 1
----------------------------------------
*/

