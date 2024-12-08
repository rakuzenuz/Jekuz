# Saytlarni Skanning PHP Kodeks Hisoboti

**Kirish:**   
Bu yerda PHP kodingizni ko'rib chiqamiz. U saytning HTML ma'lumotlarini skanerlash uchun mo'ljallangan, lekin buning o'rniga agar sizda "Nima, yana bir saytda muammolar bormi?" degan savol bo'lsa, siz to'g'ri joydasiz!

## Kod Tuzilishi

### 1. Funksiya Ta'rifi

```php  
function scanWebsite($url) {
```
Bu funksiyamiz saytni ko'rish uchun ochamiz; odatda, bunday ishlar uchun "website" va "sherlock" birga kelishi kerak!

### 2. HTML Ma'lumotlarini Olish

```php  
$html = @file_get_contents($url);
if ($html === FALSE) {
    return json_encode(["error" => "Sayt mavjud emas yoki ochib bo'lmaydi."]);
}
```
- `file_get_contents($url)` - bu oddiy bir so'zdir: "Men sizni qidiraman!" Agar saytingiz ochilmasa, "Sayt mavjud emas!" deb qichqirgan holda kelyapmiz.

### 3. DOM Tahlili

```php  
$dom = new DOMDocument();
@$dom->loadHTML($html);
```
- `DOMDocument` - bu bizning saytimizning muqaddas qidiruvchisi, u HTMLni tahlil qiladi va kerakli narsalarni topadi, hatto "yosh muallimlar" ham!

### 4. HTML Elementlarni Olish

```php  
$links = $dom->getElementsByTagName('a');
$images = $dom->getElementsByTagName('img');
```
- U yerda havolalar va rasmlar to'plangani bor; bu erda "Keling, barcha qiziqarli narsalarni to'playmiz!" degan ruhda harakat qilamiz.

### 5. Natijalarni Yig'ish

```php  
$result = [
    'links' => [],
    'images' => []
];
```
- Havolalar va rasmlar uchun bo'sh ro'yxatlar; bizni qiziquvchanlik bilan kutmoqda!

### 6. Havolalarni Yig'ish

```php  
foreach ($links as $link) {
    $href = $link->getAttribute('href');
    if (!empty($href)) {
        $result['links'][] = $href;
    }
}
```
- Har bir havoladan `href` atributi olingan, va bu yerda "O'sha havola qayerga bormoqda?" degan savolga javob izlaymiz.

### 7. Rasm Manzillarini Yig'ish

```php  
foreach ($images as $image) {
    $src = $image->getAttribute('src');
    if (!empty($src)) {
        $result['images'][] = $src;
    }
}
```
- Rasmlar bo'lsa, "Bu ko'rganingizni sevdingizmi?" deb so'raymiz va ularni ro'yxatga olamiz.

### 8. JSON Formatida Natija Qaytarish

```php  
return json_encode($result);
```
- Olingan havola va rasm ma'lumotlari JSON formatida qaytariladi; "Men buni siz uchun tayyorladim!"

## URL Olish

```php  
if (isset($_GET['url'])) {
    $siteUrl = $_GET['url'];
```
- Agar URL GET orqali berilgan bo'lsa, "Yana bir saytdan ko'ring!" deb qabul qilamiz.

### URL Formatini Tekshirish

```php  
if (filter_var($siteUrl, FILTER_VALIDATE_URL)) {
    header('Content-Type: application/json');
    echo scanWebsite($siteUrl);
} else {
    echo json_encode(["error" => "Noto'g'ri URL format. Iltimos, to'g'ri URL ni kiriting."]);
}
```
- Agar URL formatini tekshirishda xato topsak, "Xato! Ushbu URLni 'Google Translate'dan tekshirib qo'ying!" deb eslatamiz.

### URL Ko'rsatmasi

```php  
} else {
    echo json_encode(["error" => "URL ni ko'rsating."]);
}
```
- URL ko'rsatmasi berilmasa, "Iltimos, biror narsa yozing, aks holda men yolg'iz qoldim!" deb xabar beramiz.

## Misol

Agar siz `http://example.com` manzilini kiritgan bo'lsangiz, dastur quyidagi natijani qaytarishi mumkin:

```json  
{
    "links": ["http://example.com/about", "http://example.com/contact"],
    "images": ["http://example.com/image1.jpg", "http://example.com/image2.png"]
}
```
"Vay, bu juda ko'p havolalar va rasmlar! Meni ham taklif qiling!"

## Xulosa

Ushbu PHP kodi HTML saytlarini tezda skanerlash va URL havolalari hamda rasm manzillarini olish uchun qulaydir. Biroq, xavfsizlik va resurslardan foydalanishni hisobga olib, g'ayratli bo'lib, har doim ehtiyotkorlik bilan yondoshish kerak. "Har bir sayt sizni kutmoqda, lekin ehtiyot bo'lishingiz kerak!"