<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'Военный инновационный технополис «ЭРА»',
            'desc' => 'ВОЕННЫЙ ИННОВАЦИОННЫЙ ТЕХНОПОЛИС «ЭРА» создан в соответствии с Указом Президента Российской Федерации от 25
            июня 2018 г.
            № 364.
            Актуальность создания Технополиса обусловлена необходимостью сокращения сроков от создания инновационных
            научных
            проектов до их реализации в виде вооружения, военной и специальной техники. Разработки будут использоваться
            не только
            для укрепления обороноспособности страны, но и в мирных целях.
            Технополис располагается на морском побережье в городе Анапа на территории общей площадью более 17 Га. В
            первом военном
            иннограде созданы привлекательные условия работы для гражданских и военных специалистов: высокотехнологичные
            испытательные лаборатории, научно-производственный корпус, дизайн-центр, развитая инфраструктура для
            исследований и
            досуга, комфортные условия проживания.
             К научно-исследовательской работе в области технологий искусственного интеллекта привлечены сотни экспертов
            из ведущих
            научных и образовательных организаций, предприятий ОПК, вузов и НИО Минобороны России.
            Более 500 организаций взаимодействует с Технополисом, среди них 80% - это предприятия оборонно-промышленного
            комплекса,
            18% - научные учреждения и 2% - некоммерческие организации.
             ДИЗАЙН-ЦЕНТР «ЛОМОНОСОВ» создан в рамках действующей государственной программы «Развитие электронной и
            радиоэлектронной промышленности на 2013-2025гг». Его деятельность направлена на
            продвижение и внедрение на предприятиях отечественных решений;',
            'user' => 'admin',
        ]);
    }
}