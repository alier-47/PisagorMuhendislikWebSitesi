<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotsController extends Controller
{
    /**
     * @param Robots $robots
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function __invoke(Robots $robots)
    {
        $robots->addUserAgent('*');

        if ($robots->shouldIndex()) {
            // If on the live server, serve a nice, welcoming robots.txt.
            $robots->addDisallow('/admin');
            $robots->addSitemap('sitemap.xml');
        } else {
            // If you're on any other server, tell everyone to go away.
            $robots->addDisallow('/');
        }

        return response($robots->generate(), 200, ['Content-Type' => 'text/plain']);
    }
}
