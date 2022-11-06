<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\Category;
use App\Models\Page;
use App\Models\LiveChannel;
use App\Models\Post;
use App\Models\OnlinePoll;
use App\Models\SocialItem;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();

        $top_ad_data = TopAdvertisement::where('id', 1)->first();
        $sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Top')->get();
        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Bottom')->get();

        $categories = Category::with('rSubCategory')->where('show_on_menu', 'Show')->orderBy('category_order', 'asc')->get();

        $page_data = Page::where('id', 1)->first();

        $live_channel_data = LiveChannel::get();

        $recent_news_data = Post::with('rSubCategory')->orderBy('id', 'desc')->get();

        $popular_news_data = Post::with('rSubCategory')->orderBy('visitors', 'desc')->get();

        $online_poll_data = OnlinePoll::orderBy('id', 'desc')->first();

        $social_item_data = SocialItem::get();
        
        $setting_data = Setting::where('id', 1)->first();

        view()->share('global_top_ad_data', $top_ad_data);
        view()->share('global_sidebar_top_ad', $sidebar_top_ad);
        view()->share('global_sidebar_bottom_ad', $sidebar_bottom_ad);
        view()->share('global_categories', $categories);
        view()->share('global_page_data', $page_data);
        view()->share('global_live_channel_data', $live_channel_data);
        view()->share('global_recent_news_data', $recent_news_data);
        view()->share('global_popular_news_data', $popular_news_data);
        view()->share('global_online_poll_data', $online_poll_data);
        view()->share('global_social_item_data', $social_item_data);
        view()->share('global_setting_data', $setting_data);

    }
}
