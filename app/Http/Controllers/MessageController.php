<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * GET /message
     *
     * Display a messages.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $input = $request->only([
            'limit',
            'searchText',
            'searchBy'
        ]);

        $limit = (int) $input['limit'];

        $messages = Message::filterable()
            ->sortable([
                'msg_id',
                'server_id',
                'name',
                'message',
                'timestamp',
                'type'
            ])
            ->searchable(htmlspecialchars_decode($input['searchText']), $input['searchBy'], [
                'auth',
                'name',
                'message',
                'ip',
                'msg_id'
            ])
            ->paginate(($limit && $limit <= 100 && $limit >= 10) ? $limit : 25);

        return $this->parseMessages($messages, $input);
    }


    /**
     * POST /message
     *
     * Create a message.
     *
     * @return int
     */
    public function store()
    {
        return 0;
    }

    /**
     * Returns messages with an escape text.
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $messages
     * @param array $input
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator $messages
     */
    private function parseMessages($messages, array $input)
    {
        $replace = $input['searchBy'] && $input['searchText'] && $input['searchBy'] === 'message';

        $searchText = preg_quote(htmlspecialchars($input['searchText']));

        foreach ($messages as $message)
        {
            $message->message = htmlspecialchars($message->message);

            if ($replace) {
                $message->message = preg_replace("#($searchText)#iu", '<b class=red--text>$1</b>', $message->message);
            }
        }

        return $messages;
    }
}