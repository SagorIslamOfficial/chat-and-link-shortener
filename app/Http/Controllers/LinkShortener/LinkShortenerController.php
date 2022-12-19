<?php

namespace App\Http\Controllers\LinkShortener;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class LinkShortenerController extends Controller
{
    public function index(){
        $linkShortener = Link::all()->sortByDesc('created_at');
        return view('link-shortener', compact('linkShortener'));
    }

    public function originalLink(Request $request){
        $token = Str::random(7);

        $link = new Link();
        $link->original_link = $request->original_link;
        $link->short_link = URL::to('/') . '/' . $token;

        $link->save();

        $displayShortUrl = URL::to('/') . '/' . $token;

        return redirect()->route('original-link')->with('success_message', $displayShortUrl);
    }

    public function getLink($link){
        $short_link = URL::to('/') . '/' .$link;
        $result = Link::where('short_link', '=', $short_link);

        if ($result->exists()){
            return redirect($result->value('original_link'));
        }else{
            return 'No link found';
        }

        return redirect()->back();
    }

    public function destroy($delete){
        Link::findOrFail($delete)->delete();

        return redirect()->back();
    }
}
