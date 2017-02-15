<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\EmailEditRequest;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\Response;
use App\Newsletter;
use Datatables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Text;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

 

class NewsletterController extends AdminController {
    
    public function index() {
    
        $query = DB::table('newsletters');
         if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->Where('email', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }

             
        $Data = $query->paginate(5);
        return view('admin.newsletter.index', compact('Data'));   
    }
    
     
        public function newsletterdelete($id) {
         if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);
        $Data = Newsletter::find($id);
        $Data->delete();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Subscription deleted successfully!.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/newsletter/index');
    }                       
      
      
    public function getdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('newsletters')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
          Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Selected Subscription deleted successfully!');
        Session::flash('flash_type', 'alert-success');   
            return ['success' => true, 'data' => $Data];
        }
    }
 public function csvdownload() {
//            $Newsletter = Newsletter::all();
//         $output = implode(",", array('id', 'email', 'created_at'));
// foreach ($Newsletter as $row) {
//        $output .=  implode(",", array($row['id'], $row['email'] , $row['created_at'])); // append each row
//    }
// $headers = array(
//        'Content-Type' => 'text/csv',
//        'Content-Disposition' => 'attachment; filename="newsletter.csv"',
//        );
//  return Response::make ($output, $headers);
     
      ob_end_clean();
        ob_start();
        Excel::create('Fabmap Newsletter', function($excel) {
            $excel->sheet('Productos', function($sheet) {

              //  $query = Newsletter::with('emailid');
             
              //  $Newsl = Newsletter::get();
                $query = Newsletter::with('Newsletter');
                $query =$query->select('Email');
                $Newsl = $query->get();
                
                
               // print_r($Newsl);die;
                $sheet->fromArray($Newsl);

                // $sheet->mergeCells('A1:B1');
                // 
            });
        })->export('xlsx');
    
    
}
     
    
}