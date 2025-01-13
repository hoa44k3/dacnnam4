<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Comment;
use App\Models\AboutUs;
use App\Models\Region;
use App\Models\Faq;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::select('name', 'description', 'image')->take(2)->get(); // Lấy 2 bài viết đầu tiên
    
        if ($request->has('category')) {
            $category = Category::find($request->category);
            if ($category) {
                $blogs = $category->blogs()->paginate(10); 
            } else {
                $blogs = Blog::paginate(10); 
            }
        } else {
            $blogs = Blog::paginate(10); 
        }
        return view('site.home', compact('blogs'));
    }

    public function contact(){
       
        return view('site.contact');
    }
    public function about()
    {
        $aboutUs = AboutUs::all();
        return view('site.about', compact('aboutUs'));
    }
    
    public function blog()
    {
        $categories = Category::withCount('blogs')->get();
        $blogs = Blog::with(['tags', 'category'])->select('id', 'name', 'description', 'image', 'view_count', 'category_id')->paginate(6);
        return view('site.blog', compact('blogs', 'categories')); 
    }

        public function blogdetail($id)
        {
            // Lấy bài viết theo id và eager load các mối quan hệ
            $blog = Blog::with(['comments', 'tags', 'category', 'postType'])
                        ->findOrFail($id);  // Sử dụng findOrFail thay vì firstOrFail

            // Tăng lượt xem bài viết
            $blog->increment('view_count');

            // Lấy tất cả các bài viết khác (trừ bài viết hiện tại)
            $relatedBlogs = Blog::where('id', '!=', $blog->id)
                                ->get();

            // Lấy tất cả danh mục
            $categories = Category::all();

            // Trả về view chi tiết bài viết
            return view('site.blogdetail', compact('blog', 'relatedBlogs', 'categories'));
        }


    // public function menu(){
    //     $categories = Category::with('dishes')->get(); 
    //     $blog = Blog::first();
    //     return view('site.menu', compact('categories','blog'));
    // }
        public function menu(Request $request)
    {
        // Lấy danh mục và món ăn liên quan
        $categories = Category::with(['dishes' => function ($query) use ($request) {
            if ($request->has('region') && $request->region) {
                $query->where('region_id', $request->region);
            }
        }])->get();
        $regions = Region::all();

        return view('site.menu', compact('categories', 'regions'));
    }

    public function showByTag(Tag $tag)
    {
        // Lấy bài viết liên kết với thẻ
        $blog = $tag->blog;

        if (!$blog) {
            return redirect()->route('blog')->with('error', 'Không có bài viết nào được liên kết với thẻ này.');
        }

        return view('site.blog', compact('blog', 'tag'));
    }
    public function dishDetail($id)
    {
        $dish = Dish::with('category')->findOrFail($id);
        $faqs = Faq::all();
        return view('site.dish_detail', compact('dish','faqs'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'question' => 'required|string|max:1000',
    ]);

    // Lưu câu hỏi vào cơ sở dữ liệu
    $faq = Faq::create([
        'question' => $request->question,
        'answer' => null,  // Câu trả lời chưa có
    ]);

    // Trả về câu hỏi vừa được gửi để hiển thị trực tiếp trên trang
    return redirect()->route('dish_detail', ['id' => $request->dish_id])
        ->with('success', 'Câu hỏi của bạn đã được gửi đi!')
        ->with('new_faq', $faq);  // Trả về câu hỏi mới để hiển thị
}

    public function storeComment(Request $request, $blogId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->blog_id = $blogId;
        $comment->user_id = auth()->id(); 
        $comment->save();

        // Trả về bình luận mới để hiển thị mà không cần tải lại trang
        return response()->json([
            'content' => $comment->content,
            'user' => $comment->user->name,
            'created_at' => $comment->created_at->diffForHumans(),
        ]);
    }

    public function search(Request $request)
{
    $searchTerm = $request->input('name');  // Lấy từ khóa tìm kiếm
    $blog = Blog::where('name', 'like', '%' . $searchTerm . '%')->first();  // Tìm kiếm bài viết đầu tiên phù hợp

    if ($blog) {
        return redirect()->route('blogdetail', ['id' => $blog->id]);
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy bài viết nào phù hợp.');
    }
}


    
}
