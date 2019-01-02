<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

use App\Game;

class GamesTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Game $game)
    {
        return [
            'id' => $game->id,
            'player' => $game->player,
            'scene' => $game->scene->id,
            'question' => $game->scene->text,
            'music' => $game->scene->music->source,
            'choices' => $game->scene->choices,
            'responses' => $game->scene->responses
        ];
    }
}
