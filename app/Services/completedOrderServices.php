<?php
namespace App\Services;

use App\Models\completedOrder;
use App\Models\materialReport;
use App\Models\order;
use Illuminate\Support\Facades\DB;
class completedOrderServices
{
    protected function setVariablesCompletedOrder($data)
    {
        return[
            'slug'=>$data['slug'],
            'order_id'=>$data['order_id'],
            'bundle_id'=>$data['bundle_id'],
            'printed_at'=>serverDate($data['printed_at']),
            'finished_at'=>serverDate($data['finished_at']),
            'author_id'=>$data['author_id'],
            'status'=>$data['status'],
            'faulty_couse'=>$data['faulty_couse']
        ];
    }
    protected function setVariablesMaterials($data)
    {
        $materials=[];
        $no=0;
        foreach ($data['material_id'] as $key => $value) {
            $materials[$no]=array(
                'order_id'=>$data['order_id'],
                "material_id"=>$key,
                "qty"=>$value[0]
            );
            $no++;
        }
        return $materials;
    }
    protected  function setVariablesOrder($data)
    {
        return [
            'statusProcess'=>"reported",
            'failed_print'=>$data['failed_print'],
            'surplus'=>$data['surplus'],
            'take_stock'=>$data['take_stock'],
        ];
    }
    public function store($data)
    {
        DB::beginTransaction();
        try {
            order::find($data['order_id'])->update($this->setVariablesOrder($data));
            completedOrder::create($this->setVariablesCompletedOrder($data));
            materialReport::insert($this->setVariablesMaterials($data));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
    public function update($data,$id)
    {
        DB::beginTransaction();
        try {
            materialReport::where('order_id',$data['order_id'])->delete();
            order::find($data['order_id'])->update($this->setVariablesOrder($data));
            completedOrder::find($id)->update($this->setVariablesCompletedOrder($data));
            materialReport::insert($this->setVariablesMaterials($data));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
