<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package_weeks;
use App\Models\Packages;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class Package_weeksController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = new Package_weeks;
        if ($request->Package_id)
            $data = Package_weeks::where('Package_id', $request->Package_id);
        $data=$data->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $title = 'الاسابيع';
        $Package_id = $request->Package_id;
        return view('Admin.Package_weeks.index', compact( 'title', 'Package_id'));
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
//        $this->validate(
//            $request,
//            [
//                'price' => 'required',
//                'duration' => 'required',
//            ],
//            [
//                'price.required' =>'من فضلك ادخل سعر الباقه ',
//                'duration.required' =>'من فضلك ادخل مده الباقه'
//            ]
//        );
        $this->save_week($request, new Package_weeks);
        return $this->apiResponseMessage(1, 'تم اضافة الاسبوع بنجاح', 200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Package_weeks = Package_weeks::find($id);
        return $Package_weeks;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $Package_weeks = Package_weeks::find($request->id);
        $this->save_week($request, $Package_weeks);
        return $this->apiResponseMessage(1, 'تم تعديل الاسبوع بنجاح', 200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_week($request, $Package_weeks)
    {
        $Package_weeks->package_id = $request->package_id;
        $Package_weeks->week_name = $request->week_name;
        $Package_weeks->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy($id, Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $Package_weeks = Package_weeks::whereIn('id', $ids)->get();
            foreach ($Package_weeks as $row) {
                $this->deleteRow($row);
            }
        } else {
            $Package_weeks = Package_weeks::find($id);
            $this->deleteRow($Package_weeks);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Package_weeks)
    {
        $Package_weeks->delete();
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
            $options .= ' <a href="/Admin/Week_days/index?week_id=' . $data->id . '" title="الايام " class="btn btn-success waves-effect btn-circle waves-light"><i class="icon-Add"></i> </a></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('package_id', function ($data) {
            return $data->package_weeks->package_name;
        })->rawColumns(['action' => 'action', 'checkBox' => 'checkBox', 'package_id' => 'package_id'])->make(true);
    }
}
