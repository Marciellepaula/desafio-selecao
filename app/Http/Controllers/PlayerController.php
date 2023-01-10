<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Http\Response;

class PlayerController extends Controller
{


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
    
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        try {
            $players = Player::with('team')->get();
            // return view('player.listAll')->with('players',$players);'
            return response()->json([
                'message' => 'Sucesso',
                'players' => $players,
            ]);
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'string|required',
                'tshirt_number' => 'numeric|required',
                'cpf' => 'required|unique:players'
            ]);


            Player::create($request->all());

            return response()->json(
                ["message" => "Player $request->name was successfully created"],
                Response::HTTP_CREATED
            );
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], 424);
        }
    }

    /**
 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listByID($id)
    {
        try {
            $player = Player::find($id);

            if (!isset($player)) {
                return response()->json(["message" => "Unable to find any player with ID $id."], 404);
            }
            return $player;
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], $this->getErrorCode($error));
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'string|required',
                'tshirt_number' => 'numeric|required',
            ]);

            $player = Player::find($id);

            if (!isset($player)) {
                return response()->json(["message" => "Unable to find any player with ID $id."], 404);
            } else {
                $player->update([
                    'name' => $request->name,
                    'tshirt_number' => $request->tshirt_number
                ]);

                return response()->json([
                    'message' => "Usuario editado com sucesso",
                    'data' => $player,
                ]);
            }
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
            $player = Player::find($id);

            if (!isset($player)) {
                return response()->json(["message" => "Unable to delete because we couldn't find any player with ID $id."], 404);
            }

            Player::destroy($id);

            return response()->json(["message" => "Player $player->name was deleted!"]);
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], $this->getErrorCode($error));
        }
    }
}
