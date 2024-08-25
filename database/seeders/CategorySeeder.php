<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('categories')->insert([
            [
                'title' => 'Mac',
                'description' => 'A Mac is a personal computer developed by Apple, known for its sleek design, intuitive interface, and integration with the macOS operating system. Macs offer powerful performance, high-quality displays, and are popular for their reliability and ease of use. They come in various models, including MacBook laptops and Mac desktop computers, catering to different needs and preferences.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Watch',
                'description' => 'The Apple Watch is a smartwatch that offers fitness tracking, health monitoring, and seamless integration with the iPhone. It features a high-resolution display, customizable watch faces, and various apps for notifications, navigation, and more. Its health-focused features include heart rate monitoring, ECG, and blood oxygen measurement, making it a versatile companion for daily activities and wellness.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'iPhone',
                'description' => "The iPhone is a premium smartphone developed by Apple, known for its sleek design, high-performance hardware, and advanced software features. It offers a high-quality display, a powerful camera system, and seamless integration with Apple's ecosystem, including iOS, iCloud, and various apps. The iPhone is praised for its build quality, security features, and user-friendly interface.",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'AirPods',
                'description' => 'Apple AirPods are wireless earbuds offering high-quality sound, seamless integration with Apple devices, and advanced features like active noise cancellation (in Pro models), spatial audio, and a comfortable fit. They come with a compact charging case that provides extended battery life and convenient portability.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
