<?php

namespace Controller;

use \Response as Response;
use \Model\Message as Message;
use \Model\User as User;

class MessageController extends BaseController {

    function __construct()
    {
        parent::__construct();
    }

    /**
     * list of messages
     *
     * @return Response     JSON data
     */
    public function index()
    {
        $messages = Message::all();

        return Response::jsonResponse(200,$messages);
    }

    /**
     * show resource details with a specific id
     *
     * @param  integer $id resource id
     * @return Response     JSON response
     */
    public function show($id)
    {
        $message = Message::find($id);

        if ( ! $message )
            return Response::respondWithError(404,"Message not found");

        $author = $message->user;

        return Response::jsonResponse(200,$message);
    }

    /**
     * store new messages
     *
     * @return Response     JSON response
     */
    public function store()
    {
        $post = $this->app->request()->post();

        // in real application be sure to validate submitted data

        $newMessage         = new Message;
        $newMessage->title  = $post['title'];
        $newMessage->body   = $post['body'];

        if ( $newMessage->save() ) {
            return Response::respondWithSuccess(200, "Message created with success");
        }

        return Response::respondWithError(500, "Failed to create new message");
    }

}