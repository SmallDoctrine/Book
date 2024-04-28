<?php
// создается через make:request - является экземпяром Request класс выносится для подключение валидации к отдельному
// методу в Controller целях рефакторинга кода
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBooks extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //required - обязательно для заполнения
        //'|unique : road ,table name' - принимает 2 параметра путь до модели (таблицы) и название колонки для сверки на наличия такой записи
        return [
            'name'=>'required|string|max:30|unique:App\Models\Books,name',
            'description'=>'required|string|max:100',
            'years'=>'required|numeric|max:2024',
            'count'=>'required|numeric|max:99999',
        ];
    }
}
