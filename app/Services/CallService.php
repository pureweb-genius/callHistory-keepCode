<?php

namespace App\Services;


use App\Models\Call;
use App\Models\CallOperator;
use App\Models\Tariff;
use App\Repositories\CallRepository;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CallService
{
    protected CallRepository $callRepository;
    public function __construct(CallRepository $callRepository)
    {
        $this->callRepository = $callRepository;
    }

    public function getAll()
    {
        // Retrieve all calls with information about associated users and operators
        $calls = Call::with(['userFrom', 'userTo', 'operators'])->get();


        // Process the call data, adding user and operator names
        return $calls->map(function ($call) {
            $call->userFromName = $call->userFrom->name;
            $call->userToName = $call->userTo->name;
            $call->from_operator_name = $call->operators->first()->from->name;
            $call->to_operator_name = $call->operators->first()->to->name;

            return $call;
        });
    }

    public function getModelById($id)
    {
        $model = $this->callRepository->find($id);
        if (! $model) throw new NotFoundHttpException();

        return $model;
    }

    /**
     * @throws \Exception
     */
    public function store(array $data)
    {
        // Calculate call cost using the getTariffBetweenOperators method
        $cost = Tariff::getTariffBetweenOperators($data['from_operator'], $data['to_operator'], $data['duration']);

        DB::beginTransaction();
        try {
            // Create a Call object using repository
            $call = $this->callRepository->create([
                'call_from' => $data['call_from'],
                'call_to' => $data['call_to'],
                'duration' => $data['duration'],
                'cost' => $cost,
            ]);


            // Create a CallOperator object
            CallOperator::create([
                'call_id' => $call->id,
                'from_operator' => $data['from_operator'],
                'to_operator'=> $data['to_operator'],
            ]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }

    }

    /**
     * @throws \Exception
     */
    public function update($id, array $data)
    {
        DB::beginTransaction();

        try {
            $call = $this->callRepository->update($id,$data);
            DB::commit();
            return $call;
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy($id)
    {
        return $this->callRepository->destroy($id);
    }


}
