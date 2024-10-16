<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chef;
use App\Models\Category;

class ChefSeeder extends Seeder
{
    public function run()
    {
        // Fetch all categories
        $categories = Category::all();

        // Create chefs and assign them to a random category
        $bonnie = Chef::create([
            'name' => 'Bonnie Green',
            'bio' => "Hailing from a small town in Tuscany, Bonnie Green brings authentic Italian flavors to every dish she creates. Her culinary journey began in her grandmother's rustic kitchen, where she learned the art of handmade pasta and the importance of using fresh, locally-sourced ingredients.

After honing her skills at the prestigious Culinary Institute of Florence, Bonnie worked in several Michelin-starred restaurants across Italy before bringing her expertise to the international stage. Her innovative approach to traditional Italian cuisine has earned her numerous accolades and a devoted following among food enthusiasts.

Bonnie's philosophy centers around respecting the inherent qualities of each ingredient while pushing the boundaries of flavor combinations. Her signature dishes, such as truffle-infused risotto and deconstructed tiramisu, showcase her ability to balance tradition with modernity.",
            'photo' => 'images/chef-1.png',
        ]);
        $bonnie->categories()->attach($categories->random(2));

        $john = Chef::create([
            'name' => 'John Doe',
            'bio' => "John Doe's culinary journey began in the heart of Paris, where he honed his skills in classical French techniques at prestigious Michelin-starred restaurants. His passion for gastronomy was ignited during his apprenticeship under renowned chef Pierre Gagnaire, where he learned the importance of precision and creativity in the kitchen.

Driven by an insatiable curiosity, John has traveled extensively, incorporating global flavors and techniques into his culinary repertoire. His innovative approach to fusion cuisine has garnered international recognition, earning him features in leading culinary publications and invitations to cook at prestigious events worldwide.

At the core of John's cooking philosophy is a deep respect for ingredients and a commitment to sustainable practices. He works closely with local farmers and producers to source the finest seasonal ingredients, ensuring that each dish tells a story of its origin and the people behind it.",
            'photo' => 'images/chef-2.png',
        ]);
        $john->categories()->attach($categories->random(3));

        $alice = Chef::create([
            'name' => 'Alice Brown',
            'bio' => "Alice Brown discovered her love for baking while traveling through Europe, drawing inspiration from the continent's rich pastry traditions. Her journey took her from the chocolate shops of Belgium to the patisseries of Vienna, where she immersed herself in the art of creating exquisite desserts.

Returning home, Alice pursued formal training at the renowned Le Cordon Bleu, where she refined her techniques and developed her unique style. Her creations are known for their delicate balance of flavors and stunning visual presentations, often incorporating unexpected elements such as edible flowers and artisanal chocolates.

Alice's passion for sharing her knowledge has led her to become a sought-after instructor, conducting workshops and masterclasses around the world. Her debut cookbook, 'Sweet Inspirations,' became an instant bestseller, inspiring home bakers to push their boundaries and explore new flavor combinations.",
            'photo' => 'images/chef-3.png',
        ]);
        $alice->categories()->attach($categories->random(2));

        $david = Chef::create([
            'name' => 'David Lee',
            'bio' => "Growing up in Texas, David Lee developed a deep appreciation for smoky flavors and slow-cooked meats, which he now incorporates into his innovative cuisine. His culinary roots are firmly planted in traditional Southern barbecue, a passion he inherited from his father, a legendary pitmaster.

David's journey took an unexpected turn when he enrolled in the Culinary Institute of America, where he was exposed to a world of diverse culinary traditions. This experience sparked a desire to elevate traditional barbecue techniques by infusing them with global flavors and modern cooking methods.

After graduating, David worked in top restaurants across the United States, from New York to San Francisco, before returning to his Texas roots. He now runs a critically acclaimed restaurant that seamlessly blends his barbecue heritage with fine dining sensibilities. His signature dish, a 48-hour smoked brisket with a Japanese-inspired glaze, exemplifies his unique culinary vision.",
            'photo' => 'images/chef-4.png',
        ]);
        $david->categories()->attach($categories->random(3));

        $sophia = Chef::create([
            'name' => 'Sophia Martinez',
            'bio' => "Sophia Martinez's Latin roots and extensive travels throughout South America influence her vibrant, colorful dishes that celebrate bold flavors. Born in Venezuela and raised in a family of passionate cooks, Sophia's earliest memories are filled with the aromas of sofrito and the sizzle of arepas on the griddle.

Her culinary education began informally, learning from street food vendors in Cartagena and home cooks in the Andean mountains. This hands-on experience was complemented by formal training at the Culinary Institute of America, where she learned to refine her techniques while staying true to her Latin American heritage.

Sophia's cooking style is characterized by its vibrant use of native ingredients and her ability to transform humble dishes into sophisticated culinary experiences. Her commitment to showcasing the diversity of Latin American cuisine has made her a respected authority in the field, often consulted by food journalists and fellow chefs seeking to explore the region's rich culinary traditions.",
            'photo' => 'images/chef-5.png',
        ]);
        $sophia->categories()->attach($categories->random(2));

        $liam = Chef::create([
            'name' => 'Liam O\'Connor',
            'bio' => "Liam O'Connor is a master of comfort food, specializing in rustic Irish cuisine with a modern twist, focusing on fresh, locally sourced ingredients. Growing up on a small farm in County Cork, Liam developed a deep appreciation for the land and its bounty from an early age.

After completing his culinary training in Dublin, Liam spent several years working in top restaurants across Ireland and the UK, including a stint at Heston Blumenthal's The Fat Duck. This experience opened his eyes to the possibilities of molecular gastronomy and innovative cooking techniques.

Returning to his roots, Liam now runs a farm-to-table restaurant that celebrates Irish culinary heritage while incorporating modern techniques. His menu changes with the seasons, featuring dishes like reimagined colcannon and deconstructed Irish stew. Liam's commitment to sustainability extends beyond the kitchen, as he works closely with local farmers and fishermen to promote ethical and environmentally friendly practices.",
            'photo' => 'images/chef-6.png',
        ]);
        $liam->categories()->attach($categories->random(3));

        Chef::factory()->count(50)->create()->each(function ($chef) use ($categories) {
            $chef->categories()->attach($categories->random(rand(2, 3)));  // Attach 2-3 random categories
        });
    }
}