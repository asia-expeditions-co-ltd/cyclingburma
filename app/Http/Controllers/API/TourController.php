<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use Illuminate\Support\Facades\Response;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tours = Tour::where('status', 1)->get();
        $jsonData = [];
        $tours = Tour::where('status', 1)->orderBy('id', 'DESC')->get();
        
                // $jsonData[] = ['Id'=>$value->id, 'title'=>$value->title, 'photo'=>$value['tour_photo']];
            // }       
        // // }else{
        //     $jsonData = ['message'=> "Not Found"];
        // }
        // return Response()->json($jsonData);
        return Response::json($tours);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::where(['id'=>$id, 'status'=>1])->first();
        if ($tour) {
            $gallery = [];
            $dataGallery = explode(',', trim($tour->tour_picture, ','));
            foreach ($dataGallery as $key => $val) {
                $gallery = ['gallery'=> $val];
            }
            $tourData = ['title'=>$tour->title, 'slug'=>$tour->slug, 'user'=>$tour->user, 'photo'=>$tour->photo, 'gallery'=>$gallery, 'country'=> $tour->country, 'province'=> $tour->province];
        }else{
            $tourData = ['message'=> "Not Found"];
        }
        return response()
            ->json($tourData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
