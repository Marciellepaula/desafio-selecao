<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Team;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    /**
  
     * */
    private function getErrorCode($error)
    {
        if ($error->getCode() != null && $error->getCode() != 0) {
            return $error->getCode();
        } else if (isset($error->status)) {
            return $error->status;
        } else {
            return 500;
        }
    }

    /**
 
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        try {
            $timesplayers = Team::all();
            return $timesplayers;
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], 500);
        }
    }

    /**
   
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $request->validate([
                'player_id' => 'required|exists:player,id',
                'team_id' => 'required|exists:team,id'
            ]);
            $team = Team::find($request->team_id);

            if (is_null($team)) {
                return response()->json(
                    [
                        'message' => 'não é possivel inserir mais um jogador, o time está cheio'
                    ],
                    Response::HTTP_FORBIDDEN
                );
            }
            if ($team->players->count() >= 5) {
                return response()->json(
                    [
                        'message' => 'não é possivel inserir mais um jogador, o time está cheio'
                    ],
                    Response::HTTP_FORBIDDEN
                );
            }
            Team::create($request->all());
            return response()->json(["message" => "Team $request->name was successfully created"], 202);
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], $this->getErrorCode($error));
        }
    }




    /**
    
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $team = Team::find($id);

            if (!isset($team)) {
                return response()->json(["message" => "Unable to delete because we couldn't find any team with ID $id."], 404);
            }

            Team::destroy($id);

            return response()->json(["message" => "Team $team->name was deleted!"]);
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], $this->getErrorCode($error));
        }
    }
}
