<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SystemUser;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Services\UserService;
use App\Http\Controllers\Services\FromNumToTextController;
use App\Http\Controllers\Services\RegistryService;
use App\Models\Registry;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * [Description for index]
     *
     * @return [type]
     *
     */
    public function index()
    {
        try {
            // return Registry::Employees();
            $employees = User::with(['system', 'profile'])->Employee()->get();
            $employees = UserService::deleteDependsAccount($employees);
            //return $employees;
            return view('employees.list')->with([
                'employees' => $employees,
                'fNTT' => new FromNumToTextController(),
                'registries' => Registry::Employees()
            ]);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا يرجى مراجعة الدعم الفني  ']);
        }
    }
    /**
     * [Used to return view of create new employee]
     *
     * @return [type]
     *
     */
    public function create()
    {
        return view('employees.add');
    }

    public function resetPassword(Request $request)
    {
        // return 123;
        Validator::validate(
            $request->all(),
            [
                'newUsername' => 'required|string|min:3|max:50',
                'password' => 'required|same:password_confirmation|min:5|max:50',
                'password_confirmation' => 'required|min:5|max:50',
            ],
            [
                'newUsername.required' => 'يجب تعبئت اسم المستخدم الجديد',
                'newUsername.min' => 'يجب ان يكون اسم المستخدم اكثر 3 احرف',
                'newUsername.max' => 'يجب ان يكون اسم المستخدم اقل من 50 حرف',
                'password.required' => 'يجب تعبئت كلمة المرور',
                'password.min' => 'يجب ان تكون كلمة المرور اكثر 5 احرف',
                'password.max' => 'يجب ان تكون كلمة المرور اقل من 50 حرف',
                'password.same' => 'يجب ان تكون كلمة المرور متساوية مع اعادة كلمة المرور',
                'password_confirmation.required' => 'يجب تعبئت اعدة كتابة كلمة المرور الجديدة',
                'password_confirmation.min' => 'يجب ان تكون اعدة كتابة كلمة المرور اكثر 5 احرف',
                'password_confirmation.max' => 'يجب ان تكون اعدة كتابة كلمة المرور اقل من 50 حرف',
            ]
        );
        try {
            $systemUser = User::find(Auth::id());
            $systemUser->username = $request->newUsername;
            $systemUser->password = Hash::make($request->password);
            $systemUser->update();

            return $this->logout();

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error','هناك خطأ يرجى مراجعة الدعم الفني']);
        }
    }


    /**
     * [Description for register]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'username' => 'required|string|max:255|unique:system_users',
        //     'password' => 'required|string|min:6',
        // ]);
        // try {
            $account = new UserService();
            $systemUser = new SystemUser();
            if ($account->checkUserIsExisted(trim($request->name), 1, $request->role && $account->checkUserIsExisted(trim($request->name), 0, $request->role))) {
                return redirect()->route('listEmployee')->with(['error' => 'هذا العامل لديه حساب']);
            }
            if ($this->checkUsernameIsExisted($request->username)) {
                return redirect()->route('listEmployee')->with(['error' => 'يرجى تغيير اسم المستخدم']);
            }

            if ($account->checkedUserHaveProfile($request->name)) {
                return redirect()->route('listEmployee')->with(['error' => 'هذا العامل لديه ملف شخصي من قبل']);
            }

            // create petrol & diesel accounts for system users
            $user = $account->givenUserAccountant($request->name, 0, $request->role);
            $user2 = $account->givenUserAccountant($request->name, 1, $request->role);

            // create username & password for system users accounts
            $systemUser->username = $request->username;
            $systemUser->password = Hash::make($request->password);
            $systemUser->user_id = $user->id;
            $systemUser->save();

            // create profile for system users
            $newUserProfile = new UserProfile();
            $newUserProfile->user_id = $user->id;
            $newUserProfile->phone = $request->phone;
            $newUserProfile->address = $request->address;
            $newUserProfile->save();

            RegistryService::create(1, 9, $user->id);

            return redirect()->route('listEmployee')->with(['success' => 'تم اضافة الموظف بنجاح']);
        // } catch (\Throwable$th) {
        //     return redirect()->route('listEmployee')->with(['error' => 'عذرا لم تتم إضافة الموظف يرجى مراجعة الدعم الفني']);
        // }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('username', 'password');
        // return redirect()->back()->with(['success'=> 'تبا لك']);

        $token = Auth::attempt($credentials);
        return Auth::user()->user->name;
        if (!$token) {
            return redirect()->back()->with(['success'=> 'تبا لك']);
        }
        // $user = Auth::user();
        // return $user;
        return redirect()->route('listAll');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ],
        ]);
    }

    public function checkUsernameIsExisted($username)
    {
        $systemUser = SystemUser::where('username', $username)->first();
        return $systemUser ? true : false;
    }

    /**
     * [Description for update]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function update(Request $request)
    {
        try{
            //update Name
            if(UserService::updateEmployeeName($request->id,$request->name,$request->role)!=1)
                return redirect()->back()->with(['error' => 'عذرا هناك خطاء في تحديث الاسم']);
            //update user profile
            if(UserService::updateProfile($request->id,$request->phone,$request->address)!=1)
                return redirect()->back()->with(['error' => 'عذرا هناك خطاء في تحديث الملف الشخصي']);
            return redirect()->back()->with(['success' => 'تم اضافة تحديث الموظف بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا يرجى مراجعة الدعم الفني  ']);
        }
    }

    /**
     * [Description for toggle]
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function toggle(Request $request)
    {
        try{
            $id = (int)$request->id;
            $employee = SystemUser::where('user_id',$id)->first();
            $employee->is_active*=-1;
            $employee->update();
            if($employee->is_active == 1)
                RegistryService::create(10, 9, $id);
            else
                RegistryService::create(9, 9, $id);

            return redirect()->back()->with(['success' => 'تم تبديل حالة الموظف بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا يرجى مراجعة الدعم الفني  ']);
        }
    }
}
