<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sentence\UpdateSentenceRequest;
use App\Models\Sentence;

class SentenceController extends Controller
{
    public function update(UpdateSentenceRequest $request, $id)
    {
        $model = Sentence::find($id);

        $model->forceFill([
            'text' => $request['text'],
            'row' => $request['row'],
            'col' => $request['col'],
            'css' => $request['css'],
        ])->save();

        return $model->refresh();
    }
}
