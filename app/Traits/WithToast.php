<?php

namespace App\Traits;

trait WithToast
{
    public function toast(string $type, string $message): void
    {
        $this->dispatch('toast', [
            'type' => $type,
            'message' => $message
        ]);
    }
}
