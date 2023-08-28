<?php
namespace App\Services;

use App\Models\bundle;
use App\Models\bundleMaterial;
use Illuminate\Support\Facades\DB;

class bundleServices
{
    protected function setVariablesBundle($data)
    {
        return[
            'name'=>$data['name'],
        ];
    }
    protected function setVariablesBundleMaterial($data,$id)
    {
        $materialsData=[];
        $no=0;
        $materials=array_filter($data['material_id']);
        foreach ($materials as $material) {
            $materialsData[$no]=["bundle_id"=>$id,"material_id"=>$material];
            $no++;
        }
        return $materialsData;
    }
    public function store($data)
    {
        DB::beginTransaction();
        try {
            $bundle=bundle::create($this->setVariablesBundle($data));
            bundleMaterial::insert($this->setVariablesBundleMaterial($data,$bundle->id));
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th;
        }
    }
    public function update($data,$id)
    {
        DB::beginTransaction();
        try {
            bundleMaterial::where('bundle_id',$id)->delete();
            bundle::find($id)->update($this->setVariablesBundle($data));
            bundleMaterial::insert($this->setVariablesBundleMaterial($data,$id));
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return $th;
        }
    }
}
