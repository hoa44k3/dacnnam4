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
use App\Models\Contact;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::select('name', 'description', 'image')->take(2)->get(); 
    
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
    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return redirect()->route('contact')->with('success', 'Gửi thành công!');
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
            $blog = Blog::with(['comments', 'tags', 'category'])
                        ->findOrFail($id); 
            $blog->increment('view_count');
            $relatedBlogs = Blog::where('id', '!=', $blog->id)
                                ->get();
            $categories = Category::all();
            return view('site.blogdetail', compact('blog', 'relatedBlogs', 'categories'));
        }
        public function menu(Request $request)
        {
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
        $faq = Faq::create([
            'question' => $request->question,
            'answer' => null, 
        ]);
        return redirect()->route('dish_detail', ['id' => $request->dish_id])
            ->with('success', 'Câu hỏi của bạn đã được gửi đi!')
            ->with('new_faq', $faq);  
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

        return response()->json([
            'content' => $comment->content,
            'user' => $comment->user->name,
            'created_at' => $comment->created_at->diffForHumans(),
        ]);
    }

}
