<?php

use Illuminate\Database\Seeder;
use App\Choice;

class ChoicesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
        $choices = array(
            [
                'text'    => 'Yes',
                'action'  => 1,
                'type_id' => 1,
                'scene_id' => 1
            ],
            [
                'text' => 'No',
                'action' => 2,
                'type_id' => 1,
                'scene_id' => 1
            ],
            [
                'text' => 'Am I?',
                'action' => 3,
                'type_id' => 1,
                'scene_id' => 1
            ],
            [
                'text'    => 'Sugar Snaps',
                'action'  => 1,
                'type_id' => 1,
                'scene_id' => 2
            ],
            [
                'text' => 'Frosted Flakes',
                'action' => 2,
                'type_id' => 1,
                'scene_id' => 2
            ],
            [
                'text' => 'Yes',
                'action' => 3,
                'type_id' => 1,
                'scene_id' => 3
            ],
            [
                'text' => 'No',
                'action' => 3,
                'type_id' => 1,
                'scene_id' => 3
            ],
            [
                'text' => 'Go Back',
                'action' => 3,
                'type_id' => 1,
                'scene_id' => 4
            ]
        );

        foreach($choices as $choice){

            $new_choice = new Choice;
            $new_choice->text = $choice['text'];
            $new_choice->action = $choice['action'];
            $new_choice->type_id = $choice['type_id'];
            $new_choice->scene_id = $choice['scene_id'];
            $new_choice->save();

        }
    }
}


/*[
                    {
                        id : 1,
                        text: 'Yes',
                        action: 1,
                        objType: 'text'
                    },
                    {
                        id: 2,
                        text: 'No',
                        action: 2,
                        objType: 'text'
                    }
                    ,{
    id:3,
                        text: 'Am I?',
                        action: 3,
                        objType: 'text'
                    }
                ]*/
