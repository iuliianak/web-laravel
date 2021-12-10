<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index()
    {
        return 'Список всех заданий';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function create()
    {
        return 'Форма добавления задания';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        return 'Сохранение задания';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function show($id)
    {
        return 'Просмотр задания id = ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function edit($id)
    {
        return 'Форма редактирования задания id = ' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function update(Request $request, $id)
    {
        return 'Задание ' . $id . ' успешно изменилось';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function destroy($id)
    {
        return 'Задание ' . $id . ' удалено';
    }
}
