<?php

namespace App\Classes;
use Carbon\Carbon;


class PivotSDClass {


		public function pivot_Softdelete($model, $relation, $elememtId_array){

			foreach ($elememtId_array as $elementId) {
            
            	$model->$relation->updateExistingPivot($elememtId, ['deleted_at' => Carbon\Carbon::now()]);
        	
        	}	
	

		}

				

		public function pivot_restore($model, $relation, $elementId_array){

			foreach ($elememtId_array as $elementId) {
            
            	$model->$relation->updateExistingPivot($elememtId, ['deleted_at' => null]);
        	
        	}
	
		}


		public function relation($entity_namspace){

			return $this->belongsToMany($entity_namspace)->withPivot('deleted_at')->wherePivot('deleted_at', null)->withTimestamps();

		}
				
}
