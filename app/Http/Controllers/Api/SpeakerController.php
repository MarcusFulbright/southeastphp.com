<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Speaker;
use App\Transformers\Api\SpeakerTransformer;

class SpeakerController extends Controller
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var SpeakerTransformer
     */
    private $transformer;

    public function __construct(Response $response, SpeakerTransformer $transformer)
    {
        $this->response = $response;
        $this->transformer = $transformer;
    }

    public function index()
    {
        $speakers = Speaker::all();

        return $this->response->setStatusCode(200)->setContent(fractal($speakers, $this->transformer)->toArray());
    }
}
