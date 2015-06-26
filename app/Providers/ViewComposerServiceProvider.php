<?php namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

    private $layoutPartials ="";
    private $themeDirectory;

    function __construct()
    {
        $this->themeDirectory = Config::get('pages.theme');
        $partialsLayout = $this->themeDirectory."partials";
        $this->layoutPartials = $partialsLayout;
    }

    /**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeProfile();
        $this->composeNavigation();
        $this->composeSaleableLists();
        $this->composeSaleableDetail();
        $this->composeResume();
        //$this->composeContactPage();
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

    public  function composeProfile(){

        view()->composer([$this->layoutPartials."._header",
                          $this->layoutPartials."._footer",
                          $this->themeDirectory."acercade.index",
                          $this->layoutPartials.".contact_info._contact_form",
                          $this->layoutPartials.".contact_info._contact_widget"
                          ],'App\Http\ViewComposers\ProfileComposer');
    }
    public  function composeNavigation(){
        view()->composer([$this->layoutPartials."._header"],'App\Http\ViewComposers\NavigationComposer');
    }
    public function composeSaleableLists(){
        //dd($this->themeDirectory.".productos_servicios.index");
        view()->composer([
                        $this->themeDirectory.".productos_servicios.index",
                        $this->themeDirectory."productos_servicios._detail.index",
                        $this->themeDirectory."productos_servicios._detail_simple.index"

                        ],'App\Http\ViewComposers\SaleablesComposer');
    }
    public function composeSaleableDetail(){
        view()->composer([
            $this->themeDirectory."productos_servicios._detail.index",
            $this->themeDirectory."productos_servicios._detail_simple.index",
        ],'App\Http\ViewComposers\SaleableDetailComposer');
    }

    public function composeContactPage(){
        /*view()->composer([
            $this->themeDirectory."contacto.index"
        ],'App\Http\ViewComposers\ContactPageComposer');*/
    }

    /**
     * @return string
     */
    public function getLayoutPartials()
    {
        return $this->layoutPartials;
    }

    public function composeResume()
    {
        view()->composer([
            $this->themeDirectory."resume.index"
        ],'App\Http\ViewComposers\ResumeComposer');
    }

}
