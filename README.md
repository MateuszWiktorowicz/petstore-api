# How to use Api
- clone this repository: https://github.com/MateuszWiktorowicz/petstore-api.git
- type command: composer install
- type command: npm install
- type command: php artisan serve
- go to: http://localhost:8000/

## Get Pet By Id
In form Find Pet by ID type id You are looking and press submit

 ## Add Pet
 In form Add a Pet type:
- name (string)
- category name (string, ex. dog, cat etc)
- Photo urls (You can typo several links just separate them by semicolon - ";" )
- tags (You can typo several tags just separate them by semicolon - ";" )

- ## Delete pet
In form Delete a Pet type Pet id You want to delete

 ## Update Pet
 In form Add a Pet type:
- Pet id You want to update
- name (string)
- category name (string, ex. dog, cat etc)
- Photo urls (You can typo several links just separate them by semicolon - ";" )
- tags (You can typo several tags just separate them by semicolon - ";" )

## Upload Image
 In form Upload Image type:
 - pet id - if not exist validate will stop action
 - image - only jpeg, jpg, png up to 2mb
 - additional meta (image description)
