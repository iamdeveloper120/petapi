<?php
namespace App\Http\Traits;

trait ApiResponseTrait {

    /**
     * @var int
     * @uses status200 -> Ok
     */
    protected $status200 = 200;

    /**
     * @var int
     * @uses status201 -> Created
     */
    protected $status201 = 201;

    /**
     * @var int
     * @uses status202 -> Accepted
     */
    protected $status202 = 202;

    /**
     * @var int
     * @uses status204 -> No Content
     */
    protected $status204 = 204;

    /**
     * @var int
     * @uses status301 -> Moved Permanently
     */
    protected $status301 = 301;

    /**
     * @var int
     * @uses status302 -> Found
     */
    protected $status302 = 302;

    /**
     * @var int
     * @uses status303 -> See Others
     */
    protected $status303 = 303;

    /**
     * @var int
     * @uses status304 -> Not Modified
     */
    protected $status304 = 304;

    /**
     * @var int
     * @uses status307 -> Temporary Redirect
     */
    protected $status307 = 307;

    /**
     * @var int
     * @uses status400 -> Bad Request
     */
    protected $status400 = 400;

    /**
     * @var int
     * @uses status401 -> Unauthorized
     */
    protected $status401 = 401;

    /**
     * @var int
     * @uses status403 -> Forbidden
     */
    protected $status403 = 403;

    /**
     * @var int
     * @uses status404 -> Not Found
     */
    protected $status404 = 404;

    /**
     * @var int
     * @uses status405 -> Method Not Allowed (Allow: Get, Post)
     */
    protected $status405 = 405;

    /**
     * @var int
     * @uses status406 -> Not Acceptable
     */
    protected $status406 = 406;

    /**
     * @var int
     * @uses status421 -> Precondition Failed
     */
    protected $status412 = 412;

    /**
     * @var int
     * @uses status415 -> Unsupported Media Type
     */
    protected $status415 = 415;

    /**
     * @var int
     * @uses status500 -> Internal Server Error
     */
    protected $status500 = 500;

    /**
     * @var int
     * @uses status501 -> Not Implemented
     */
    protected $status501 = 501;

    protected $status = 200;
    protected $message = 'success';
    protected $data = null;
    protected $response = array();

    public function sendResponse() {
        $this->response['status'] = $this->status;
        $this->response['message'] = $this->message;
        $this->response['data'] = $this->data;
        return response()->json($this->response, $this->status);
    }
}
