<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection = [
            // Chinese New Year
            [
                'category' => 'Chinese New Year',
                'name' => 'Kongsi Tower',
                'type' => 'tower',
                'description' => 'Celebrate the joy of togetherness with Kongsi Tower, a delightful snack set filled with a variety of sweet and savory treats, perfect for sharing joyful moments with family and friends during Chinese New Year celebrations.',
                'price' => 339000.00,
                'stock' => 97,
                'image' => 'cny1.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Chinese New Year',
                'name' => 'Snackpao Tower',
                'type' => 'tower',
                'description' => 'Snackpao Tower brings a burst of excitement to Chinese New Year, combining a vibrant selection of popular snacks and soft bao, making every gathering a special and memorable experience with delicious flavors.',
                'price' => 355000.00,
                'stock' => 90,
                'image' => 'cny2.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Chinese New Year',
                'name' => 'ChoiSnack Bouquet',
                'type' => 'bouquet',
                'description' => 'ChoiSnack Bouquet symbolizes good fortune and prosperity, featuring carefully curated snacks that bring happiness and luck, perfect for sharing delightful moments during Chinese New Year celebrations with loved ones.',
                'price' => 269000.00,
                'stock' => 73,
                'image' => 'cny3.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Chinese New Year',
                'name' => 'Kongkow Bouquet',
                'type' => 'bouquet',
                'description' => 'Kongkow Bouquet offers a crispy and festive snack selection, perfect for sharing during Chinese New Year gatherings, bringing laughter and joy to every shared moment with family and friends throughout the celebration.',
                'price' => 284000.00,
                'stock' => 60,
                'image' => 'cny4.png',
                'layer' => '4',
                'created_at' => now()
            ],

            // Valentine
            [
                'category' => 'Valentine',
                'name' => 'Loves Tower',
                'type' => 'tower',
                'description' => 'Celebrate Valentine’s Day with Loves Tower, a beautifully arranged sweet snack collection that perfectly expresses love and affection, making special moments even sweeter and unforgettable for loved ones.',
                'price' => 365000.00,
                'stock' => 85,
                'image' => 'val1.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Valentine',
                'name' => 'Sweet Tower',
                'type' => 'tower',
                'description' => 'Sweet Tower presents an elegant arrangement of delightful treats that add joy and sweetness to Valentine’s Day, creating cherished moments that bring smiles and warm hearts in every bite shared.',
                'price' => 320000.00,
                'stock' => 70,
                'image' => 'val2.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Valentine',
                'name' => 'SnackDear Bouquet',
                'type' => 'bouquet',
                'description' => 'SnackDear Bouquet is the perfect sweet gift to surprise your special someone on Valentine’s Day, featuring carefully selected treats that bring joy, warmth, and a lovely atmosphere to the celebration.',
                'price' => 290000.00,
                'stock' => 65,
                'image' => 'val3.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Valentine',
                'name' => 'Baper Bouquet',
                'type' => 'bouquet',
                'description' => 'Baper Bouquet offers a sweet and playful snack selection designed to make Valentine’s Day extra special, filling the day with delightful flavors, cherished memories, and heartfelt moments together.',
                'price' => 258000.00,
                'stock' => 75,
                'image' => 'val4.png',
                'layer' => '4',
                'created_at' => now()
            ],

            // Ramadhan
            [
                'category' => 'Ramadhan',
                'name' => 'CemilRaya Tower',
                'type' => 'tower',
                'description' => 'Celebrate the spirit of togetherness during Eid with CemilRaya Tower, a festive snack collection thoughtfully curated to enhance family gatherings and joyful moments throughout the blessed season.',
                'price' => 370000.00,
                'stock' => 95,
                'image' => 'ram1.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Ramadhan',
                'name' => 'SnackBal Tower',
                'type' => 'tower',
                'description' => 'SnackBal Tower offers a delightful mix of sweet and savory snacks, specially selected to add flavor and joy to Ramadan and Eid celebrations, making gatherings even more special and meaningful.',
                'price' => 345000.00,
                'stock' => 80,
                'image' => 'ram2.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Ramadhan',
                'name' => 'KueCeria Bouquet',
                'type' => 'bouquet',
                'description' => 'KueCeria Bouquet is a vibrant and cheerful snack bouquet that brings extra happiness to Eid celebrations, filled with colorful and delicious treats that brighten every gathering with joy.',
                'price' => 268000.00,
                'stock' => 68,
                'image' => 'ram3.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Ramadhan',
                'name' => 'Fitri Bouquet',
                'type' => 'bouquet',
                'description' => 'Fitri Bouquet is a heartwarming snack set perfect for sharing during Eid festivities, featuring a carefully selected assortment of treats that symbolize happiness and sweet togetherness.',
                'price' => 277000.00,
                'stock' => 72,
                'image' => 'ram4.png',
                'layer' => '4',
                'created_at' => now()
            ],

            // Christmas
            [
                'category' => 'Christmas',
                'name' => 'Natalan Tower',
                'type' => 'tower',
                'description' => 'Bring warmth and cheer to Christmas celebrations with Natalan Tower, a festive snack collection filled with sweet and savory delights that create joyful memories with loved ones.',
                'price' => 359000.00,
                'stock' => 88,
                'image' => 'chr1.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Christmas',
                'name' => 'SnackClaus Tower',
                'type' => 'tower',
                'description' => 'SnackClaus Tower brings the magic of Christmas to your home with a delightful assortment of festive snacks that spread happiness, warmth, and holiday cheer to every celebration.',
                'price' => 332000.00,
                'stock' => 70,
                'image' => 'chr2.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Christmas',
                'name' => 'Blessings Bouquet',
                'type' => 'bouquet',
                'description' => 'Blessings Bouquet is a beautifully arranged snack bouquet that adds joy to Christmas festivities, combining crunchy and sweet treats that create memorable holiday moments with family and friends.',
                'price' => 282000.00,
                'stock' => 65,
                'image' => 'chr3.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Christmas',
                'name' => 'SnackHoHo Bouquet',
                'type' => 'bouquet',
                'description' => 'SnackHoHo Bouquet offers a playful and festive snack selection perfect for Christmas celebrations, bringing holiday cheer, sweet flavors, and warm smiles to every family gathering.',
                'price' => 290000.00,
                'stock' => 70,
                'image' => 'chr4.png',
                'layer' => '4',
                'created_at' => now()
            ],

            // Birthday
            [
                'category' => 'Birthday',
                'name' => 'Happy Tower',
                'type' => 'tower',
                'description' => 'Celebrate birthdays with Happy Tower, a vibrant snack collection filled with colorful and delicious treats that make every birthday moment more joyful, memorable, and full of excitement.',
                'price' => 360000.00,
                'stock' => 85,
                'image' => 'bir1.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Birthday',
                'name' => 'Party Tower',
                'type' => 'tower',
                'description' => 'Party Tower is the perfect snack collection for birthday celebrations, featuring a lively mix of sweet and crunchy treats that add color and flavor to every fun-filled party moment.',
                'price' => 310000.00,
                'stock' => 78,
                'image' => 'bir2.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Birthday',
                'name' => 'Surprise Bouquet',
                'type' => 'bouquet',
                'description' => 'Surprise Bouquet is a charming snack bouquet designed to bring extra happiness to birthday celebrations, offering a variety of sweet and savory delights for joyful moments and heartfelt smiles.',
                'price' => 277000.00,
                'stock' => 68,
                'image' => 'bir3.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Birthday',
                'name' => 'Wishes Bouquet',
                'type' => 'bouquet',
                'description' => 'Wishes Bouquet is a delightful birthday snack bouquet that adds joy to candle-blowing moments, featuring an appealing selection of treats to make every birthday wish more meaningful and sweet.',
                'price' => 265000.00,
                'stock' => 75,
                'image' => 'bir4.png',
                'layer' => '4',
                'created_at' => now()
            ],

            // Graduation
            [
                'category' => 'Graduation',
                'name' => 'Congrats Tower',
                'type' => 'tower',
                'description' => 'Celebrate graduation day with Congrats Tower, a festive snack set thoughtfully crafted to honor academic achievements, making the celebration even more special and full of shared happiness.',
                'price' => 350000.00,
                'stock' => 90,
                'image' => 'gra1.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Graduation',
                'name' => 'Toga Tower',
                'type' => 'tower',
                'description' => 'Toga Tower is a joyful snack collection created to complement graduation celebrations, filled with a variety of treats that symbolize success, happiness, and the start of a new and exciting journey.',
                'price' => 335000.00,
                'stock' => 82,
                'image' => 'gra2.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Graduation',
                'name' => 'Wisuda Bouquet',
                'type' => 'bouquet',
                'description' => 'Wisuda Bouquet is a beautifully arranged congratulatory snack bouquet designed to share happiness, appreciation, and warm wishes with graduates on their special day of achievement and celebration.',
                'price' => 283000.00,
                'stock' => 72,
                'image' => 'gra3.png',
                'layer' => '4',
                'created_at' => now()
            ],
            [
                'category' => 'Graduation',
                'name' => 'Success Bouquet',
                'type' => 'bouquet',
                'description' => 'Success Bouquet is a thoughtful snack bouquet that conveys sweet wishes for a bright future, perfect for celebrating graduation moments and encouraging new beginnings with joy and excitement.',
                'price' => 295000.00,
                'stock' => 67,
                'image' => 'gra4.png',
                'layer' => '4',
                'created_at' => now()
            ],
        ];

        Collection::insert($collection);
    }
}
