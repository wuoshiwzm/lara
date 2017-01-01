<?php
namespace App\Http\Controllers\Home;

use App\Http\Model\Navs;
use App\Http\Model\Article;
use App\Http\Model\Article1;
use App\Http\Model\Article2;
use App\Http\Model\Links;
use App\Http\Model\Category;
use App\Http\Model\Category1;
use App\Http\Model\Category2;
use App\Http\Model\Mpic;
use App\Http\Model\Spic;
use App\Http\Model\MainMedia;
use App\Http\Model\Company;
use App\Http\Model\Recm;
use App\Http\Model\Recm1;
use App\Http\Model\News;
use App\Http\Model\Offer;
use Illuminate\Support\Facades\Input;


class IndexController extends CommonController
{


    public function index()
    {
        //大横幅
        $mpic = Mpic::orderBy('mpic_order')->get();
        //小横幅
        $spic = Spic::orderBy('spic_order')->get();
        //最新入驻公司
        $company = Company::orderBy('updated_at')->limit(7)->get();
        //主流媒体
        $main_media = MainMedia::orderBy('main_media_order')->get();

        //精品推荐
        $recm_content = Recm::orderBy('recm_order', 'asc')->get();
        $recm = [];
        foreach ($recm_content as $k) {
            $artIdArr = explode(',', $k->recm_content);
            $name = $k->recm_name;
            foreach ($artIdArr as $a) {
                $cont[] = Article::find($a);
            }
            $recm[] = [$name => $cont];
            $cont = [];
        }
        $cont = [];

        //设计推荐
        $recm_content1 = Recm1::orderBy('recm_order', 'asc')->get();
        $recm1 = [];
        foreach ($recm_content1 as $k) {
            $artIdArr = explode(',', $k->recm_content);
            $name = $k->recm_name;
            foreach ($artIdArr as $a) {
                if($k->recm_type == 0)
                {
                    $cont[] = Article1::find($a);
                }
                else
                {
                    $cont[] = Article2::find($a);
                }
            }
            $recm1[] = [$name => $cont,'recm_type' => $k->recm_type];
            $cont = [];
        }


        //新闻
        $news = News::limit(5)->get();

        //求购
        $offer = Offer::limit(6)->get();


        // dd($recm1);

        return view('home.index')
            ->with('mpic', $mpic)
            ->with('spic', $spic)
            ->with('company', $company)
            ->with('main_media', $main_media)
            ->with('recm', $recm)
            ->with('recm1', $recm1)
            ->with('news', $news)
            ->with('offer', $offer);
    }

    public function dcate()
    {
        $cate_id = Category::first()->cate_id;
        return $this->cate($cate_id);
    }

    public function dcate1()
    {
        $cate_id = Category1::first()->cate_id;
        return $this->cate1($cate_id);
    }

    public function dcate2()
    {
        $cate_id = Category2::first()->cate_id;
        return $this->cate2($cate_id);
    }

    /**
     * @param $cate_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回广告分类
     */
    public function cate($cate_id)
    {

        //highlight the  cate you choose
        $cates = (new Category)->ccates();

        $allCates = (new Category)->frontCate();

        $allChild = (new Category)->scanChild($cate_id);
        $childId = [];
        foreach ($allChild as $k => $v) {
            $childId[] = $v['cate_id'];
        }
        $data = Article::whereIn('cate_id', $childId)->orderBy('art_view', 'desc')->paginate(10);
        //the 4 article most views


        // the child categorys
        $submenu = Category::where('cate_pid', $cate_id)->get();

        // increment the view time of categorys
        Category::where('cate_id', $cate_id)->increment('cate_view', 1);

        $field = Category::find($cate_id);
        return view('home/cate_show', compact('field', 'data', 'submenu', 'allCates', 'allChild', 'cate_id'));
    }

    /**
     * @param null $cate_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * return 设计分类
     */
    public function cate1($cate_id = null)
    {

        //highlight the  cate you choose
        $allCates = (new Category1)->frontCate();
        $allChild = (new Category1)->scanChild($cate_id);
        // array_shift($allChild);
        $childId = [];
        foreach ($allChild as $k => $v) {
            $childId[] = $v['cate_id'];
        }
        $data = Article1::whereIn('cate_id', $childId)->orderBy('art_view', 'desc')->paginate(10);

        // the child categorys
        $submenu = Category1::where('cate_pid', $cate_id)->get();

        // increment the view time of categorys
        Category1::where('cate_id', $cate_id)->increment('cate_view', 1);

        $field = Category1::find($cate_id);

        return view('home/cate_show1', compact('field', 'data', 'submenu', 'allCates', 'allChild', 'cate_id'));
    }

    /**
     * @param null $cate_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回策划分类
     */
    public function cate2($cate_id = null)
    {

        //highlight the  cate you choose
        $allCates = (new Category2)->frontCate();
        $allChild = (new Category2)->scanChild($cate_id);
        $childId = [];
        foreach ($allChild as $k => $v) {
            $childId[] = $v['cate_id'];
        }
        $data = Article2::whereIn('cate_id', $childId)->orderBy('art_view', 'desc')->paginate(10);

        // the child categorys
        $submenu = Category2::where('cate_pid', $cate_id)->get();

        // increment the view time of categorys
        Category2::where('cate_id', $cate_id)->increment('cate_view', 1);

        $field = Category2::find($cate_id);
        // dd($field);
        return view('home/cate_show2', compact('field', 'data', 'submenu', 'allCates', 'allChild', 'cate_id'));
    }


    /**
     * @param $art_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回广告资源
     */
    public function article($art_id)
    {
        $field = Article::Join('category', 'category.cate_id', '=','article.cate_id')
            ->where('art_id', $art_id)->first();


        //检查对应cate_id是否还存在， 如果不存在就导向主页

//
        if(!$field)
        {


            $field =  Article::where('art_id', $art_id)->first();
        }
        $cate_info = Category::find($field->cate_id);
        $article['pre'] = Article::where('art_id', '<', $art_id)->orderBy('art_id', 'desc')->first();
        $article['next'] = Article::where('art_id', '>', $art_id)->orderBy('art_id', 'asc')->first();
        $data = Article::where('cate_id', $field->cate_id)->orderBy('art_view', 'desc')->take(6)->get();
        $new = Article::where('cate_id', $field->cate_id)->orderBy('art_id', 'desc')->take(6)->get();

        //add view times
        Article::where('art_id', $art_id)->increment('art_view', 1);

        return view('home/new', compact('field', 'article', 'data', 'new', 'cate_info'));
    }

    /**
     * @param $art_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回设计资源
     */
    public function article1($art_id)
    {
        $field = Article1::Join('category1', 'article1.cate_id', '=', 'category1.cate_id')
            ->where('art_id', $art_id)->first();

        if(!$field)
        {
            $field =  Article1::where('art_id', $art_id)->first();
        }


        $cate_info = Category1::find($field->cate_id);
        $article['pre'] = Article1::where('art_id', '<', $art_id)->orderBy('art_id', 'desc')->first();
        $article['next'] = Article1::where('art_id', '>', $art_id)->orderBy('art_id', 'asc')->first();
        $data = Article1::where('cate_id', $field->cate_id)->orderBy('art_view', 'desc')->take(6)->get();
        $new = Article1::where('cate_id', $field->cate_id)->orderBy('art_id', 'desc')->take(6)->get();

        //add view times
        Article1::where('art_id', $art_id)->increment('art_view', 1);

        return view('home/new1', compact('field', 'article', 'data', 'new', 'cate_info'));
    }


    /**
     * @param $art_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回策划资源
     */
    public function article2($art_id)
    {
        $field = Article2::Join('category2', 'article2.cate_id', '=', 'category2.cate_id')
            ->where('art_id', $art_id)->first();
        if(!$field)
        {
            $field =  Article1::where('art_id', $art_id)->first();
        }


        $cate_info = Category2::find($field->cate_id);
        $article['pre'] = Article2::where('art_id', '<', $art_id)->orderBy('art_id', 'desc')->first();
        $article['next'] = Article2::where('art_id', '>', $art_id)->orderBy('art_id', 'asc')->first();
//        $data = Article2::where('cate_id', $field->cate_id)->orderBy('art_view', 'desc')->take(6)->get();
//        $new = Article2::where('cate_id', $field->cate_id)->orderBy('art_id', 'desc')->take(6)->get();

        //add view times
        Article2::where('art_id', $art_id)->increment('art_view', 1);

        return view('home/new2', compact('field', 'article', 'cate_info'));
    }

    /**
     * @param null $news_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回新闻分类
     */
    public function newsAll()
    {

        //highlight the  cate you choose
        $data = News::orderBy('updated_at', 'desc')->paginate(10);;
        return view('home/news_all', compact('data'));
    }

    /**
     * 返回新闻内容
     */
    public function news($news_id)
    {

        $field = News::where('news_id', $news_id)->first();


        $news['pre'] = News::where('news_id', '<', $news_id)->orderBy('news_id', 'desc')->first();
        $news['next'] = News::where('news_id', '>', $news_id)->orderBy('news_id', 'asc')->first();

        //add view times
        News::where('news_id', $news_id)->increment('news_view', 1);

        return view('home/news_detail', compact('field', 'news'));

    }

    /**
     * @param null $offer_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回求购信息
     */
    public function offerAll($offer_id = null)
    {

        $data = Offer::join('category', 'offer.offer_cate_id', '=', 'category.cate_id')
            ->select('offer.*', 'category.cate_name')
            ->orderBy('updated_at', 'desc')->paginate(10);
        return view('home/offer_all', compact('data'));
    }

    /**
     * 返回求购内容
     */
    public function offer($offer_id)
    {

        $field = Offer::join('category', 'offer.offer_cate_id', '=', 'category.cate_id')
            ->leftjoin('user','user.user_id','=','offer.user_id')
            ->select('offer.*', 'category.cate_name', 'user.user_name')
            ->where('offer_id', $offer_id)->first();


        $offer['pre'] = Offer::where('offer_id', '<', $offer_id)->orderBy('offer_id', 'desc')->first();
        $offer['next'] = Offer::where('offer_id', '>', $offer_id)->orderBy('offer_id', 'asc')->first();

        //add view times
        Offer::where('offer_id', $offer_id)->increment('offer_view', 1);

        return view('home/offer_detail', compact('field', 'offer'));

    }

    public function search()
    {


        $keywords = Input::get('keywords');
        $type = Input::get('type');

        switch ($type) {
            case 'ad':
                $data = Article::where('art_title', 'like', '%' . $keywords . '%')
                    ->orderBy('art_view', 'desc');
                if (!($data->first())) {
                    $data = Article::orderBy('art_view', 'desc');
                }
                break;
            case 'design':
                $data = Article1::where('art_title', 'like', '%' . $keywords . '%')
                    ->orderBy('art_view', 'desc');
                if (!($data->first())) {
                    $data = Article1::orderBy('art_view', 'desc');
                }
                break;
            case 'activity':
                $data = Article2::where('art_title', 'like', '%' . $keywords . '%')
                    ->orderBy('art_view', 'desc');
                if (!($data->first())) {
                    $data = Article2::orderBy('art_view', 'desc');
                }
                break;
        }

        $data = $data->paginate(10);
        return view('home/search', compact('data','keywords','type'));
    }

    public function protocal()
    {
        return view('home/protocal');
    }
}
