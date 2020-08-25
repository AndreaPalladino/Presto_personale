<?php

namespace App\Jobs;


use App\AnnouncementImage;
use Illuminate\Bus\Queueable;
use Google\Cloud\Core\ServiceBuilder; 
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $add_image_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($add_image_id)
    {
        $this->add_image_id = $add_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = AnnouncementImage::find($this->add_image_id);

        if (!$i){
            return;
        }

        $image = file_get_contents(storage_path('/app/' . $i->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();

        if($labels){

            $result = [];
            foreach ($labels as $label){
                $result[] = $label->getDescription();
            }

            //echo json_encode($result);
            $i->labels = $result;
            $i->save();
        }

        $imageAnnotator->close();

    }
}
