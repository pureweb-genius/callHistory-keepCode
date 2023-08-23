<?php

namespace App\Services;


use App\Models\Call;
use App\Models\CallOperator;
use App\Models\Operator;
use App\Models\Tariff;
use App\Repositories\CallRepository;
use App\Repositories\OperatorRepository;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OperatorService
{
   //OperatorRepository
    protected OperatorRepository $operatorRepository;
    public function __construct(OperatorRepository $operatorRepository)
    {
        $this->operatorRepository = $operatorRepository;
    }

    public function getAll()
    {
       return $operators = Operator::all();
    }

    public function getModelById($id)
    {
        $model = $this->operatorRepository->find($id);
        if (! $model) throw new NotFoundHttpException();

        return $model;
    }

    /**
     * @throws \Exception
     */
    public function store($data)
    {
        DB::beginTransaction();
        try {
            $data = $data->validate([
                'name' => 'required|string',
                'prefix' => 'required|string',
            ]);

            $this->operatorRepository->create($data);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }

    }

    public function destroy($id)
    {
        //find current operator
        $operator = $this->getModelById($id);

        //delete related calls to calls from
        $this->deleteRelatedCalls($operator->callsTo);
        $this->deleteRelatedCalls($operator->callsFrom);

        return $this->operatorRepository->destroy($id);
    }


    private function deleteRelatedCalls($calls)
    {
        foreach ($calls as $call) {
            $call->delete();
        }
    }


}
