<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use App\Models\Assign;

class AppointmentsCalendar extends LivewireCalendar
{
    public function events(): Collection
    {
        return Assign::query()
            ->whereDate('date', '>=', $this->gridStartsAt)
            ->whereDate('date', '<=', $this->gridEndsAt)
            ->get()
            ->map(function (Assign $assign) {
                return [
                    'id' => $assign->id,
                    'training_title' => $assign->training_title,
                    'trainers_name' => $assign->trainers_name,
                    'date' => $assign->date,
                ];
            });
    }
}
