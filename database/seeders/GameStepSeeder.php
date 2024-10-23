<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameStepSeeder extends Seeder
{
    public function run()
    {
        $gameId = DB::table('games')->insertGetId([
            'title' => 'Les trésors cachés de Guillaume le Conquérant',
            'scenario' => 'Parcourez Caen à la recherche des trésors cachés',
            'user_creator_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $steps = [
            [
                'question' => 'Rendez vous à l\'église Saint Pierre située au boulevard des Alliés, la rumeur raconte que le trésor de ces lieus pieux est dissimulé à l\'intérieur de l\'objet perché sur la plus haute pointe de l\'église, de quelle forme est cet objet renfermant ces richesses ?',
                'clue' => 'fier animal chante au petit matin',
                'step_order' => 1,
                'funfact' => 'Le coq des églises est traditionnellement un symbole de vigilance',
                'game_id' => $gameId,
                'answer' => 'un coq',
                'lore' => 'L\'église a été transformée en temple de la raison de 1973 à 1795 qui est un temple athée consitant en un monument chrétien reconverti pour y organiser le culte de la raison, des hébertistes athées, puis le culte de l\'être suprême des montagnards déistes. Détruite par un obus de la marine alliée, en juin 1944, la fléche de l\'église Saint Pierre avait été reconstruite grâce à la revente des épaves américaines.'
            ],
            [
                'question' => 'A présent rendez vous dans une des plus ancienne rue de Caen, la rue du Vaugueux, ici le temps et l\'histoire ont fait leur oeuvre, métamorphosant le paysage de cette rue mysthique, on raconte qu\'un des trésors caché du Duc de Normadie serait ingénieusement dissimulé dans une des rares demeures en colombages restantes. Combien de ces deumeures reste t\'il dans cette rue ?',
                'clue' => 'impair plus petit que 10',
                'step_order' => 2,
                'funfact' => 'La rue du Vaugueux est une des plus anciennes rues de Caen',
                'game_id' => $gameId,
                'answer' => '5',
                'lore' => 'Selon Pierre-Daniel Huet, philosophe et érudit français né à Caen, Vaugueux viendrait du latin « valliculus » qui signifie petite vallée. Cette vallée constituait un des quatre faubourgs de la ville de Caen. Vaugueux tire donc le nom de ces deux particularités.'
            ],
            [
                'question' => 'Dirigez vous rue Saint Pierre, cherchez les innébranlables deumeures à pans de bois, ces majestueuses demeures agées de cinq ciècles seraient gardienne d\'un des trésor du duc de Normandie, il est de coutume de dire qu\'il serait indiqué par un X, combien de croix formés par les colombages sont présentes ?',
                'clue' => 'autant de coup de cloche lorsque le soleil est au zénith',
                'step_order' => 3,
                'funfact' => 'Les maisons à colombages sont typiques de l\'architecture normande',
                'game_id' => $gameId,
                'answer' => '12',
                'lore' => 'La Maison dite \'Parcollet\' du nom d\'un des anciens propriétaires, est la plus connue et la plus pittoresque. Elle a été classée Monument Historique en 1945 . Caractérisée par ses murs en colombage faits de boue de route mélangée à de la paille et tassée entre les pièces de bois verticales et croisées.'
            ],
            [
                'question' => 'Il vous faut à présent aller à l\'église Saint Jean, un de nos mystérieux trésor y serait dissimulé, et à en croire les rumeurs dans la partie innachevée de l\'édifice, combien de gargouilles sont présentes sur cette parite de l\'église ?',
                'clue' => 'impair plus petit que 10',
                'step_order' => 4,
                'funfact' => 'Les gargouilles servaient à l\'origine à évacuer l\'eau de pluie',
                'game_id' => $gameId,
                'answer' => '9',
                'lore' => 'Cette église est la tour de Pise de Caen ; il est en effet difficile de ne pas voir son air penché. La tour porche s\'incline en effet au nord ouest car l\'église a été construite sur un sol marécageux au sein de l\'île Saint Jean . C\'est d\'ailleurs la raison pour laquelle elle n\'est pas terminée.'
            ],
            [
                'question' => 'Remontez maintent la rue Saint Jean en direction du chateau, en son enceinte se dresse une mystérieuse église qui une fois de plus selon les rumeurs refermerait une des richesse depuis longtemps convoitées, pour espéré le trouver il vous faudra d\'abord deviner le nom de ce lieu de culte',
                'clue' => 'elle porte le même que celui qui à térassé le dragon',
                'step_order' => 5,
                'funfact' => 'Saint Georges est souvent représenté terrassant un dragon',
                'game_id' => $gameId,
                'answer' => 'Saint Georges',
                'lore' => 'Construit vers 1060 par Guillaume le Conquérant , le château ducal est devenu une résidence favorite des ducs de Normandie, rois d\'Angleterre qui lui ont donné l\'ampleur d\'une des plus vastes enceintes fortifiées d\'Europe.'
            ],
            [
                'question' => 'Il est maintenant temps de rejoindre le lieu final de cette quête l\'abbaye aux Hommes, Le plus grand trésor de Guillaume y serait dissimulé, des textes anciens suggérent qu\'il serait au plus prés des cieux, combien de grands clochers posséde l\'Abbaye aux Hommes ?',
                'clue' => 'en duo',
                'step_order' => 6,
                'funfact' => 'L\'Abbaye aux Hommes a été fondée par Guillaume le Conquérant en 1066',
                'game_id' => $gameId,
                'answer' => '2',
                'lore' => 'L\'Abbaye aux Hommes, dédiée à Saint Etienne en 1077, a probablement été fondée bien avant, vraisemblablement en 1063. En 1961, la ville de Caen rachète l\'ensemble des bâtiments . Depuis Janvier 1965, l\'Abbaye aux Hommes est devenu le siège de l\'Hôtel de ville de Caen et accueille le Conseil municipal. L\'ancienne Boulangerie a été transformée en Musée de la Nature.'
            ]
        ];

        foreach ($steps as $step) {
            $stepId = DB::table('game_steps')->insertGetId([
                'clue' => $step['clue'],
                'question' => $step['question'],
                'funfact' => $step['funfact'],
                'lore' => $step['lore'],
                'step_order' => $step['step_order'],
                'game_id' => $step['game_id'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('answers')->insert([
                'answer' => $step['answer'],
                'is_correct' => true,
                'game_step_id' => $stepId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
