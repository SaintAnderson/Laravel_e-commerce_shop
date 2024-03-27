<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ProductView;

class ArticleService
{
    public function getPaginatedArticles()
    {
        return Article::where('is_active', true)->paginate(8);
    }
}
