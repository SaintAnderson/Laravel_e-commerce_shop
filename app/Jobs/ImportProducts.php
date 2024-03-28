<?php

namespace App\Jobs;

use App\Models\Import;
use App\Services\ImportService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Import $import;

    /**
     * Create a new job instance.
     */
    public function __construct(Import $import)
    {
        $this->import = $import;
        $this->onQueue('import');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $import = resolve(ImportService::class);
        $import->parse($this->import);
    }
}
