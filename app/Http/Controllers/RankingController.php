<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;

class RankingController extends Controller
{
    /**
    
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        $matches = Game::all();
        
        $teams = array();
        foreach ($matches as $match) {
            if (!isset($teams[$match->team1])) {
                $teams[$match->team1]['goals'] = 0;
                $teams[$match->team1]['matches_won'] = 0;
                $teams[$match->team1]['matches_lost'] = 0;
                $teams[$match->team1]['matches_draw'] = 0;
                $teams[$match->team1]['points'] = 0;
                $teams[$match->team1]['team'] = $match->team1;
            }
            if (!isset($teams[$match->team2])) {
                $teams[$match->team2]['goals'] = 0;
                $teams[$match->team2]['matches_won'] = 0;
                $teams[$match->team2]['matches_lost'] = 0;
                $teams[$match->team2]['matches_draw'] = 0;
                $teams[$match->team2]['points'] = 0;
                $teams[$match->team2]['team'] = $match->team2;
            }

            $teams[$match->team1]['goals'] += $match->team1_score;
            $teams[$match->team2]['goals'] += $match->team2_score;


            if ($match->team1_score > $match->team2_score) {
                $teams[$match->team1]['points'] +=3;
                $teams[$match->team1]['matches_won'] += 1;
                $teams[$match->team2]['matches_lost'] += 1;
            } else if ($match->team1_score < $match->team2_score) {
                $teams[$match->team2]['points'] += 3;
                $teams[$match->team2]['matches_won'] += 1;
                $teams[$match->team1]['matches_lost'] += 1;
            } else if ($match->team1_score == $match->team2_score) {
                $teams[$match->team2]['matches_draw'] += 1;
                $teams[$match->team1]['matches_draw'] += 1;
            }
        }


        $ranking = array();
        foreach($teams as $key => $position){
            $position['team'] = Team::find($key); 
            $ranking[$key] = $position;
        }
        // return $ranking;

        return $this->orderResults($ranking);
    }

    /**
   
     *
     * @param  array $array
     * @return array
     */
    private function orderResults($results)
    {
        array_multisort(array_column($results, 'points'), SORT_DESC, $results);

        $orderedResults = array();

        foreach ($results as $key => $result) {

            $data = $result;
            $data['position'] = $key + 1;

            array_push($orderedResults, $data);
        }


        return $orderedResults;
    }
}
