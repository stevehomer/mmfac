<?php

namespace Database\Seeders;

use App\Models\CoffeeShop;
use Illuminate\Database\Seeder;

class CoffeeShopSeeder extends Seeder
{
    public function run(): void
    {
        $shops = [
            ['name' => 'Bloom & Bean', 'address' => '14 Market Street, Watford', 'town' => 'Watford', 'postcode' => 'WD17 1BD', 'lat' => 51.6553, 'lng' => -0.3963, 'rating' => 4.7, 'has_wifi' => true, 'has_outdoor' => true, 'dog_friendly' => true, 'hot_food' => false, 'accessible' => true, 'opening_hours' => 'Mon–Sat 7am–6pm, Sun 9am–4pm', 'description' => 'A bright, plant-filled independent café in the heart of Watford. Speciality coffee, homemade cakes, and a warm welcome every day.'],
            ['name' => 'The Press Room', 'address' => '3 King Street, Watford', 'town' => 'Watford', 'postcode' => 'WD18 0BW', 'lat' => 51.6568, 'lng' => -0.3977, 'rating' => 4.5, 'has_wifi' => true, 'has_outdoor' => false, 'dog_friendly' => false, 'hot_food' => true, 'accessible' => true, 'opening_hours' => 'Mon–Fri 7:30am–5:30pm, Sat 8am–4pm', 'description' => 'Former print works turned coffee house. Exposed brick, excellent espresso, and a full brunch menu until 2pm.'],
            ['name' => 'Rowan & Rye', 'address' => '22 High Street, Bushey', 'town' => 'Bushey', 'postcode' => 'WD23 1BD', 'lat' => 51.6435, 'lng' => -0.3729, 'rating' => 4.8, 'has_wifi' => true, 'has_outdoor' => true, 'dog_friendly' => true, 'hot_food' => true, 'accessible' => false, 'opening_hours' => 'Mon–Sun 8am–5pm', 'description' => 'Neighbourhood gem with a sunny terrace and a reputation for the best flat white in Hertfordshire.'],
            ['name' => 'Ground & Grind', 'address' => '7 Clarendon Road, Watford', 'town' => 'Watford', 'postcode' => 'WD17 1JJ', 'lat' => 51.6592, 'lng' => -0.3951, 'rating' => 4.4, 'has_wifi' => true, 'has_outdoor' => false, 'dog_friendly' => true, 'hot_food' => false, 'accessible' => true, 'opening_hours' => 'Mon–Fri 7am–6pm, Sat–Sun 8am–5pm', 'description' => 'Serious about coffee. Single-origin beans, expert baristas, and a quiet spot to work or meet.'],
            ['name' => 'The Foxhole', 'address' => '41 Station Road, Rickmansworth', 'town' => 'Rickmansworth', 'postcode' => 'WD3 1QY', 'lat' => 51.6386, 'lng' => -0.4732, 'rating' => 4.6, 'has_wifi' => false, 'has_outdoor' => true, 'dog_friendly' => true, 'hot_food' => true, 'accessible' => true, 'opening_hours' => 'Tue–Sun 9am–4pm', 'description' => 'Cosy café with a garden. Famous for their sourdough toasties and loose-leaf teas alongside great coffee.'],
            ['name' => 'Paper Cup', 'address' => '9 St Albans Road, Watford', 'town' => 'Watford', 'postcode' => 'WD17 1RG', 'lat' => 51.6601, 'lng' => -0.3985, 'rating' => 4.3, 'has_wifi' => true, 'has_outdoor' => false, 'dog_friendly' => false, 'hot_food' => false, 'accessible' => true, 'opening_hours' => 'Mon–Sat 8am–5pm', 'description' => 'Compact, cheerful café popular with locals. Great takeaway coffee and a constantly rotating selection of pastries.'],
            ['name' => 'Ember', 'address' => '16 Lower High Street, Watford', 'town' => 'Watford', 'postcode' => 'WD17 2EF', 'lat' => 51.6528, 'lng' => -0.3944, 'rating' => 4.5, 'has_wifi' => true, 'has_outdoor' => true, 'dog_friendly' => false, 'hot_food' => true, 'accessible' => true, 'opening_hours' => 'Mon–Sun 8am–6pm', 'description' => 'Modern café with a wood-fired feel. Excellent pour-overs, avocado toast, and a great spot by the window.'],
            ['name' => 'Tall Order', 'address' => '5 Church Street, Abbots Langley', 'town' => 'Abbots Langley', 'postcode' => 'WD5 0AB', 'lat' => 51.7016, 'lng' => -0.4174, 'rating' => 4.6, 'has_wifi' => true, 'has_outdoor' => true, 'dog_friendly' => true, 'hot_food' => false, 'accessible' => false, 'opening_hours' => 'Mon–Sat 8am–5pm, Sun 9am–3pm', 'description' => 'Village café with a big personality. Lovingly sourced beans and a dog-friendly garden.'],
        ];

        foreach ($shops as $shop) {
            CoffeeShop::firstOrCreate(['name' => $shop['name'], 'town' => $shop['town']], $shop);
        }
    }
}
