<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ApiController extends Controller {

    public function getArticlelist($page){
        $Art=new Article();
        $rslist=$Art->get_articles($page);
        echo json_encode($rslist);
    }
}
