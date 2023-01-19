<?php

namespace App\Http\Controllers;

use App\Http\Requests\BattleDestroyRequest;
use App\Http\Requests\BattleStoreRequest;
use App\Services\BattleService;
use App\Services\MonsterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class BattleController extends Controller
{

    /**
     *
     * @var $battleService
     */
    protected $battleService;

    /**
     *
     * @var $monsterService
     */
    protected $monsterService;

    /**
     * BattleService constructor.
     *
     * @param BattleService $battleService
     * @param MonsterService $monsterService
     *
     */
    public function __construct(BattleService $battleService, MonsterService $monsterService)
    {
        $this->battleService = $battleService;
        $this->monsterService = $monsterService;
    }

    /**
     * Get all battles.
     *
     * @return JsonResponse
     *
     */
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->battleService->getAllBattles()
            ],
            Response::HTTP_OK
        );
    }

    public function store(BattleStoreRequest $request): JsonResponse
    {
        $monsterA = $request->post('monsterA');
        $monsterB = $request->post('monsterB');

        $battle = $this->battleService->createBattle($monsterA, $monsterB);

        return response()->json(
            [
                'data' => $battle->winner->attributesToArray(),
            ],
            Response::HTTP_OK
        );
    }

    public function remove(BattleDestroyRequest $request): JsonResponse
    {
        $battleId = $request->route('id');
        $this->battleService->removeBattle($battleId);
        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
