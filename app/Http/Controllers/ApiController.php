<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Resources\Car as CarResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::join('manufactures', 'manufactures.id', 'cars.mf_id')
                ->select('manufactures.mf_name as name_mfs', 'cars.*')
                ->paginate(5);
        if ($cars){
            return response()->json($cars, Response::HTTP_OK);
        }
        else{
            return response()->json([]);
        }


        // $cars=Car::all();
        // if(count($cars) > 0) {
        //     return response()->json(["status" => "200", "success" => true, "count" => count($cars), "data" => $cars]);
        // }
        // else {
        //     return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        // }

        // $cars = Car::all();

        // return response()->json($products, Response::HTTP_OK);
        // return CarResource::collection($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $validation = Validator::make($request->all(),
            [
                // 'hãng'=>'required',
                // 'màu'=>'required',
                // 'name'=>'required',
                // 'produced_on'=>'required|date',
                'name'=>'required',
                'decriptions'=>'required',
                'price'=>'required|integer',
                // 'image'=>'required',
                'image'=>'mimes:jpeg,jpg,png,gif|max:10000'
            ]);

            if ($validation->fails()){
                $response=array('status'=>'error','errors'=>$validation->errors()->toArray());
                return response()->json($response);
            }
        //nếu dùng $this->validate() thì lấy về lỗi: $errors = $validate->errors();

            //kiểm tra file tồn tại
            $name='';

            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $name=time().'_'.$file->getClientOriginalName();
                $destinationPath=public_path('car'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
                $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
            }

            $car= new Car();
            $car -> name = $request->name;
            $car -> decriptions = $request->decriptions;
            // $car -> name = $request->name;
            $car -> image = $name;
            $car -> price = $request->price;
            $car -> mf_id = $request->mf_id;
            $car->save();
            if($car) {
                    return response()->json(["status" => "200", "success" => true, "message" => "car record created successfully", "data" => $car]);
                }
            else {
                    return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
