<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class ContactsController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Contacts::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('Admin.Contacts.index');
    }



    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Packages = Contacts::find($id);
        return $Packages;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Contacts = Contacts::find($request->id);
        $this->edit_contacts($request,$Contacts);
        return $this->apiResponseMessage(1,'تم تعديل المعلومات بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function edit_contacts($request,$Contacts){
        $Contacts->lat=$request->lat;
        $Contacts->lng=$request->lng;
        $Contacts->phone1=$request->phone1;
        $Contacts->phone2=$request->phone2;
        $Contacts->team_email=$request->team_email;
        $Contacts->help_email=$request->help_email;
        $Contacts->address=$request->address;
        $Contacts->about_program=$request->about_program;
        $Contacts->youtube=$request->youtube;
        $Contacts->save();
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function mainFunction($data)
    {
        return Datatables::of($data)->addColumn('action', function ($data) {
            $options = '<td class="sorting_1"><button  class="btn btn-info waves-effect btn-circle waves-light" onclick="editFunction(' . $data->id . ')" type="button" ><i class="fa fa-spinner fa-spin" id="loadEdit_' . $data->id . '" style="display:none"></i><i class="sl-icon-wrench"></i></button>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox'])->make(true);
    }
}
