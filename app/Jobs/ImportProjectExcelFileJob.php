<?php

namespace App\Jobs;

use App\Imports\ProjectImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportProjectExcelFileJob implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   private $path;
   /**
    * Create a new job instance.
    * @param $path
    */
   public function __construct($path)
   {
      $this->path = $path;
   }

   /**
    * Execute the job.
    * @return void
    */
   public function handle()
   {

      //dd($this->path);
      Excel::import(new ProjectImport(), $this->path, 'public');
   }
}
