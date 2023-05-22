<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

use Google\Cloud\Vision\V1\AnnotateFileRequest;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\ImageContext;
use Google\Cloud\Vision\V1\InputConfig;

use App\Subjects;
use App\Exercises;
use App\Http\Requests\PreExcReq;

class EXCController extends Controller
{
    const BASE_PATH_FILE = 'storage/data/';
    private $exc;

    public function input($input_type) {

        $subjects = new Subjects();
        $list_all_sub = $subjects->getAllSubjects();

        return view('exercises.input', [
            'mode' => 'INPUT',
            'input_type' => $input_type,
            'list_all_sub' => $list_all_sub
        ]);
    }
    // Nc: non crop image upload
    public function ocr_nc_upload(Request $request) {
        // dd($request->all());
        $this->validator($request->all())->validate();
        $imageUrl = $this->store_nc_file($request);

        $ocr_text = $this->ocr_api($imageUrl);

        return view('exercises.input', [
            'mode' => 'INPUT',
            'input_type' => 'camera',
            'ocr_text' => $ocr_text
        ]);
    }
    protected function validator(array $data) {
        return Validator::make($data, [
            'req_content' => ['required', 'image']
        ]);
    }
    public function store_nc_file(Request $request) {
        // dd($request->file('req_content'));
        $path = $request->file('req_content')->store('public/data'); // storage/app/public/data
        return substr($path, strlen('public/data/'));
    }
    // End Nc

    // Cropped image upload
    public function ocr_api_upload(Request $request) {
        if ($request->file('cropped_image')) {
            $image_url = $this->store_file($request);
            $ocr_text = $this->ocr_api($image_url);

            return response()->json([
                'ocr_text' => $ocr_text,
                'image_url' => $image_url
            ], 200);
        }
        return response()->json(['message' => 'No image uploaded'], 400);
    }
    public function store_file(Request $request) {
        // dd($request->file('req_content'));
        $path = $request->file('cropped_image')->store('public/data');
        return substr($path, strlen('public/data/'));
    }
    // End cropped upload

    public function process($input_type, PreExcReq $request) {
        // dd($request->all());
        $input = $request->all();
        $req_content = $input['exc_req_content'];

        $res_content = $this->chatgpt_api($req_content);
        $this->save_exc($input_type, $res_content, $request);

        return view('exercises.result', [
            'mode' => 'RESULT',
            'input_type' => $input_type,
            'req_content' => $req_content,
            'res_content' => $res_content
        ]);
        // return view('exercises.result', [
        //         'mode' => 'RESULT',
        //         'input_type' => '$input_type',
        //         'req_content' => '$req_content',
        //         'res_content' => '$res_content abdehfc dbehfeb ựdwedf\n đềgd dưede'
        //     ]);
    }
    public function chatgpt_api($req_content) {
        // Call API ChatGPT https://ahmadrosid.com/exc/chatgpt-api-laravel
        $messages = [
            ['role' => 'user', 'content' => $req_content],
        ];
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
        ]);
        return Arr::get($response, 'choices.0.message')['content'];
    }

    public function ocr_api($file_path) {
        // khởi tạo thư viện
        $imageAnnotator = new ImageAnnotatorClient([
            'credentials' => json_decode(file_get_contents('credentials/key_ocr.json'), true)
        ]);

        // -------- detect file image --------
        $imgFile = file_get_contents(self::BASE_PATH_FILE.$file_path, true);
        $ocrImgResult = $imageAnnotator->documentTextDetection($imgFile);
        $annotationsImg = $ocrImgResult->getFullTextAnnotation();
        $textResultImg = $annotationsImg ? $annotationsImg->getText() : '';
        // -------- end detect file image --------

        // -------- detect file pdf --------
        // $pdfFile = file_get_contents('images/sample.pdf', true);

        // $context = new ImageContext();
        // $context->setLanguageHints(['it']);
        // $input_config = (new InputConfig())
        //     ->setMimeType('application/pdf')
        //     ->setContent($pdfFile);

        // $feature = (new Feature())->setType(Type::DOCUMENT_TEXT_DETECTION);
        // $file_request = new AnnotateFileRequest();
        // $file_request = $file_request->setInputConfig($input_config)
        //     ->setFeatures([$feature])
        //     ->setPages([1]);

        // $requests = [$file_request];
        // $result = $imageAnnotator->batchAnnotateFiles($requests);
        // $ocrPdfResult = $result->getResponses();
        // $offset = $ocrPdfResult->offsetGet(0);
        // $responses = $offset->getResponses();
        // $res = $responses[0];
        // $annotationsPdf = $res->getFullTextAnnotation();
        // $imageAnnotator->close();
        // $textResultPdf = $annotationsPdf->getText();
        // -------- end detect file pdf --------

        return $textResultImg;
    }

    public function save_exc($input_type, $res_content, PreExcReq $request) {
        $validated = $request->validated();
        
        $this->do_save_exc($input_type, $res_content, $request);
                
    }
    public function do_save_exc($input_type, $res_content, $request) {
        $input = $request->all();

        $exc = new Exercises();
        $exc->exc_content = $input['exc_req_content'];
        $exc->exc_img_path = $input['exc_img_path'];
        $exc->exc_answer = $res_content;
        $exc->exc_grade = $input['exc_req_grade'];
        $exc->exc_subject = $input['exc_req_subject'];
        $exc->exc_input_type = $input_type == 'type' ? 2 : 1;
        $exc->save_exc();
    }
}
