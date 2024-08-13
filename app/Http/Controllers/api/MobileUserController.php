<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MobileUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobileUserController extends Controller
{

    public function getStudentProfile(Request $request)
    {
        $studentId = $request['mobile_user_id'];
        $student = MobileUser::find($studentId);

        return response()->json([
            'status' => 'success',
            'student' => $student
        ], 200);
    }

    public function editProfile(Request $request)
    {
        $data = $request->all();

        $data['it_student'] = $data['it_student'][0];
        $data['it_student'] = (boolean)$data['it_student'];

        $validator = Validator::make($data, [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,gif', 'max:10240'],
            'birth_date' => ['required', 'date', 'after:01/01/1900', 'before:today'],
            'it_student' => ['required', 'boolean'],
            'university' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'min:3', 'max: 1024'],
            'name' => ['required', 'max:250'],
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $image->move(public_path() . '/images/API_Images/profilePhotos/', $imageName);

        $user = $request->user();
        $user->update([
            'image' => $imageName,
            'birth_date' => $data['birth_date'],
            'it_student' => $data['it_student'],
            'university' => $data['university'],
            'bio' => $data['bio'],
            'name' => $data['name'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Changes Saved'
        ], 200);
    }

    public function myProfile(Request $request) {
        $user = $request->user();

        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }
}
