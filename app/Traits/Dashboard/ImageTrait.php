<?php

namespace App\Traits\Dashboard;

use Illuminate\Http\Request;

trait ImageTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {
        static $i=0;
        if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();

            }
            $fileextension = $request->file($fieldname)->getClientOriginalExtension();
            $filename=time().$i++.'.'.$fileextension;
            $request->file($fieldname)->move($directory, $filename);
            return $filename;

        }

        return null;

    }

}