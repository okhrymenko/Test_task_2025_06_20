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

function sortNestedArray(array &$data, array $sortKeys): void
{
    // First: recursively sort any nested arrays
    foreach ($data as &$item) {
        foreach ($item as &$value) {
            if (is_array($value)) {
                sortNestedArray($value, $sortKeys);
            }
        }
    }

    // Then: sort THIS level of array if it is an array of items (assoc array won't sort)
    usort($data, function ($a, $b) use ($sortKeys) {
        foreach ($sortKeys as $key) {
            $aValue = findValueByKey($a, $key);
            $bValue = findValueByKey($b, $key);

            // Null-safe comparison
            if ($aValue == $bValue) {
                continue;
            }

            return ($aValue < $bValue) ? -1 : 1;
        }

        return 0; // If all sort keys equal, treat as equal
    });
}

function findValueByKey($array, $targetKey)
{
    if (!is_array($array)) {
        return null;
    }

    foreach ($array as $key => $value) {
        if ($key === $targetKey) {
            return $value;
        }

        if (is_array($value)) {
            $result = findValueByKey($value, $targetKey);
            if ($result !== null) {
                return $result;
            }
        }
    }

    return null; // Not found
}

echo  str_repeat('#', 20). "  Sort by account_id  ". str_repeat('#', 20). "\n";
sortNestedArray($data, ['account_id', 'last_name']);
foreach ($data as $index => $guest) {
    echo "Guest #{$index} - {$guest['last_name']}\n";
    $accountId = $guest['guest_account'][0]['account_id'] ?? 'N/A';
    echo "Account ID: {$accountId}\n";
    echo str_repeat('-', 40) . "\n";
}
echo  str_repeat('#', 20). "  Sort by last_name  ". str_repeat('#', 20). "\n";
sortNestedArray($data, ['last_name', 'account_id']);

// Print to check:
foreach ($data as $index => $guest) {
    echo "Guest #{$index} - {$guest['last_name']}\n";
    $accountId = $guest['guest_account'][0]['account_id'] ?? 'N/A';
    echo "Account ID: {$accountId}\n";
    echo str_repeat('-', 40) . "\n";
}
