<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'username' => env('ADMIN_USERNAME', 'admin'),
           'password' => env('ADMIN_PASSWORD_HASH', '$2y$10$sxYNd8CvZwHdRq0OhuP8LubQbp/pht4OQ4Owiz9iVL8GqUN7ox3Em') // "password"
        ]);

        DB::table('regions')->insert([
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Hlavní město Praha'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Středočeský kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Jihočeský kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Plzeňský kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Karlovarský kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Ústecký kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Liberecký kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Královéhradecký kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Pardubický kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Kraj Vysočina'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Jihomoravský kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Olomoucký kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Moravskoslezský kraj'],
           ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Zlínský kraj']
        ]);

        DB::table('parties')->insert([
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'ANO 2011', 'short_name' => 'ANO'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Občanská demokratická strana', 'short_name' => 'ODS'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Starostové a nezávislí', 'short_name' => 'STAN'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => '', 'short_name' => 'KDU-ČSL'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Svoboda a přímá demokracie', 'short_name' => 'SPD'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => '', 'short_name' => 'TOP 09'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Česká pirátská strana', 'short_name' => 'Piráti'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Česká strana sociálně demokratická', 'short_name' => 'ČSSD'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Komunistická strana Čech a Moravy', 'short_name' => 'KSČM'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Strana zelených', 'short_name' => 'Zelení']
        ]);

        DB::table('educations')->insert([
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Základní vzdělání'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Střední vzdělání'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Vyšší odborné vzdělání'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'name' => 'Vysokoškolské vzdělání']
        ]);

        DB::table('budget_capitols')->insert([
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 301, 'name' => 'Kancelář prezidenta republiky'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 302, 'name' => 'Poslanecká sněmovna Parlamentu'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 303, 'name' => 'Senát Parlamentu'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 304, 'name' => 'Úřad vlády České republiky'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 305, 'name' => 'Bezpečnostní informační služba'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 306, 'name' => 'Ministerstvo zahraničních věcí'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 307, 'name' => 'Ministerstvo obrany'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 308, 'name' => 'Národní bezpečnostní úřad'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 309, 'name' => 'Kancelář veřejného ochránce práv'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 312, 'name' => 'Ministerstvo financí'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 313, 'name' => 'Ministerstvo práce a sociálních věcí'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 314, 'name' => 'Ministerstvo vnitra'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 315, 'name' => 'Ministerstvo životního prostředí'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 317, 'name' => 'Ministerstvo pro místní rozvoj'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 321, 'name' => 'Grantová agentura České republiky'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 322, 'name' => 'Ministerstvo průmyslu a obchodu'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 327, 'name' => 'Ministerstvo dopravy'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 328, 'name' => 'Český telekomunikační úřad'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 329, 'name' => 'Ministerstvo zemědělství'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 333, 'name' => 'Ministerstvo školství, mládeže a tělovýchovy'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 334, 'name' => 'Ministerstvo kultury'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 335, 'name' => 'Ministerstvo zdravotnictví'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 336, 'name' => 'Ministerstvo spravedlnosti'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 343, 'name' => 'Úřad pro ochranu osobních údajů'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 344, 'name' => 'Úřad průmyslového vlastnictví'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 345, 'name' => 'Český statistický úřad'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 346, 'name' => 'Český úřad zeměměřický a katastrální'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 348, 'name' => 'Český báňský úřad'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 349, 'name' => 'Energetický regulační úřad'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 353, 'name' => 'Úřad pro ochranu hospodářské soutěže'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 355, 'name' => 'Ústav pro studium totalitních režimů'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 358, 'name' => 'Ústavní soud'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 359, 'name' => 'Úřad Národní rozpočtové rady'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 361, 'name' => 'Akademie věd České republiky'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 362, 'name' => 'Národní sportovní agentura'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 371, 'name' => 'Úřad pro dohled nad hospodařením politických stran a politických hnutí'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 372, 'name' => 'Rada pro rozhlasové a televizní vysílání'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 373, 'name' => 'Úřad pro přístup k dopravní infrastruktuře'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 374, 'name' => 'Správa státních hmotných rezerv'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 375, 'name' => 'Státní úřad pro jadernou bezpečnost'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 376, 'name' => 'Generální inspekce bezpečnostních sborů'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 377, 'name' => 'Technologická agentura České republiky'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 378, 'name' => 'Národní úřad pro kybernetickou a informační bezpečnost'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 381, 'name' => 'Nejvyšší kontrolní úřad'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 396, 'name' => 'Státní dluh'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 397, 'name' => 'Operace státních finančních aktiv'],
            ['created_at' => 'now()', 'updated_at' => 'now()', 'number' => 398, 'name' => 'Všeobecná pokladní správa']
        ]);
    }
}
