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

        Product::create([
            'name_en' => 'Solar Traffic Signals',
            'name_ar' => 'إشارات مرور شمسية',
            'image' => 'products/img_2309.png',
            'description' => 'Eco-friendly solar-powered traffic signal systems',
            'code' => 'STS-007',
            'material' => 'Solar panels and LED',
            'color' => 'Black and Yellow',
            'features' => 'Solar powered\nBattery backup\nWeather resistant',
            'usages' => 'Remote locations\nEco-friendly installations\nCost-effective solutions'
        ]);

        Product::create([
            'name_en' => 'Pedestrian Crossing Systems',
            'name_ar' => 'أنظمة عبور المشاة',
            'image' => 'products/img_1220.png',
            'description' => 'Advanced pedestrian crossing and safety systems',
            'code' => 'PCS-008',
            'material' => 'Stainless steel and LED',
            'color' => 'Red and Green',
            'features' => 'Push button activation\nAudio signals\nCountdown timers',
            'usages' => 'School zones\nBusy intersections\nAccessible crossings'
        ]);

        Product::create([
            'name_en' => 'Variable Message Signs',
            'name_ar' => 'لافتات الرسائل المتغيرة',
            'image' => 'products/img_2303.png',
            'description' => 'Dynamic message display systems for traffic information',
            'code' => 'VMS-009',
            'material' => 'LED matrix display',
            'color' => 'Amber LED',
            'features' => 'Remote control\nMultiple languages\nScheduled messages',
            'usages' => 'Highway management\nEvent notifications\nWeather alerts'
        ]);

        Product::create([
            'name_en' => 'Traffic Barrier Systems',
            'name_ar' => 'أنظمة حواجز المرور',
            'image' => 'products/img_2312.png',
            'description' => 'Robust traffic barrier and control systems',
            'code' => 'TBS-010',
            'material' => 'Galvanized steel',
            'color' => 'Red and White',
            'features' => 'Crash tested\nEasy installation\nReflective strips',
            'usages' => 'Highway safety\nConstruction zones\nPerimeter control'
        ]);

        Product::create([
            'name_en' => 'Smart Parking Meters',
            'name_ar' => 'عدادات مواقف ذكية',
            'image' => 'products/img_2313.png',
            'description' => 'Digital parking meters with multiple payment options',
            'code' => 'SPM-011',
            'material' => 'Weather-resistant housing',
            'color' => 'Blue and Silver',
            'features' => 'Contactless payment\nMobile app integration\nReal-time monitoring',
            'usages' => 'Urban parking\nCommercial areas\nTourist zones'
        ]);

        Product::create([
            'name_en' => 'Road Marking Materials',
            'name_ar' => 'مواد تخطيط الطرق',
            'image' => 'products/img_98.png',
            'description' => 'High-quality thermoplastic road marking materials',
            'code' => 'RMM-012',
            'material' => 'Thermoplastic compound',
            'color' => 'White and Yellow',
            'features' => 'Long-lasting\nReflective beads\nQuick application',
            'usages' => 'Lane markings\nCrosswalks\nParking spaces'
        ]);

        Product::create([
            'name_en' => 'Traffic Monitoring Cameras',
            'name_ar' => 'كاميرات مراقبة المرور',
            'image' => 'products/img_2309.png',
            'description' => 'Advanced traffic monitoring and surveillance cameras',
            'code' => 'TMC-013',
            'material' => 'Weatherproof housing',
            'color' => 'Dark Gray',
            'features' => '4K resolution\nNight vision\nAI analytics',
            'usages' => 'Traffic analysis\nSecurity monitoring\nIncident detection'
        ]);

        Product::create([
            'name_en' => 'Electronic Road Signs',
            'name_ar' => 'لافتات طرق إلكترونية',
            'image' => 'products/img_1220.png',
            'description' => 'Programmable electronic road signage systems',
            'code' => 'ERS-014',
            'material' => 'LED display panel',
            'color' => 'Full color LED',
            'features' => 'Programmable content\nBrightness control\nRemote management',
            'usages' => 'Dynamic routing\nTraffic updates\nEmergency alerts'
        ]);

        Product::create([
            'name_en' => 'Intelligent Transportation Systems',
            'name_ar' => 'أنظمة النقل الذكية',
            'image' => 'products/img_2303.png',
            'description' => 'Comprehensive intelligent transportation management systems',
            'code' => 'ITS-015',
            'material' => 'Integrated electronics',
            'color' => 'Multi-component',
            'features' => 'AI-powered\nReal-time data\nIntegrated control',
            'usages' => 'Smart cities\nHighway management\nPublic transport'
        ]);
    }
}