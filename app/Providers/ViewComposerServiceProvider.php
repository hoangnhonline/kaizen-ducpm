<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\LoaiSp;
use App\Models\Cate;
use App\Models\Blocks;
use App\Models\Settings;
use App\Models\Text;
use App\Models\Pages;
use Session;

class ViewComposerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//Call function composerSidebar
		$this->composerMenu();	
		
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Composer the sidebar
	 */
	private function composerMenu()
	{
		
		view()->composer( '*' , function( $view ){			
	        $settingArr = Settings::whereRaw('1')->lists('value', 'name');     
	        
            //$cateList = Cate::orderBy('display_order')->get();         
        	$textList = Text::all();
        	foreach($textList as $text){
        		$textArr[$text->text_key] = $text;
        	}       	
        	
        	$tmp = Blocks::all();
        	foreach($tmp as $tp){
        		$footerArr[$tp->id] = $tp;
        	}
        	$aboutList = Pages::whereIn('id', [1,2])->get();
        	$routeName = \Request::route()->getName();
			$view->with([
				'settingArr' => $settingArr, 
				'footerArr' => $footerArr, 
				'textArr' => $textArr, 
				'aboutList' => $aboutList,
				'routeName' => $routeName
				

		]);
		});
	}
	
}
