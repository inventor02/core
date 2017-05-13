<?php

namespace App\Http\Requests\VisitTransfer;

use Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\VisitTransfer\Application;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationWithdrawRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * Get the messages that are displayed when a validation rule fails.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('withdraw-application', Auth::user()->visit_transfer_current);
    }
}