<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->delete();
        DB::table('services')->insert([
            'name' => 'أشعة على شرايين الطرف السفلى بالاجهزة العادية',
            'price' => '165.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(5),
            ]);

        DB::table('services')->insert([
            'name' => 'أشعة على شرايين الطرف السفلى بنظام SERIAL',
            'price' => '250.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(6),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة شرايين الطرف العلوى مباشر شامل',
            'price' => '300.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(3),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة على الركبة ثلاثة اوضاع',
            'price' => '350.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(2),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة على القدم وضعين',
            'price' => '450.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(6),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة قياسات طرف واحد',
            'price' => '187.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(7),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة على الصدر وضع واحد',
            'price' => '700.00',
            'description' => 'أشعة على الثديين اربعة افلام',
            'created_at' => Carbon::now()->subDays(8),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة على الثديين اربعة افلام',
            'price' => '1500.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(8),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة بالصبغة على المسالك البولية غير الصبغة و المستهلكات',
            'price' => '1150.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(9),
        ]);

        DB::table('services')->insert([
            'name' => '	أشعة على الامعاء بالباريوم غير شاملة الصبغة و المستهلكات',
            'price' => '300.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(3),
        ]);

        DB::table('services')->insert([
            'name' => 'حقن النخاع الشوكى بالصبغة المنطقة القطنية',
            'price' => '5000.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(2),
        ]);

        DB::table('services')->insert([
            'name' => 'أشعة مقطعية على المخ بدون صبغة',
            'price' => '2500.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(4),
        ]);

        DB::table('services')->insert([
            'name' => '	فحص منظار مرارى بالاشعة النظرية بقسم الاشعة',
            'price' => '1800.00',
            'description' => 'الخدمات الطبيه بسعر يناسبك فى كل الحالات',
            'created_at' => Carbon::now()->subDays(10),
        ]);


    }
}
