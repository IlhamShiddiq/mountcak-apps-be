<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ResponseGenerator;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            $message = $validator->messages()->first();
            $response = ResponseGenerator::createApiResponse(true, 422, $message, null);
            return response()->json($response, 422);
        }

        $data = $request->all();
        $data['id'] = Uuid::uuid4();
        $data['password'] = bcrypt($data['password']);
        $data['name'] = $data['fullname'];
        $new_data = User::create($data);

        $responseContent = array(
            'user_id' => $new_data->id
        );
        $response = ResponseGenerator::createApiResponse(false, 201, "Data added successfully", $responseContent);
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_data = User::find($id);

        $responseContent = new UserResource($user_data);
        $response = ResponseGenerator::createApiResponse(false, 200, "Detail data with ID: ".$id, $responseContent);
        return response()->json($response, 200);
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
        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'gender' => 'in:L,P',
        ]);
        
        if ($validator->fails()) {
            $message = $validator->messages()->first();
            $response = ResponseGenerator::createApiResponse(true, 422, $message, null);
            return response()->json($response, 422);
        }
        
        $user_data = User::find($id);

        $data = $request->all();
        if(isset($data['fullname'])) $data['name'] = $data['fullname'];

        $user_data->update($data);

        $response = ResponseGenerator::createApiResponse(false, 200, "Data updated successfully", new UserResource($user_data));
        return response()->json($response, 200);
    }

    /**
     * Update the specified picture in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePicture(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if ($validator->fails()) {
            $message = $validator->messages()->first();
            $response = ResponseGenerator::createApiResponse(true, 422, $message, null);
            return response()->json($response, 422);
        }
        
        $user_data = User::find($id);
        $image = $request->file('image');

        if ($image) {
            if($user_data->image != "https://res.cloudinary.com/dmpdsvsye/image/upload/v1626357382/iamauser_fdzejb.jpg") {
                cloudinary()->uploadApi()->destroy($id);
            }
            $image_url = cloudinary()->upload($image->getRealPath(), ["public_id" => $id])->getSecurePath();
        }

        $user_data->update([
            'image' => $image_url
        ]);

        $response = ResponseGenerator::createApiResponse(false, 200, "Data updated successfully", new UserResource($user_data));
        return response()->json($response, 200);
    }

    public function updatePassword(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        
        if ($validator->fails()) {
            $message = $validator->messages()->first();
            $response = ResponseGenerator::createApiResponse(true, 422, $message, null);
            return response()->json($response, 422);
        }

        $user_data = User::find($id);

        $checkMatches = Hash::check($request->get('old_password'), $user_data->password);

        if(!($checkMatches)) {
            $response = ResponseGenerator::createApiResponse(true, 422, "Wrong password!", null);
            return response()->json($response, 422);
        }

        $new_pass = bcrypt($request->password);
        $user_data->update([
            'password' => $new_pass
        ]);

        $response = ResponseGenerator::createApiResponse(false, 200, "Password updated successfully", null);
        return response()->json($response, 200);
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
