<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Team;
use App\Models\Player;

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
            $teams = Team::all();
            return response()->json($teams);
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], 500);
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
            $team = Team::find($id);

            if (!isset($team)) {
                return response()->json(
                    ["message" => "Unable to find any team with ID $id."],
                    Response::HTTP_NOT_FOUND
                );
            }
            return $team;
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], $this->getErrorCode($error));
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
                'name' => 'required|unique:teams',
            ]);
            // return $request->all();
            $team = Team::create([
                'name' => $request->name
            ]);
            return response()->json(["message" => "Team $team->name was successfully created"], Response::HTTP_CREATED);
        } catch (Exception $error) {
            return response()->json(["message" => $error->getMessage()], $this->getErrorCode($error));
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $request->validate(["name" => "required|unique:teams"]);

            $team = Team::find($id);

            if (!isset($team)) {
                return response()->json(
                    ["message" => "Unable to find any team with ID $id."],
                    Response::HTTP_NOT_FOUND
                );
            }
            if ($request->all === '') {
                return response()->json(
                    ["message" => "You must send at least one field to be edited"],
                    Response::HTTP_FAILED_DEPENDENCY
                );
            }

            $team->update($request->all());

            return response()->json(["message" => "Team $team->name edited!", "data" => $team]);
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
