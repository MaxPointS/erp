<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class insertAreas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("govern_areas")->insert([
            [
                "uuid"=>Str::uuid(),
                "name"=>"Ardiya",
                "arname"=>"العارضية",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name"=>"Khaitan",
                "arname"=>"خيطان",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name"=>"Frawaniya",
                "arname"=>"الفروانية",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Ardiya",
                "arname"=>"العارضية",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Sabah Al-Nasser",
                "arname"=>"صباح الناصر",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"New Khaitan",
                "arname"=>"خيطان الجديدة",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Ardiya",
                "arname"=>"العارضية",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Hassawi",
                "arname"=>"الحساوي",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Abdulla Al-Mubark",
                "arname"=>"ضاحية عبد الله المبارك",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Omariya",
                "arname"=>"العمرية",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Shadadiya",
                "arname"=>"الشدادية",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Dajeej",
                "arname"=>"الضجيج",
                "govern_id"=>"03a01207-fc62-48bd-8d0f-5ec08ee1553b",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Kuwait City",
                "arname"=>"مدينة الكويت",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Dasma",
                "arname"=>"الدسمة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Qourtuba",
                "arname"=>"قرطبة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Dasman",
                "arname"=>"دسمان",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Daiya",
                "arname"=>"الدعية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Surra",
                "arname"=>"السرة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Sharq",
                "arname"=>"الشرق",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Mansouriya",
                "arname"=>"المنصورية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Yarmouk",
                "arname"=>"اليرموك",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Mansouriya",
                "arname"=>"المنصورية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Sawaber",
                "arname"=>"الصوابر",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Abdulla Al-Salem",
                "arname"=>"ضاحية عبد الله السالم",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Shuwaikh",
                "arname"=>"الشويخ",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Mirgab",
                "arname"=>"المرقاب",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Nuzha",
                "arname"=>"النزهة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Rai",
                "arname"=>"الري",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Qubla",
                "arname"=>"القبلة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Fiehaa",
                "arname"=>"الفيحاء",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Ghornata",
                "arname"=>"غرناطة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Salhiya",
                "arname"=>"الصالحية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Shamiya",
                "arname"=>"الشامية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Sulabikhat",
                "arname"=>"الصليبيخات",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Doha",
                "arname"=>"الدوحة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Watiya",
                "arname"=>"الوطية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Rawda",
                "arname"=>"الروضة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Nahda",
                "arname"=>"النهضة",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Beneed Al-Qar",
                "arname"=>"بنيد القار",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Adaliya",
                "arname"=>"العديلية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Jaber Al-Ahmed",
                "arname"=>"جابر الأحمد",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Kaifan",
                "arname"=>"كيفان",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Khaldiya",
                "arname"=>"الخالدية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Qirawan",
                "arname"=>"القيروان",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Qadsiya",
                "arname"=>"القادسية",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"NorthWest Sulaibikhat",
                "arname"=>"شمال غرب الصليبيخات",
                "govern_id"=>"37ad20cd-ac82-4ba2-a64a-fcf5303b2647",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Fintas",
                "arname"=>"الفنطاس",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Feheel",
                "arname"=>"الفحيحيل",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Jaber Al-Ali",
                "arname"=>"ضاحية جابر العلي",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Egaila",
                "arname"=>"العقيلة",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Ahmadi",
                "arname"=>"الأحمدي",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Fahed Al-Ahmed",
                "arname"=>"ضاحية فهد الأحمد",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Daher",
                "arname"=>"الظهر",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Mahbola",
                "arname"=>"المهبولة",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Rigga",
                "arname"=>"الرقة",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Hadiya",
                "arname"=>"هدية",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Abo Hulifa",
                "arname"=>"أبو حليفة",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Om Al-haiyman (Ali Sobah Salem)",
                "arname"=>"ضاحية علي صباح السالم أم الهيمان",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Sobahiya",
                "arname"=>"الصباحية",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Mangaf",
                "arname"=>"المنقف",
                "govern_id"=>"42c835c8-52bd-4b77-a885-a70f2ee77eac",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Sulaibiya",
                "arname"=>"الصليبية",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Ayoon",
                "arname"=>"العيون",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Salmi",
                "arname"=>"السالمي",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Amgara",
                "arname"=>"أمغرة",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Qaisariya",
                "arname"=>"القيصرية",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Mutlaa",
                "arname"=>"المطلاع",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Naeem",
                "arname"=>"النعيم",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Abdali",
                "arname"=>"العبدلي",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Old Jahra",
                "arname"=>"الجهراء القديمة",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Waha",
                "arname"=>"الواحة",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"New Jahra",
                "arname"=>"الجهراء الجديدة",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Rawdateen",
                "arname"=>"الروضتين",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Taima",
                "arname"=>"تيماء",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Kazma",
                "arname"=>"كاظمة",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Nassem",
                "arname"=>"النسيم",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Saad Abdulla",
                "arname"=>"سعد العبد الله",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Qasr",
                "arname"=>"القصر",
                "govern_id"=>"2bb90bad-21b3-4623-822b-20dd50e9e28f",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Hawalli",
                "arname"=>"حولي",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Bayan",
                "arname"=>"بيان",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"North Surra",
                "arname"=>"جنوب السرة",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Shab",
                "arname"=>"الشعب",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Bedaa",
                "arname"=>"آلبدع",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Zahra",
                "arname"=>"الزهراء",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Salmiya",
                "arname"=>"السالمية",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Noqra",
                "arname"=>"النقرة",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Al-Siddiq",
                "arname"=>"الصديق",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Rumaisiya",
                "arname"=>"الرميثية",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Midan Hawalli",
                "arname"=>"ميدان حولي",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Hiteen",
                "arname"=>"حطين",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Jabriya",
                "arname"=>"الجابرية",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name"=>"Mubark Abdulla Jaber",
                "arname"=>"ضاحية مبارك العبد الله الجابر",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Salwa",
                "arname"=>"سلوى",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Mishref",
                "arname"=>"مشرف",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Al-salam",
                "arname"=>"السلام",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],[
                "uuid"=>Str::uuid(),
                "name"=>"Al-shuhada",
                "arname"=>"الشهداء",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name"=>"Al-badae",
                "arname"=>"البدع",
                "govern_id"=>"7f3a14ad-e2e0-4aeb-85f9-f5dd1a4e7361",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name"=>"Adan",
                "arname"=>"العدان",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Missila",
                "arname"=>"المسيلة",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Sabhan",
                "arname"=>"صبحان",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Qusor",
                "arname"=>"القصور",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Masayle",
                "arname"=>"المسايل",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"funitees",
                "arname"=>"الفنيطيس",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Qurain",
                "arname"=>"القرين",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Abo Fatira",
                "arname"=>"أبو فطيرة",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Mubark Al-Kabeer",
                "arname"=>"ضاحية مبارك الكبير",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Sabah Al-Salem",
                "arname"=>"ضاحية صباح السالم",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Abo Hussainiya",
                "arname"=>"أبو الحصانية",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ], [
                "uuid"=>Str::uuid(),
                "name"=>"Mubarak Al-Kabeer",
                "arname"=>"مبارك الكبير",
                "govern_id"=>"6e59f43c-a667-4bf5-81d1-c574875bd391",
                "created_at"=>now(),
                "updated_at"=>now()
            ]
        ]);
    }
}
