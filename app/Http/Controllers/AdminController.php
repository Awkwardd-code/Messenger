<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\SubDepartment;
use App\Models\Designation;
use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use App\Models\MessengerGroup;
use App\Models\Allocation;
use Validator;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    //
    /* ==============================Dept Section==================== */
    //load
    public function departmentDashLoad(){
        $department = Department::all();
        return view('admin.departments',['department'=>$department]);
    }
    //add departments
    public function addDepartment(Request $request){
        $department = new Department;
        $department->dept_name = $request->dept_name;
        $department->save();
        return response()->json(['res'=>'Department Created Successfully!']);
    }
    //edit departments
    public function editDepartment(Request $request){
        $department = Department::find($request->id);
        $department->dept_name = $request->dept_name;
        $department->save();
        return response()->json(['res'=>'Department Updated Successfully!']);
    }
    //Delete Department
    public function deleteDepartment(Request $request){
        try{
            Department::where('id',$request->dept_id)->delete();
            SubDepartment::where('dept_id',$request->dept_id)->delete();
            Group::where('dept_id',$request->dept_id)->delete();
            return response()->json(['success'=>true,'msg'=>"Depatment Deleted Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    /* ====================================Sub Dept Section================================ */
    //load
    public function subDeptDashLoad(){
        $department = Department::all();
        $sub_department = SubDepartment::with('departments')->get();
        return view ('admin.sub_departments',['department'=>$department,'sub_department'=>$sub_department]);
    }
    //add sub departments
    public function addSubDepartment(Request $request){
        try{
            $sub_department = new SubDepartment;
            $sub_department->sub_dept_name = $request->sub_dept_name;
            $sub_department->dept_id = $request->department_id;
            $sub_department->save();
            return response()->json(['res'=>'Sub Department Created Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    //edit sub departments
    public function getDeptDetais($id){
        try{
            $sub_dept = SubDepartment::where('id',$id)->get();
            return response()->json(['success'=>true,'data'=>$sub_dept]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }

    }
    public function updateSubDept(Request $request){
        try{
            $sub_department = SubDepartment::find($request->id);
            $sub_department->sub_dept_name = $request->sub_dept_name;
            $sub_department->dept_id = $request->department_id;
            $sub_department->save();
            return response()->json(['success'=>true,'msg'=>"Sub Department Updated Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
    }
    // delete sub department
    public function deleteSubDepartment(Request $request){
        try{
            SubDepartment::where('id',$request->sub_dept_id)->delete();
            return response()->json(['success'=>true,'msg'=>"Sub Depatment Deleted Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    /* ====================================Degnation Section================================ */
    //load
    public function designationDashLoad(){
        $department = Designation::all();
        return view('admin.designations',['department'=>$department]);
    }
    //add departments
    public function addDesignation(Request $request){
        $department = new Designation;
        $department->designation = $request->designation;
        $department->save();
        return response()->json(['res'=>'Designation Created Successfully!']);
    }
    //edit designation
    public function editDesignation(Request $request){
        $department = Designation::find($request->id);
        $department->designation = $request->designation;
        $department->save();
        return response()->json(['res'=>'Designation Updated Successfully!']);
    }
    // delete designation
    public function deleteDesignation(Request $request){
        try{
            Designation::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=>"Designationn Deleted Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    /* ====================================Posts Sections================================ */
    //load
    public function postDashboardLoad(){
        $post = Post::all();
        
        return view('admin.posts',['post'=>$post]);
    }
    //add
    public function addPost(Request $request){
        try {
            //code...
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->post = $request->post;
            
            //special because it give me pera
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = 'uploads/posts/';
            $file->move($destinationPath, $fileName);
            $post->file = $fileName;

            $post->save();
            return response()->json(['success'=>'Post Uploaded Successfully']);
        } catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
    }
    //edit posts
    public function getPostDetais($id){
        try{
            $posts = Post::where('id',$id)->get();
            return response()->json(['success'=>true,'data'=>$posts]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        /* $data = "This is the data loaded from the server.";
        
        return response()->json($data); */
    }
    public function editPost(Request $request){
        $post = Post::find($request->id);

        if($request->image == ""){
            $post ->post = $request->post;
            $post ->save();
            return response()->json(['success'=>true,'res'=>'Post Updated Successfully!']);
        }else{
            $validator = Validator::make($request ->all(),[
                'image' => 'image|mimes:jpeg,jpg,png,gif',
            ]);
            if($validator->passes()){
                $post ->post = $request->post;
                //special because it give me pera
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $destinationPath = 'uploads/posts/';
                $file->move($destinationPath, $fileName);
                $post->file = $fileName;

                $post ->save();
                return response()->json(['success'=>true,'res'=>'Post Updated Successfully!']);
            }
    
            return response()->json(['error'=>$validator->errors()]);
        }

        
    }
    //deletePost
    public function deletePost(Request $request){
        try{
            Post::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=>"Post Deleted Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    /* ========================================Allocation Sections============================ */
    //load
    public function deptOfAllocations(){
        $is_active = 0 ; 
        $users = User::where('is_active',$is_active)->get();
        $designations = Designation::all();
        $departments = Department::all();
        $data = SubDepartment::all();
        $allocations = Allocation::with('departments','sub_departments','users','designations')->get();
        return view('admin.deptOfAllocation', compact('users','data','designations', 'departments','allocations'));
    }
    //get  data 
    public function getAlloctDetais($id){
        try{
            $data = SubDepartment::where('dept_id',$id)->get();
            /* return response()->json(['success'=>true,'data'=>$data]); */
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        /* $data = "This is the data loaded from the server.";
        
        return response()->json($data); */
    }
    //add
    public function addAllot(Request $request){
        try{
            $allocation = new Allocation;
            $allocation->user_id = $request->user_id;
            $allocation->departmen_id = $request->deparment_id;
            $allocation->sub_department_id = $request->sub_deparment_id;
            $allocation->designation_id = $request->designation_id;
            $user = User::find($request->user_id);
            $user->is_posted=1;
            $user->save();
            $allocation->save();
            return response()->json(['res'=>'Allocations Created Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    //edit data 
    public function getEditAlloctDetais($id){
        try{
            
            $data = SubDepartment::where('dept_id',$id)->get();
            /* return response()->json(['success'=>true,'data'=>$data]); */
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        /* $data = "This is the data loaded from the server.";
        
        return response()->json($data); */
    }
    public function getEditSubDeptDetais($id){
        try{
            $data = SubDepartment::where('dept_id',$id)->get();
            /* return response()->json(['success'=>true,'data'=>$data]); */
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        /* $data = "This is the data loaded from the server.";
        
        return response()->json($data); */
    }
    public function getAllotDetais($id){
        try{
            $allocation = Allocation::where('id',$id)->get();
            return response()->json(['success'=>true,'data'=>$allocation]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }

    }
    public function editAllocation(Request $request){
        
        try{
            $allocation = Allocation::find($request->id);
            $allocation->departmen_id = $request->deparment_id;
            $allocation->sub_department_id = $request->sub_deparment_id;
            $allocation->designation_id = $request->designation_id;
            $allocation->save();
            return response()->json(['res'=>'Allocations Updated Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        /* if($request->image == ""){
            $post ->post = $request->post;
            $post ->save();
            return response()->json(['success'=>true,'res'=>'Post Updated Successfully!']);
        }else{
            $validator = Validator::make($request ->all(),[
                'image' => 'image|mimes:jpeg,jpg,png,gif',
            ]);
            if($validator->passes()){
                $post ->post = $request->post;
                //special because it give me pera
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $destinationPath = 'uploads/posts/';
                $file->move($destinationPath, $fileName);
                $post->file = $fileName;

                $post ->save();
                return response()->json(['success'=>true,'res'=>'Post Updated Successfully!']);
            }
    
            return response()->json(['error'=>$validator->errors()]);
        } */

        
    }
    //delete
    public function deleteAllocation(Request $request){
        try{
            $allocation = Allocation::find($request->id);
            $someone = $allocation->user_id;
            $user = User::find($someone);
            $user->is_posted=0;
            $user->save();
            Allocation::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=>"Allocation Deleted Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    /* ==================================Message Groups================================== */
    //load
    //load
    public function loadMessageGroups(){
        $groups = Group::all();
        $department = Department::all();
        return view('admin.groups',['groups'=>$groups,'department'=>$department]);
    }
     //add departments
     public function addGroup(Request $request){
        $group = new Group;
        $group->name = $request->name;
        $group->dept_id = $request->department_id;
        //special because it give me pera
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $destinationPath = 'uploads/groups/';
        $file->move($destinationPath, $fileName);
        $group->image = $fileName;

        $group->save();
        return response()->json(['res'=>'Group Created Successfully!']);
    }
    //edit designation
    public function getGroupDetais($id){
        try{
            $posts = Group::where('id',$id)->get();
            return response()->json(['success'=>true,'data'=>$posts]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        /* $data = "This is the data loaded from the server.";
        
        return response()->json($data); */
    }
   
    public function editGroup(Request $request){
        $post = Group::find($request->id);

        if($request->image == ""){
            $post ->name = $request->name;
            $group->dept_id = $request->department_id;
            $post ->save();
            return response()->json(['success'=>true,'res'=>'Post Updated Successfully!']);
        }else{
            $validator = Validator::make($request ->all(),[
                'image' => 'image|mimes:jpeg,jpg,png,gif',
            ]);
            if($validator->passes()){
                $post ->name = $request->name;
                $group->dept_id = $request->department_id;
                //special because it give me pera
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $destinationPath = 'uploads/groups/';
                $file->move($destinationPath, $fileName);
                $post->image = $fileName;

                $post ->save();
                return response()->json(['success'=>true,'res'=>'Post Updated Successfully!']);
            }
    
            return response()->json(['error'=>$validator->errors()]);
        }

        
    }
    // delete designation
    public function deleteGroup(Request $request){
        try{
            $id = $request->id;
            MessengerGroup::where('group_id',$id)->delete();
            Group::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=>"Group Deleted Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    /* ====================================Messenger Groups=========================== */
    //load
    public function loadMessengerGroups(){
        $is_active = 0 ; 
        $users = User::where('is_active',$is_active && 'is_posted',$is_active)->get();
        $groups = Group::all();
        $data = MessengerGroup::selectRaw('group_id, user_id, MAX(id) as id')
            ->groupBy('group_id', 'user_id')
            ->with(['users', 'groups'])
            ->get();

        $messenger_groups = MessengerGroup::whereIn('id', $data->pluck('id'))->with(['users', 'groups'])->get();
        //$messenger_groups = MessengerGroup::with('users','groups')->get();
        return view('admin.messengerGroups', compact('users','groups','messenger_groups'));
    }
    //get  data 
    public function getUserDetais($id){
        try{
            /* $data = MessengerGroup::whereNotIn('user_id',$id)->get(); */
            $groupId = $id; 
            $data = DB::table('users')
                ->whereNotIn('id', function ($query) use ($groupId) {
                    $query->select('user_id')
                        ->from('messenger_groups')
                        ->where('group_id', $groupId);
                })
                ->get();
            
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    //add
    public function addGroupAllot(Request $request){
        try{
            $allocation = new MessengerGroup;
            $allocation->user_id = $request->user_id;
            $allocation->group_id = $request->group_id;
            $allocation->save();
            return response()->json(['res'=>'Group Allocation Created Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    //get edit data
    public function getGroupAllotDetais($id){
        try{
            $allocation = MessengerGroup::where('id',$id)->get();
            return response()->json(['success'=>true,'data'=>$allocation]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }

    }
    public function getEditUserDetais($id){
        try{
            /* $data = MessengerGroup::where('group_id',$id)->get();
            $user_id = $data->user_id;
            $user_data = User::where('id',$user_id);
            return response()->json([
                'data' => $data,
                'user_data' => $user_data,
            ]); */
            // Retrieve all groups with the specified group_id
            $group_data = MessengerGroup::where('group_id', $id)->get();

            // Extract user IDs from the data (assuming multiple records might exist)
            $user_ids = $group_data->pluck('user_id'); // Get all user IDs from the collection

            // Fetch user data for the extracted user IDs
            $user_data = User::whereIn('id', $user_ids)->get();
            $data = Arr::collapse([$group_data, $user_data]);
            /* return response()->json([
                'group_data' => $group_data,
                'user_data' => $user_data,
            ]); */
            return response()->json($user_data);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    //edit data 
    public function editUserDetais($id){
        try{
            
            $groupId = $id; 
            $data = DB::table('users')
                ->whereNotIn('id', function ($query) use ($groupId) {
                    $query->select('user_id')
                        ->from('messenger_groups')
                        ->where('group_id', $groupId);
                })
                ->get();
            
            return response()->json($data);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }
    public function editGroupAllot(Request $request){
        
        try{
            $allocation = MessengerGroup::find($request->id);
            $allocation->user_id = $request->user_id;
            $allocation->group_id = $request->group_id;
            $allocation->save();
            return response()->json(['res'=>'Group Allocations Updated Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
        
    }
    //delete
    public function deleteGroupAllocation(Request $request){
        try{
            
            MessengerGroup::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=>"Group Allocation Deleted Successfully!"]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
        
    }

    /* ==========================Profile========================= */
    public function profile()
    {
        $adminId = auth()->user()->id;
        $LoggedAdminInfo = User::find($adminId);

        if (!$LoggedAdminInfo) {
            return redirect('/')->with('fail', 'You must be logged in to access the dashboard');
        }

        return view('Messenger.profileview', [
            'LoggedAdminInfo' => $LoggedAdminInfo,
        ]);
    }
    public function edit()
    {
        
        $userId = auth()->user()->id;
        $LoggedUserInfo = User::find($userId);
    
        if (!$LoggedUserInfo) {
            return redirect('/')->with('fail', 'You must be logged in to access the dashboard');
        }
     
       
        return view('Messenger.profileedit', [
            'LoggedUserInfo' => $LoggedUserInfo,
        
        ]);
    }
    public function updateProfile(Request $request)
    {
        /* $userId = auth()->user()->id;
        $user = User::find($userId); */
        try{
            $user = User::find($request->id);
            
        
           /*  $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]); */
        
            // Update user details
            $user->name = $request->name;
            $user->phone = $request->phone_number;
            if ($request->hasFile('picture')) {
                // Delete the old profile picture if it exists
                /* if ($user->picture) {
                    Storage::disk('public')->delete($user->picture);
                } */
        
                
                //special because it give me pera
                $file = $request->file('picture');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $destinationPath = 'uploads/students/';
                $file->move($destinationPath, $fileName);
                $user->image = $fileName;
        
                
            }
            $user -> save();
           /*  $allocation->user_id = $request->user_id;
            $allocation->group_id = $request->group_id;
            $allocation->save(); */
            return response()->json(['success'=>true,'res'=>'Profile Updated Successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMassage()]);
        }
    
        /* if (!$user) {
            return redirect('/')->with('fail', 'You must be logged in to update the profile');
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update user details
        $user->name = $request->name;
        $user->phone = $request->phone_number; */
        //$user->bio = $request->bio;
    
        /* if ($request->hasFile('picture')) {
            // Delete the old profile picture if it exists
            if ($user->picture) {
                Storage::disk('public')->delete($user->picture);
            }
    
            
            //special because it give me pera
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = 'uploads/students/';
            $file->move($destinationPath, $fileName);
            $user->image = $fileName;
    
            
        } */
    
        // Save the user profile updates
        //$user->save();
    
        //return response()->json(['success'=>'Profile Updated Successfully']);
    }
     /* ====================================groups========================== */
    public function groupDestribution(){
        
        $department = Department::all();
        return view('Messenger.middle.allowcation_view',['department'=>$department]);
    }
    public function messengerGroupsView($id){
        $datas = Group::where('dept_id',$id)->get();
        return view('Messenger.middle.group_view',['datas'=>$datas]);
    }
    

}
