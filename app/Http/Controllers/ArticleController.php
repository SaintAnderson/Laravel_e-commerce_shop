<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    protected ArticleService $articleService;
  
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request): View
    {
        $articles = $this->articleService->getPaginatedArticles();
        return view('articles.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }
}
