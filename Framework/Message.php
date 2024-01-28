<?php

namespace Framework;


class Message
{
    public function enrichByMessage(Request $request): Request
    {
        if (array_key_exists('msg', $request->getSession()))
        {
            $request->setMessage($request->getSession()['msg']);
        }
        return $request;
    }
}