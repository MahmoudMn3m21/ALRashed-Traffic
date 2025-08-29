<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title_en' => 'Smart City Traffic Integration',
            'title_ar' => 'تكامل المرور في المدن الذكية',
            'description_en' => 'Comprehensive smart traffic management system integration for modern cities including AI-powered traffic control and real-time monitoring.',
            'description_ar' => 'تكامل شامل لنظام إدارة المرور الذكي للمدن الحديثة بما في ذلك التحكم المروري المدعوم بالذكاء الاصطناعي والمراقبة في الوقت الفعلي.',
            'image' => 'project-icon-1.svg'
        ]);

        Project::create([
            'title_en' => 'Digital Highway Transformation',
            'title_ar' => 'تحويل الطرق السريعة الرقمية',
            'description_en' => 'Complete digital transformation of highway infrastructure with smart sensors, automated toll systems, and dynamic traffic management.',
            'description_ar' => 'التحول الرقمي الكامل لبنية الطرق السريعة مع أجهزة الاستشعار الذكية وأنظمة الرسوم الآلية وإدارة المرور الديناميكية.',
            'image' => 'project-icon-2.svg'
        ]);

        Project::create([
            'title_en' => 'Intelligent Parking Solutions',
            'title_ar' => 'حلول المواقف الذكية',
            'description_en' => 'Implementation of intelligent parking management systems with mobile app integration, automated payment, and real-time space availability.',
            'description_ar' => 'تنفيذ أنظمة إدارة المواقف الذكية مع تكامل تطبيقات الهاتف المحمول والدفع الآلي وتوفر المساحات في الوقت الفعلي.',
            'image' => 'project-icon-3.svg'
        ]);

        Project::create([
            'title_en' => 'Emergency Response Network',
            'title_ar' => 'شبكة الاستجابة للطوارئ',
            'description_en' => 'Advanced emergency response network with automated incident detection, rapid response coordination, and integrated communication systems.',
            'description_ar' => 'شبكة استجابة طوارئ متقدمة مع كشف الحوادث الآلي وتنسيق الاستجابة السريعة وأنظمة الاتصال المتكاملة.',
            'image' => 'project-icon-4.svg'
        ]);
    }
}
