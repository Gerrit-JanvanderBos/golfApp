<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateScoreRequest;
use App\Player;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(UpdateScoreRequest $request, Card $card)
    {
       for ($i = 1; $i <= 18; $i++) {
            foreach ($request->{'hole_'.$i} as $playerId => $score) {
                $player = $card->players->find($playerId);
                $player->update(['hole_'.$i => $score]);
            }
        }
    return redirect()->back();
    }



}
