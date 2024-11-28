<?php  
define('COLOR_RESET', "\033[0m");
define('COLOR_RED', "\033[31m");
define('COLOR_GREEN', "\033[32m");
define('COLOR_YELLOW', "\033[33m");
define('COLOR_BLUE', "\033[34m");
define('COLOR_MAGENTA', "\033[35m");
define('COLOR_CYAN', "\033[36m");
define('COLOR_WHITE', "\033[37m");

function showMenu() {
    echo COLOR_CYAN . "\nBuyruqlar ro'yxati:\n\n" . COLOR_RESET;
    echo COLOR_GREEN . "1. Show Models  - Mashina modellarini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "2. Show Emails  - Mijozlarning e-mail manzillarini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "3. Show Country  - Mijozlarning davlatlarini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "4. Show Employees  - Har bir davlatdagi xodimlar sonini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "5. Show Brands - Brendlar va ularning modellarini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "6. Show Brands (Filter)  - Modellar soni 5 dan yuqori bo'lgan brandlarni ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "7. Show Tables - Barcha jadvalarini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "8. Show Sums - Modellarni umumiy narxini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "9. Show Brand Counts  - Har bir branddagi modellar sonini ko'rsatish\n" . COLOR_RESET;
    echo COLOR_GREEN . "10. Add Brand  - Yangi brand qo'shish\n" . COLOR_RESET;
    echo COLOR_GREEN . "11. Add Color  - Yangi color qo'shish\n" . COLOR_RESET;
    echo COLOR_GREEN . "12. Add Model - Yangi model qo'shish\n" . COLOR_RESET;
    echo "\nSizga kerakli buyruqni kiriting: ";
}

function saveDataToJson($filename, $data) {
    if (!file_exists($filename)) {
        file_put_contents($filename, json_encode([]));
    }

    $existingData = json_decode(file_get_contents($filename), true);

    $existingData[] = $data;

    file_put_contents($filename, json_encode($existingData, JSON_PRETTY_PRINT));
}

while (true) {
    showMenu();
    $command = trim(fgets(STDIN));

    switch ($command) {
        case '1':
            echo COLOR_YELLOW . "Mashina modelini kiriting: " . COLOR_RESET;
            $model = trim(fgets(STDIN));
            saveDataToJson('models.json', ['model' => $model]);
            echo COLOR_GREEN . "Mashina modeli saqlandi: $model\n" . COLOR_RESET;
            break;
        case '2':
            echo COLOR_YELLOW . "Mijozning e-mailini kiriting: " . COLOR_RESET;
            $email = trim(fgets(STDIN));
            saveDataToJson('emails.json', ['email' => $email]);
            echo COLOR_GREEN . "E-mail saqlandi: $email\n" . COLOR_RESET;
            break;
        case '3':
            echo COLOR_YELLOW . "Mijozning davlatini kiriting: " . COLOR_RESET;
            $country = trim(fgets(STDIN));
            saveDataToJson('countries.json', ['country' => $country]);
            echo COLOR_GREEN . "Davlat saqlandi: $country\n" . COLOR_RESET;
            break;
        case '4':
            echo COLOR_YELLOW . "Xodimlar sonini kiriting: " . COLOR_RESET;
            $employees = trim(fgets(STDIN));
            saveDataToJson('employees.json', ['employees' => $employees]);
            echo COLOR_GREEN . "Xodimlar soni saqlandi: $employees\n" . COLOR_RESET;
            break;
        case '5':
            echo COLOR_YELLOW . "Brendni kiriting: " . COLOR_RESET;
            $brand = trim(fgets(STDIN));
            saveDataToJson('brands.json', ['brand' => $brand]);
            echo COLOR_GREEN . "Brend saqlandi: $brand\n" . COLOR_RESET;
            break;
        case '6':
            echo COLOR_YELLOW . "Filtrlash uchun brendni kiriting: " . COLOR_RESET;
            $filteredBrand = trim(fgets(STDIN));
            saveDataToJson('filtered_brands.json', ['brand' => $filteredBrand]);
            echo COLOR_GREEN . "Filtrlangan brend saqlandi: $filteredBrand\n" . COLOR_RESET;
            break;
        case '7':
            echo COLOR_YELLOW . "Jadval nomini kiriting: " . COLOR_RESET;
            $table = trim(fgets(STDIN));
            saveDataToJson('tables.json', ['table' => $table]);
            echo COLOR_GREEN . "Jadval saqlandi: $table\n" . COLOR_RESET;
            break;
        case '8':
            echo COLOR_YELLOW . "Umumiy narxini kiriting: " . COLOR_RESET;
            $sum = trim(fgets(STDIN));
            saveDataToJson('sums.json', ['sum' => $sum]);
            echo COLOR_GREEN . "Umumiy narx saqlandi: $sum\n" . COLOR_RESET;
            break;
        case '9':
            echo COLOR_YELLOW . "Branddagi modellar sonini kiriting: " . COLOR_RESET;
            $brandCount = trim(fgets(STDIN));
            saveDataToJson('brand_counts.json', ['count' => $brandCount]);
            echo COLOR_GREEN . "Branddagi modellar soni saqlandi: $brandCount\n" . COLOR_RESET;
            break;
        case '10':
            echo COLOR_YELLOW . "Yangi brand nomini kiriting: " . COLOR_RESET;
            $newBrand = trim(fgets(STDIN));
            saveDataToJson('new_brands.json', ['newBrand' => $newBrand]);
            echo COLOR_GREEN . "Yangi brand saqlandi: $newBrand\n" . COLOR_RESET;
            break;
        case '11':
            echo COLOR_YELLOW . "Yangi color nomini kiriting: " . COLOR_RESET;
            $color = trim(fgets(STDIN));
            saveDataToJson('new_colors.json', ['color' => $color]);
            echo COLOR_GREEN . "Yangi color saqlandi: $color\n" . COLOR_RESET;
            break;
        case '12':
            echo COLOR_YELLOW . "Yangi model nomini kiriting: " . COLOR_RESET;
            $modelName = trim(fgets(STDIN));
            saveDataToJson('new_models.json', ['model' => $modelName]);
            echo COLOR_GREEN . "Yangi model saqlandi: $modelName\n" . COLOR_RESET;
            break;
        default:
            echo COLOR_RED . "Noto'g'ri buyruq, iltimos qaytadan urinib ko'ring.\n" . COLOR_RESET;
            break;
    }
}

?>
