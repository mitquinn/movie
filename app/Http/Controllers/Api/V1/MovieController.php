<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MovieController
 * @package App\Http\Controllers\Api\V1
 * Todo: This should extend an ApiController
 * Todo: This file is rough... I am running out of time. 
 */
class MovieController extends Controller
{

    /**
     * Todo: extra this out into an ApiController.
     * @param $status
     * @param $data
     * @param int $code
     * @return JsonResponse
     */
    protected function jsonResponse($status, $data, int $code)
    {
        return response()->json([
            'status' => $status,
            'data' => $data
        ])->setStatusCode($code);
    }

    /**
     * Display a listing of the resource.
     * Todo: Add Pagination
     *
     * @return JsonResponse
     */
    public function index()
    {
        $movies = Movie::all();
        return $this->jsonResponse('success', $movies, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            //I want to do something like this but time is an issue.
            //'genre' => 'required|exists:App\Models\Genre,name',
            'runtime' => 'required|integer'
        ]);

        $movie = Movie::create($validated);

        return $this->jsonResponse('success', $movie, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return $this->jsonResponse('success', $movie, '200');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        /** @var Movie $movie */
        $movie = Movie::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            //I want to do something like this but time is an issue.
            //'genre' => 'required|exists:App\Models\Genre,name',
            'runtime' => 'integer'
        ]);

        $movie->update($validated);

        return $this->jsonResponse('success', $movie, 200);
    }

    /**
     * Remove the specified resource from storage.
     * Todo: Database constraint with ROLE will not allow to be deleted. Need to remove Roles before deleting or add SoftDeletes.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return $this->jsonResponse('success', [], 204);
    }
}
