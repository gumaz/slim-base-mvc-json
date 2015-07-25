<?php

/**
 * Response class manages the output and takes care of
 * presenting the output in the form of JSON data.
 *
 * @author gumaz <gumaz.dev@gmail.com>
 */
class Response
{
    /**
     * Encode and pretty print the output.
     * Also sets the HTTP status response.
     *
     * @param  int $status HTTP status code
     * @param  $array data or notification message
     * @return Response
     */
    private static function respond($status,$array)
    {
        $app = \Slim\Slim::getInstance();

        $response = $app->response();
        $response['Content-Type'] = 'application/json';
        $response->status($status);
        $response->body(json_encode($array,JSON_PRETTY_PRINT));
    }

    /**
     * Returns the data in the form of JSON
     *
     * @param  integer $status HTTP Status Code
     * @param  array $array  output data
     * @return Response
     */
    public static function jsonResponse($status,$array)
    {
        $array = [
            "data" => $array
        ];
        return self::respond($status,$array);
    }

    /**
     * Respond with a error message
     *
     * @param  integer $status HTTP Status Code
     * @param  string $message the error message
     * @return Response
     */
    public static function respondWithError($status,$message)
    {
        $array = [
            "error" => [
                "message" => $message
            ]
        ];
        return self::respond($status,$array);
    }

    /**
     * Respond with a success message
     *
     * @param  integer $status HTTP Status Code
     * @param  string $message the success message
     * @return Response
     */
    public static function respondWithSuccess($status,$message)
    {
        $array = [
            "success" => [
                "message" => $message
            ]
        ];
        return self::respond($status,$array);
    }
}