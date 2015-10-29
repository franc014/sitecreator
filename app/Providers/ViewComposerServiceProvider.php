<?php namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    private $layoutPartials = "";
    private $themeDirectory;

    function __construct()
    {
        $this->themeDirectory = Config::get('app_parametters.theme');
        $partialsLayout = $this->themeDirectory . "partials";
        $this->layoutPartials = $partialsLayout;
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*compose standard themes like genesis*/
        $this->composeProfile();
        $this->composeNavigation();
        $this->composeSaleableLists();
        $this->composeSaleableDetail();
        $this->composeProjectDetail();
        /*compose iptelec theme*/
        $this->composeAboutHome();
        $this->composeSaleableListsHome();

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

    public function composeProfile()
    {

        view()->composer([$this->layoutPartials . "._header",
            $this->layoutPartials . "._footer",
            $this->themeDirectory . "acercade.index",
            $this->themeDirectory . "home.index",
            $this->themeDirectory . "contacto.index",
            $this->layoutPartials . ".contact_info._contact_form",
            $this->layoutPartials . ".contact_info._contact_widget"
        ], 'App\Http\ViewComposers\ProfileComposer');
    }



    public function composeNavigation(){
        view()->composer([
            $this->layoutPartials . "._header"], 'App\Http\ViewComposers\NavigationComposer');
    }

    public function composeSaleableLists()
    {
        //dd($this->themeDirectory.".productos_servicios.index");
        view()->composer([
            $this->themeDirectory . ".productos_servicios.index",
            $this->themeDirectory . "productos_servicios._detail.index",
            $this->themeDirectory . "productos_servicios._detail_simple.index"

        ], 'App\Http\ViewComposers\SaleablesComposer');
    }

    public function composeSaleableDetail()
    {
        view()->composer([
            $this->themeDirectory . "productos_servicios._detail.index",
            $this->themeDirectory . "productos_servicios._detail_simple.index",
        ], 'App\Http\ViewComposers\SaleableDetailComposer');
    }

    public function composeContactPage()
    {
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
            $this->themeDirectory . "resume.index"
        ], 'App\Http\ViewComposers\ResumeComposer');
    }

    public function composeProjectDetail()
    {
        view()->composer([
            $this->themeDirectory . "portfolio._detail.index",

        ], 'App\Http\ViewComposers\ProjectDetailComposer');
    }

    /* compose theme ip telecom*/
    public function composeAboutHome()
    {

        view()->composer([
            $this->themeDirectory . "main.partials._marketing",

        ], 'App\Http\ViewComposers\ProfileComposer');
    }

    public function composeSaleableListsHome()
    {
        //dd($this->themeDirectory . "main.partials.projects");
        view()->composer([
            $this->themeDirectory . "main.partials._productos_servicios"

        ], 'App\Http\ViewComposers\SaleablesComposer');
    }
}
