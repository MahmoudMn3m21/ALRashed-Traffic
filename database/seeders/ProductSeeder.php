<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name_en' => 'Traffic Control Systems',
            'name_ar' => 'أنظمة التحكم المروري',
            'image' => 'products/img_2309.png',
            'description' => 'Advanced traffic control systems for efficient traffic management',
            'code' => 'TCS-001',
            'material' => 'Aluminum and Steel',
            'color' => 'Yellow and Black',
            'features' => 'Real-time monitoring\nWeather resistant\nLED display technology',
            'usages' => 'Highway intersections\nUrban traffic management\nConstruction zones'
        ]);

        Product::create([
            'name_en' => 'Smart Traffic Lights',
            'name_ar' => 'إشارات مرور ذكية',
            'image' => 'products/img_1220.png',
            'description' => 'Intelligent traffic light systems with adaptive timing',
            'code' => 'STL-002',
            'material' => 'Polycarbonate and LED',
            'color' => 'Red, Yellow, Green',
            'features' => 'Adaptive timing\nSensor integration\nRemote monitoring',
            'usages' => 'City intersections\nPedestrian crossings\nSchool zones'
        ]);

        Product::create([
            'name_en' => 'Digital Road Signs',
            'name_ar' => 'لافتات طرق رقمية',
            'image' => 'products/img_2303.png',
            'description' => 'Dynamic digital signage for real-time traffic information',
            'code' => 'DRS-003',
            'material' => 'LED Matrix',
            'color' => 'Multi-color LED',
            'features' => 'Variable message display\nHigh visibility\nProgrammable content',
            'usages' => 'Highway information\nTraffic warnings\nRoute guidance'
        ]);

        Product::create([
            'name_en' => 'Speed Detection Cameras',
            'name_ar' => 'كاميرات كشف السرعة',
            'image' => 'products/img_2312.png',
            'description' => 'High-precision speed detection and enforcement cameras',
            'code' => 'SDC-004',
            'material' => 'Weather-resistant housing',
            'color' => 'Gray',
            'features' => 'High-resolution imaging\nAutomatic number plate recognition\nData logging',
            'usages' => 'Speed enforcement\nTraffic monitoring\nAccident investigation'
        ]);

        Product::create([
            'name_en' => 'Parking Management Systems',
            'name_ar' => 'أنظمة إدارة المواقف',
            'image' => 'products/img_2313.png',
            'description' => 'Comprehensive parking management and guidance systems',
            'code' => 'PMS-005',
            'material' => 'Stainless Steel',
            'color' => 'Blue and White',
            'features' => 'Space detection sensors\nPayment integration\nMobile app support',
            'usages' => 'Shopping centers\nAirports\nUrban parking'
        ]);

        Product::create([
            'name_en' => 'Emergency Response Equipment',
            'name_ar' => 'معدات الاستجابة للطوارئ',
            'image' => 'products/img_98.png',
            'description' => 'Emergency traffic management and response equipment',
            'code' => 'ERE-006',
            'material' => 'High-visibility materials',
            'color' => 'Orange and Red',
            'features' => 'Portable design\nBattery powered\nQuick deployment',
            'usages' => 'Accident scenes\nEmergency diversions\nRoad maintenance'
        ]);
    }
}