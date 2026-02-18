<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return "<h1>Головна сторінка</h1>
                <p>Вітаємо в системі обліку вантажних перевезень!</p>
                <ul>
                    <li><a href='/trips'>Переглянути рейси</a></li>
                    <li><a href='/about'>Про проєкт</a></li>
                </ul>";
    }

    public function about()
    {
        return "<h1>Про проєкт</h1>
                <p>Ця система розроблена для автоматизації логістичних процесів, обліку водіїв, транспортних засобів та маршрутів.</p>
                <p>Розробник: Костриця Іван</p>
                <a href='/'>На головну</a>";
    }
}