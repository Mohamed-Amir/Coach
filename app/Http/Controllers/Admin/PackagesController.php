<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Packages;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class PackagesController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Packages::get();
        if($request->Package_id)
            $data = Packages::where('Package_id',$request->Package_id)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $title='الباقات';
        $Package_id=null;
        if($request->Package_id){
            $Package=Packages::find($request->Package_id);
            $title=$Package->package_name;
            $Package_id=$request->cat_id;
        }
        return view('Admin.Packages.index',compact('title','Package_id'));
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'price' => 'required',
                'duration' => 'required',
            ],
            [
                'price.required' =>'من فضلك ادخل سعر الباقه ',
                'duration.required' =>'من فضلك ادخل مده الباقه'
            ]
        );
        $this->save_package($request,new Packages);
        return $this->apiResponseMessage(1,'تم اضافة الباقه بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Packages = Packages::find($id);
        return $Packages;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Packages = Packages::find($request->id);
        $this->save_package($request,$Packages);
        return $this->apiResponseMessage(1,'تم تعديل الباقه بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_package($request,$Packages){
        $Packages->status=$request->status;
        $Packages->package_name=$request->package_name;
        $Packages->about_package=$request->about_package;
        $Packages->price=$request->price;
        $Packages->duration=$request->duration;
        if($request->photo) {
            deleteFile('Packages',$Packages->photo);
            $Packages->photo=saveImage('Packages',$request->photo);
        }
        $Packages->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy($id,Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $Packages = Packages::whereIn('id', $ids)->get();
            foreach($Packages as $row){
                $this->deleteRow($row);
            }
        } else {
            $Packages = Packages::find($id);
            $this->deleteRow($Packages);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Packages){
        deleteFile('Packages',$Packages->image);
        $Packages->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function ChangeStatus($id,Request $request){
        $Packages = Packages::find($id);
        $Packages->status=$request->status;
        $Packages->save();
        return 1;
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
            $options .= ' <button type="button" onclick="deleteFunction(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            $options .= ' <a href="/Admin/Package_weeks/index?Package_id='.$data->id.'" title="الاسابيع " class="btn btn-success waves-effect btn-circle waves-light"><i class="icon-Add"></i> </a></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" style="cursor:pointer !important" onclick="ChangeStatus(2,'.$data->id.')" title="اضغط هنا لالغاء التفعيل">مفعل</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut" onclick="ChangeStatus(1,'.$data->id.')" style="cursor:pointer !important" title="اضغط هنا للتفعيل">غير مفعل</button>';
            return $status;
        })->editColumn('photo', function ($data) {
            $image = '<a href="'. getImageUrl('Packages',$data->photo).'" target="_blank">'
                .'<img  src="'. getImageUrl('Packages',$data->photo) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','status'=>'status','photo'=>'photo'])->make(true);
    }
}
