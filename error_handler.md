source link
----------------
https://www.youtube.com/watch?v=IWW26hIOv-I&index=1&list=PLwAKR305CRO9sC1YF2Jm-xwGJ27GHRCgA#t=586.080236





#add to composer file
{
  "require": {
    "filp/whoops": "2.*"
  }
}
#update composer

#add code to app/Exceptions/handler.php file in bottom of the class
/**
 * Create a Symfony response for the given exception.
 *
 * @param  \Exception  $e
 * @return mixed
 */
protected function convertExceptionToResponse(Exception $e)
{
    if (config('app.debug')) {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

        return response()->make(
            $whoops->handleException($e),
            method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500,
            method_exists($e, 'getHeaders') ? $e->getHeaders() : []
        );
    }

    return parent::convertExceptionToResponse($e);
}
