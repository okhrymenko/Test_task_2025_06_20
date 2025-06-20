# Test_task_2025_06_20
Sorting a Nested Array in PHP (with Support for Nested Keys)
I've  created php file  for each  task separately. I've divided this task into four tasks.
I've used the  next onlinee editor for  outputting the results https://onlinephp.io/ 

# Simple console output for  each  question 

###################################################  First Question ################################################################

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

###################################################  Second Question ################################################################

####################  Sort by account_id  ####################
Guest #0 - Santiago
Account ID: 10000013
----------------------------------------
Guest #1 - Jammes
Account ID: 10000015
----------------------------------------
Guest #2 - Flowers 
Account ID: 10000519
----------------------------------------
Guest #3 - Hemingway
Account ID: 10000522
----------------------------------------
Guest #4 - Burns
Account ID: 20009503
----------------------------------------
####################  Sort by last_name  ####################
Guest #0 - Burns
Account ID: 20009503
----------------------------------------
Guest #1 - Flowers 
Account ID: 10000519
----------------------------------------
Guest #2 - Hemingway
Account ID: 10000522
----------------------------------------
Guest #3 - Jammes
Account ID: 10000015
----------------------------------------
Guest #4 - Santiago
Account ID: 10000013
----------------------------------------

###################################################  Third Question ################################################################

Customer: Alice Smith
Addresses:
 - 123 Main St New York, NY 10001
 - 987 Second Ave Apt 5B New York, NY 10002

Shipping to: 123 Main St New York, NY 10001

Cart Items:
- 3 x Book @ $12 = $36.00
- 1 x Laptop @ $950 = $950.00

Subtotal: $986.00
Tax (7%): $69.02
Shipping: $10.00
Total: $1065.02

####################################################  Fourth Question ###############################################################

Customer: Jane Doe
Addresses:
 - 123 Main St New York, NY 10001
 - 456 Second Ave Apt 2B Brooklyn, NY 11201

Shipping to: 456 Second Ave Apt 2B Brooklyn, NY 11201

Cart Items:
- 2 x T-shirt @ $25 = $50.00
- 1 x Shoes @ $80 = $80.00
- 1 x Hat @ $15 = $15.00

Subtotal: $145.00
Tax (7%): $10.15
Shipping: $10.00
Total: $165.15
