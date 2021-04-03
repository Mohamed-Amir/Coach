<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Week_days;
use App\Models\Package_weeks;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class Week_daysController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Week_days::where('week_id',$request->week_id)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $week_id=$request->week_id;
        return view('Admin.Week_days.index',compact('week_id'));
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
                'video' => 'required',
            ],
            [
                'video.required' =>'من فضلك ادخل فيديو اليوم ',
            ]
        );
        $this->save_Week_days($request,new Week_days);
        return $this->apiResponseMessage(1,'تم اضافة اليوم بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Week_days = Week_days::find($id);
        return $Week_days;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Week_days = Week_days::find($request->id);
        $this->save_Week_days($request,$Week_days);
        return $this->apiResponseMessage(1,'تم تعديل اليوم بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Week_days($request,$Week_days){
        $Week_days->week_id=$request->week_id;
        $Week_days->day_number=$request->day_number;
        if($request->video) {
            deleteFile('Week_days',$Week_days->video);
            $Week_days->video=saveImage('Week_days',$request->video);
        }
        $Week_days->save();
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
            $Week_days = Week_days::whereIn('id', $ids)->get();
            foreach($Week_days as $row){
                $this->deleteRow($row);
            }
        } else {
            $Week_days = Week_days::find($id);
            $this->deleteRow($Week_days);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Week_days){
        deleteFile('Week_days',$Week_days->image);
        $Week_days->delete();
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
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('video', function ($data) {
            $image = '<a href="'. getImageUrl('Week_days',$data->video).'" target="_blank">اضغط لرؤية الفيديو</a>';
            return $image;
        })->editColumn('week_id', function ($data) {
            return $data->week_days ?$data->week_days->week_name : '';
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','video'=>'video','week_id'=>'week_id'])->make(true);
    }
}
