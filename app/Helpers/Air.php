<?php

use App\Models\Profile;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use Illuminate\Support\Str;

/**
 * 
 * Create directory in public with permission 0755
 */
function createPubDir($dir)
{
    if (!file_exists("storage/" . $dir)) {
        mkdir("storage/" . $dir, 0755);
    }
}


/**
 * 
 * 
 * Explod string saparated value to array useful for whereIn query
 */

function expForWhereIn($param): array
{
    $ex = explode(',', $param);
    $data = [];
    foreach ($ex as $key => $value) {
        $data[] = intval($value);
    }
    return $data;
}

/**
 * 
 * 
 * get current user id
 */
function gcuid()
{
    return Auth::user()->id;
}

/**
 * 
 * 
 * 
 * get Image by id
 */
function getImageById($id)
{
    $image = Upload::find($id);
    if ($image) {
        return url('storage/uploads/' . $image->url);
    }
    return '';
}

/**
 * 
 * Display Blog date format
 */
function blogDateFormat($date)
{
    return date('d M, Y', strtotime($date));
}

/**
 * 
 * 
 * Set given tags
 */
function createTags($input = null)
{
    
    $tags = explode(',', $input);
    $return = [];
    foreach ($tags as $key => $tag) {
        $tag = trim($tag);
        $exist = Tag::where('title', $tag)->first();
        if (!$exist) {
            $newTag = Tag::create([
                'title' => $tag,
                'slug' => Str::slug($tag, '-')
            ]);
            $return[] = $newTag->id;
        } else {
            // already exist
            $return[] = $exist->id;
        }
    }

    return $return;
}


function getBlogTagTitles($blog){
    $tags = [];
    foreach ($blog->tags as $key => $tag) {
        $tags[] = $tag->title;
    }

    return implode(', ', $tags);
}

// to check whether blog enabled or not
function isBlog(){
    $profile = Profile::where('status', 1)->first();
    return $profile->is_blog;
}

// to check whether social icon needs to show
function isSocial(){
    $profile = Profile::where('status', 1)->first();
    return $profile->is_social;
}