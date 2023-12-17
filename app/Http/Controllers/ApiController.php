<?php

namespace App\Http\Controllers;

use App\Common\Helper;
use App\Models\BaseModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $model;
    /** @var BaseModel $modelObj */
    public $modelObj;

    public function __construct()
    {
        $this->modelObj = new $this->model;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $modelValidator = call_user_func($this->model . '::getQueryValidator');
        $callback = function ($request) {
            return $this->handleIndex($request);
        };
        return $this->validateCustom($request, $modelValidator, $callback);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response
    {
        // TODO: missing permission check
        $result = $this->currentQuery()
            ->with($this->modelObj->showingRelations)
            ->where($this->modelObj->queryBy, $id)
            ->orWhere('id', $id)
            ->select($this->modelObj->getAliasArray())
            ->first();
        return Helper::getResponse($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return Helper::getResponse(null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id): Response
    {
        return Helper::getResponse(null, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id): Response
    {
        return $this->handleDestroy($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        // TODO: missing permission check
        $modelValidator = call_user_func($this->model . '::getInsertValidator', $request);
        $callback = function ($request) {
            return $this->handleStore($request);
        };
        return $this->validateCustom($request, $modelValidator, $callback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        // TODO: should apply this record-permission-checking on other actions as well
        //        if (!$this->modelObj->checkPermission($id)) {
        //            return Helper::getResponse(null, 'Not allowed', 403);
        //        }
        $modelValidator = call_user_func($this->model . '::getUpdateValidator', $request, $id);
        $callback = function ($request) use ($id) {
            return $this->handleUpdate($request, $id);
        };
        return $this->validateCustom($request, $modelValidator, $callback);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handleIndex(Request $request): Response
    {
        $result = $this->modelObj->queryWithCustomFormat($request);
        return Helper::getResponse($result);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handleStore(Request $request): Response
    {
        $result = $this->modelObj->insertWithCustomFormat($request);
        return Helper::getResponse($result);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function handleUpdate(Request $request, $id): Response
    {
        $result = $this->modelObj->updateWithCustomFormat($request, $id);
        return Helper::getResponse($result);
    }

    /**
     * @param $id
     * @return Response
     */
    public function handleDestroy($id): Response
    {
        $result = $this->modelObj->destroyWithCustomFormat($id);
        return Helper::getResponse($result);
    }

    /**
     * @return Builder
     */
    private function currentQuery(): Builder
    {
        return call_user_func($this->model . '::query');
    }

    /**
     * @param $input
     * @param $rule
     * @param $callback
     * @return Response
     */
    public function validateCustom($input, $rule, $callback): Response
    {
        $validator = Validator::make($input->all(), $rule);
        try {
            $validator->validate();
            return $callback($input);
        } catch (ValidationException $e) {
            return response([
                'error' => $validator->errors()->first()
            ], 400);
        }
    }
}
