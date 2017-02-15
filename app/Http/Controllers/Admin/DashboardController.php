<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Video;
use App\VideoAlbum;
use App\Photo;
use App\PhotoAlbum;
use Illuminate\Support\Facades\Session;
class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
		 	
	}
        $title = "Dashboard";
        $news = Article::count();
        $newscategory = ArticleCategory::count();
        $users = User::count();
        $photo = Photo::count();
        $photoalbum = PhotoAlbum::count();
       // $video = Video::count();
      //  $videoalbum = VideoAlbum::count();
        return view('admin.dashboard.index',  compact('title','news','newscategory','photo',
            'photoalbum','users'));
//		return view('admin.dashboard.index',  compact('title','news','newscategory','video','videoalbum','photo',
//            'photoalbum','users'));
	}
}