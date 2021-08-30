<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employe;
use App\Models\Department;

class employeController extends Controller
{

	public function upload(){

		return view('upload');

	}

	//Upload Employees from XML file
	public function doUpload(Request $req)
    {
    	//Check if request is POST
        if($req->isMethod("POST")){

            //Check if file is XML
            if ($req->file->getMimeType() !== 'text/xml') {
             return back()->with('fail', 'Please SELECT only XML file');
            }

      		  $xmlDataString = file_get_contents($req->file);
            $xmlObject = simplexml_load_string($xmlDataString);
                    
            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true); 

            //Check if array of Employes in XML is not empty
           	if (!empty($phpDataArray['Employee'])) {
           		//Loop in array
           		foreach ($phpDataArray['Employee'] as $item) {

           			$dep = $item['Department'];

           			//Check if we have same department in table as one that employe has
           			$department = DB::table('department')->where('department', $dep)->first();

           			//If we have same department than take its ID if not create New department and take its ID
           			if ($department) {
           				$depValue = $department->id;
           			}else{
           				$newDep = new Department;

           				$newDep->department = $dep;
           				$saved = $newDep->save();

           				if ($saved) {
           					$depValue = $newDep->id;
           				}
           			}
           			

           			$employe = new Employe;

           			$employe->name = $item['Name'];
           			$employe->hourly_rate = $item['HourlyRate'];
           			$employe->monthly_rate = $item['MonthlyRate'];
           			$employe->department_id = $depValue;

           			$employe->save();
           		}

           		return back()->with('success', 'Emplyees Imported succesfully');
           	}else{
           		return back()->with('fail', 'There was error while importing employees');
           	}
        }

        return back()->with('fail', 'There was error while importing employees');
    }

    //Show list of all Employes
    public function list($perpage = '') {

      $paginationCount = 10; 

      //Check if perpage is defined and change value from 10 to  defined.
      if ($perpage) {
        $paginationCount = $perpage;
      }

    	$employes = Employe::simplePaginate($paginationCount);
      $departments = Department::all();

    	return view('employe', ['employes' => $employes, 'departments' => $departments]);
    }

    //Show list of all Employes
    public function departmentList($department = '') {

      $dep = Department::where('department', $department)->first();

      $employes = Employe::where('department_id', $dep->id)->get();

      return view('department', ['employes' => $employes]);
    }
}
